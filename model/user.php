<?php
// @todo comment replaces # with single or multiline comment, comment should not be function name, coding standard
class User extends Database {
    public Function userForm(): void
    {
        // Insert Data Into UserForm if Method is Post
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $email = $_POST["email"];
            // Insert a query for Inset and store user Registers Data use by user Object with Database class.
            $user = new Database();
            $user->insertQuery('user', ['username', 'pass', 'email'], [$username, $pass, $email]);
        }
    }

    public function validateRegistrationForm(): string
    {
        $emailErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
        }
        return $emailErr;
    }

    public function validUserName(): string
    {
        $nameErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (empty($_POST["username"])) {
                $nameErr .= "Name is required";
            } else {
                $name = $this->test_input($_POST["username"]);
                // check if name only contains letters and space
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr .= "Only letters and white space allowed";
                }
            }
        }
        return $nameErr;
    }

    public function validatePass(): string
    {
        $passErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["pass"])) {
                $passErr = "password is required";
            } else {
                $pass = $this->test_input($_POST["pass"]);
                // check if e-mail address is well-formed
                // Validate password strength
                $uppercase = !preg_match('@[A-Z]@', $passErr);
                $lowercase = !preg_match('@[a-z]@', $passErr);
                $number    = !preg_match('@[0-9]@', $passErr);
                if(!$uppercase || !$lowercase || !$number || strlen($pass)) {
                    $passErr .= 'Password should be at least 8 character and mix character.';
                }else{
                    $passErr .= 'Strong password.';
                }
            }
        }
        return $passErr;
    }

    function test_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    Public Function loginForm(): void
    {
        // check User Is exist ya Register
        if (isset($_POST['submit'])) {
            $username = $_POST["username"];
            $password = $_POST["pass"];
            $database = new Database();
            $runQuery = $database->selectQuery('user', '*', "username='$username' AND pass='$password'");
            // Details Matched or Not
            if (mysqli_num_rows($runQuery) == 0) {
                $_SESSION['message']="Login Failed. User Not Found";
                include 'view/login.php';
            } else {
                $row=mysqli_fetch_array($runQuery);
                // For Store User Data In Cookie
                if (isset($_POST["remember"])) {
                    setcookie("user", $row['username'], time() + (86400 * 30));
                }
                $_SESSION['id']=$row['id'];
                $_SESSION['username']=$row['username'];
                // redirect dashboard after data match with user data
                header('location:index.php?function=dashboard');

            }
        } else {
            $_SESSION['message']="Please Login";
            // display login page
            include 'view/login.php';
        }
    }

    public function isLoggedIn(): bool
    {
        return true;
    }

    public function logoutForm(): void
    {
        session_destroy();
        // Logout User And Delete User Cookie
        if (isset($_COOKIE["user"])) {
            // @todo https://stackoverflow.com/a/19972329
            setcookie("user", '', (time() - 1));
        }
    }
}


