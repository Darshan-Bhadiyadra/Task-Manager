<?php
// @todo change function name, comment replace # with single or multiline comment, comment should not be function name
class Task extends Database
{
    public function getTask(): array
    {
        session_start();
        // Get Task-Data From Database
        $taskData = [];
        $database = new Database();
        $tasks = $database->selectQuery('task', '*', "user_id='" . $_SESSION['id'] . "'");
        if (mysqli_num_rows($tasks) > 0) {
            while ($row = mysqli_fetch_assoc($tasks)) {
                // convert Data Into Array Form
                $taskData[] = $row;
            }
        }
        // Return TaskData
        return $taskData;
    }

    public function createTask(): false|array|null
    {
        session_start();
        $id = $_SESSION['id'];
        $database = new Database();
        $rec = $database->getQuery('task', '*', "id='" . $id . "'");
        $array = mysqli_fetch_array($rec);
        // Insert TaskData Into TaskForm if Method is Post
        if (isset($_POST["submit"])) {
            $userid = $_POST["user_id"];
            $taskName = $_POST["name"];
            $description = $_POST["description"];
            $dueDate = $_POST["due_date"];
            // Insert query fot store task data and use by a declaring user object with Database class
            $user = new Database();
            $user->insertQuery('task', ['user_id','name', 'description', 'due_date'], [$userid, $taskName, $description, $dueDate]);
        }
        return $array;
    }

    public function viewTask(): array
    {
        session_start();
        // Get TaskData From Database
        $taskData = [];
        // @todo get task data
        $database = new Database();
        $runQuery = $database->selectQuery('task', '*', "user_id='" . $_SESSION['id'] . "'");
        if (mysqli_num_rows($runQuery) > 0) {
            while ($rows = mysqli_fetch_assoc($runQuery)) {
                // convert Data Into Array Form
                $taskData[] = $rows;
            }
        }
        // return TaskData
        return $taskData;
    }

    public function updateTask(): false|array|null
    {
        // Get Particular i'd Wise Data From Database
        $id = $_GET['id'];
        $database = new Database();
        $rec = $database->getQuery('task', '*', "id='" . $id . "'");
        $array = mysqli_fetch_array($rec);
        // After Getting Data Update The Data
        if (isset($_POST["submit"])) {
            $ids = $_GET['id'];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $dueDate = $_POST["due_date"];
            // Update query For Update the data
            $database->updateQuery('task', ["name = '$name'", "description = '$description'", "due_date = '$dueDate'"], "id='" . $ids . "'");
            // header('location:index.php?function=updateTask&id=' . $id);
        }
        // return Array
        return $array;
    }

    public function deleteData(): mysqli_result|bool
    {
        // Use GET Method For Getting Particular I'd to Delete only 1 task at a time.
        $id = $_GET['id'];
        $database = new Database();
        return $database->deleteQuery('task', "id='" . $id . "'");
    }
}
