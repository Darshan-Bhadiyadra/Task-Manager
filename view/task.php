<?php
//if(!defined('site')) {
//    die('You cant Access Without Login!!');
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'view/head.php';?>
    <title>Create Task</title>
</head>
<body>
<!--Start Header-->
<?php include 'header.php';?>
<!--End Header-->
<!--Start Main-->
<main>
<div class="container mx-auto">
    <div class="grid grid-cols-2 mt-40">
        <div class="mr-5 mt-14">
            <div class="bg-orange-900 rounded-xl w-7/12 shadow-xl mx-auto">
                <div class="grid place-items-center py-5 px-11">
                    <div class="text-center text-orange-50 mt-5 font-sans font-bold text-3xl">
                        <h1>Add Task</h1>
                    </div>
                    <div class="w-full">
                        <form action="index.php?function=createTask&id=<?php echo $_SESSION['id'] ?>" method="post">
                            <?php //@todo this field should not be here ?>
                            <div class="mt-6 hidden">
                                <label class="text-orange-50 mb-1 text-lg" for="userid">User ID</label>
                                <input class="py-2 px-2 w-full" type="number" placeholder="Enter a User ID" id="userid" name="user_id" title="User ID" value="<?php echo $_SESSION['id']; ?>" required>
                            </div>
                            <div class="mt-5">
                                <label class="text-orange-50 mb-1 text-lg" for="name">Task Name</label>
                                <input class="py-2 px-2 w-full" type="text" placeholder="Enter a Task Name" id="name" name="name" title="Task Name" required>
                            </div>
                            <div class="mt-5">
                                <label class="text-orange-50 mb-1 text-lg" for="description">Description</label>
                                <textarea id="description" name="description" title="Description" cols="33" rows="4" placeholder="Enter Task Description" class="p-5"></textarea>
                            </div>
                            <div class="mt-4">
                                <label class="text-orange-50 mb-1 text-lg" for="dueDate">Due Date</label>
                                <input class="py-2 px-2 w-full" type="date" id="dueDate" name="due_date" title="Due Date" required>
                            </div>
                            <button class="mt-5 mb-5 grid place-items-center bg-orange-800 hover:bg-orange-700 transistion duration-300 text-white w-full py-3 px-2 text-xl font-semibold" type="submit" name="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php //@todo create a helper function to get the path, create a helper class, initialize helper object in controller, call function here ?>
        <img src="view/image/addtask.jpg" alt="add-task" width="89%">
    </div>
</div>
</main>
<!--End Main-->
</body>
</html>