<?php
class UserController
{
    // handle various function request
    public function functionRequest(): void
    {
        // Determine the action based on request
        $action = $_GET['function'];

        // perform the appropriate action
        switch ($action) {
            case 'user':
                $this->user();
                break;

            case 'login':
                $this->login();
                break;

            case 'logout':
                $this->logout();
                break;

            default:
                // @todo standard not found page
                break;
        }
    }

    private function user(): void
    {
        // userForm Function Calling From user Model
        $user = new User();
        $emailErr = $user->validateRegistrationForm();
        // redirect to log in after register the data in user form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*$emailErr = $user->validateRegistrationForm();
            if ($emailErr){
                echo $emailErr;
                header('location:index.php?function=user');
            } else {
                $user->userForm();
                header('location:index.php?function=login');
            }
            exit;*/
            $err = $user->validateRegistrationForm();
            $name = $user->validUserName();
            $pass = $user->validatePass();
            if (!$err && !$name && !$pass) {
                $user->userForm();
            } else {
                setcookie('error', $err);
                setcookie('name', $name);
                setcookie('pass', $pass);
                header('Location: index.php?function=user');
                exit;
            }
            header('Location: index.php?function=login');
            exit;
        }
        // @todo add data validation, if not validate redirect to register page with error
        // display user form page
        include 'view/user.php';
    }

    private function login(): void
    {
        session_start();
//        $this->error();
        // User Doesn't Log in Than Redirect On Login Page
        $user = new User();
        if (!$user->isLoggedIn()) {
            if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
                header('location:index.php?function=login');
                exit;
            }
        }
        // loginForm Function Calling From user Model
        $login = new User();
        $login->loginForm();
    }

    private function logout(): void
    {
        // logoutForm Function Calling From user Model
        $logout = new User();
        $logout->logoutForm();
        // redirect to login page after click on logout button
        header('location:index.php?function=login');
    }

//    private function error(): void
//    {
//        if(!isset($_SESSION['username'])){
//            header('location:index.php?function=login');
//        }
//    }
}
