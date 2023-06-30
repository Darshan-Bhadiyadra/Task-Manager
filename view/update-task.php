<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>Update Task</title>
</head>
<body>
<!--Start Header-->
<?php include 'header.php';?>
<!--End Header-->
<!--Start Main-->
<main>
<div class="bg-orange-900 rounded-xl w-3/12 shadow-xl mx-auto mt-32">
    <div class="grid place-items-center py-5 px-10">
        <div class="text-center text-orange-50 mt-5 font-sans font-bold text-3xl">
            <h1>Update Task</h1>
        </div>
        <div class="w-full">
            <form method="post" action="index.php?function=updateTask&id=<?php echo $_GET['id'] ?>">
                <div class="mt-8">
                    <label class="text-orange-50 mb-1 text-lg" for="name">Task Name</label>
                    <input class="p-2 w-full" type="text" placeholder="Enter a Task Name" id="name" name="name" title="Task Name" value="<?php echo $array['name']; ?>">
                </div>
                <div class="mt-5">
                    <label class="text-orange-50 mb-1 text-lg" for="description">Description</label>
                    <textarea class="py-5 text-center w-full" id="description" name="description" title="Description" rows="4">
                        <?php echo  $array['description']; ?>
                    </textarea>
                </div>
                <div class="mt-4">
                    <label class="text-orange-50 mb-1 text-lg" for="date">Due Date</label>
                    <input class="p-2 w-full" type="date" id="date" name="due_date" value="<?php echo $array['due_date'];?>">
                </div>
                <input type="submit" name="submit" value="UPDATE"
                 class="mt-5 mb-5 grid place-items-center bg-orange-800 hover:bg-orange-700 transistion duration-300 text-white w-full py-3 px-2 text-xl font-semibold">
            </form>
        </div>
    </div>
</div>
</main>
<!--End Main-->
<script>
    function logout(){
        return confirm("are you want to Logout");
    }
</script>
</body>
</html>