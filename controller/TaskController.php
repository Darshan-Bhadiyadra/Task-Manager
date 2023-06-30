<?php
// @todo change function name, coding standard, comment replace # with single or multiline comment, comment should not be function name
class TaskController
{
    // handle various function request
    public function functionRequest(): void
    {
        // Determine the action based on request
        $action = $_GET['function'];

        // perform the appropriate action
        switch ($action) {
            case 'dashboard':
                $this->dashboard();
                break;

            case 'createTask':
                $this->createTask();
                break;

            case 'viewTask':
                $this->viewTask();
                break;

            case 'updateTask':
                $this->updateTask();
                break;

            case 'deleteTask':
                $this->deleteTask();
                break;

            default:
                break;
        }
    }

    private function dashboard(): void
    {

//        session_start();
//        $this->error();
        // getTask Function Calling From Task Model
        $task = new Task();
        $tasks = $task->getTask();
        // display dashboard page
        include 'view/dashboard.php';
    }

    private function createTask(): void
    {
        // CreateTask Function Calling From Task Model
        $create = new Task();
        // @todo add data validation
        $array = $create->createTask();
        // After Create Task User Redirect On Dashboard Page
        if(isset($_POST['submit'])) {
            // @todo show a success message
            header('location:index.php?function=dashboard');
        }
        // display creates task page
        include 'view/task.php';
    }

    private function viewTask(): void
    {
        // viewTask Function Calling From Task Model
        $rows = new Task();
        // @todo validate task id with user
        $runQuery = $rows->viewTask();
        // Display View-task (all selected data shown) File
        include 'view/view-task.php';
    }

    private function updateTask(): void
    {
        // updateTask Function Calling From Task Model
        $update = new Task();
        $array = $update->updateTask();
        // After Update Data User Redirect on Dashboard Page
        if(isset($_POST['submit'])) {
            header('location:index.php?function=dashboard');
            exit;
        }
        // display Update Form
        include 'view/update-task.php';
    }

    private function deleteTask(): void
    {
        // delete_Data Function Calling From Task Model
        $delete = new Task();
        $delete->deleteData();
        // Redirect to Dashboard After Successfully Deletion.
        header('location:index.php?function=viewTask');
    }

//    private function error(): void
//    {
//        if(!isset($_SESSION["username"])){
//            header('location:index.php?function=login');
//        }

}
