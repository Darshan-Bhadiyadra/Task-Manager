<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include 'view/head.php';?>
    <title>View Task</title>
</head>
<body>
<!--Start Header-->
<?php include 'header.php';?>
<!--End Header-->
<!--Start Main-->
<main>
<div class="container mx-auto">
    <div class=" mt-36">
        <?php
        if (count($runQuery) === 0){
            $disNone = "visibility : hidden";
        } else{
            $disNone = "visibility : visible";
        }
        ?>
        <table class="mt-14 border border-black text-center shadow-2xl border-collapse border-spacing-5 w-full" cellpadding="10" style="<?=$disNone?>">
            <?php //@todo table header should not display if not data ?>
            <tr class="bg-orange-300">
                <th class="border border-black w-2/12">Task Name</th>
                <th class="border border-black w-5/12">Description</th>
                <th class="border border-black w-1/12">Due_Date</th>
                <th class="border border-black w-1/12">Delete</th>
                <th class="border border-black w-1/12">Update</th>
            </tr>
            <?php
            if (count($runQuery) === 0) {
                echo "Task Not Found Please Create a Task";
            } else {
                foreach ($runQuery as $rows) {
                    ?>
                    <tr class="bg-orange-100 hover:bg-orange-200">
                        <td class="border border-black"><?php echo $rows['name']; ?></td>
                        <td class="border border-black"><?php echo $rows['description'] ?></td>
                        <td class="border border-black"><?php echo $rows['due_date'] ?></td>
                        <td class="border border-black font-bold text-white hover:bg-red-600 transition bg-red-700">
                            <a href="index.php?function=deleteTask&id=<?php echo $rows['id'] ?>" onclick="return myfunction()">Delete</a>
                        </td>
                        <td class="border border-black font-bold text-white hover:bg-green-600 transition bg-green-700">
                            <a href="index.php?function=updateTask&id=<?php echo $rows['id'] ?>">Update</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
</main>
<!--End Main-->
</body>
<script>
    function myfunction() {
        return confirm("are you want to delete");
    }

    function logout(){
        return confirm("are you want to Logout");
    }
</script>
</html>