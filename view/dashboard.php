<?php
//if (!isset($_SESSION['username'])) {
//    header('location:index.php?function=login');
//}
//else{
//    header('location:index.php?function=dashboard');
//}
//exit;
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'view/head.php'; ?>
    <title>Dashboard - Page</title>
</head>
<body>
<!-- Start Header -->
<?php include 'header.php';?>
<!-- End Header -->
<!-- Main Start -->
<main>
<div class="container mx-auto">
    <div class="mt-32">
        <h2 class=" text-green-800 text-2xl font-medium">Login Successfully</h2>
        <h2 class=" text-orange-800 text-2xl font-medium"><?php echo $_SESSION['username']; ?></h2>
    </div>
    <div class="flex mt-3 gap-2">
        <div class="w-6/12">
            <img src="view/image/image_processing20210726-1298-1x1b0pi.gif" alt="dashboard" width="96%">
        </div>
        <div class="w-7/12 mb-40">
            <?php
            if (count($tasks) === 0){
                $disNone = "visibility : hidden";
            } else{
                $disNone = "visibility : visible";
            }
            ?>

                <table class="mt-16 border border-black border-collapse text-center shadow-2xl w-full" cellpadding="8" style="<?=$disNone?>">
                    <?php //@todo table header should not display if not data ?>
                    <thead>
                        <tr class="bg-orange-300">
                            <th class="border border-black w-3/12">Name</th>
                            <th class="border border-black w-5/12">Description</th>
                            <th class="border border-black w-2/12">Due Date</th>
                            <th class="border border-black w-2/12">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (count($tasks) === 0) {
                                echo "Task Not Found Please Create a Task";
                            } else {
                                foreach ($tasks as $task) {
                                    ?>
                                    <tr class="bg-orange-100 hover:bg-orange-200">
                                        <td class="border border-black"><?php echo $task['name'];?></td>
                                        <td class="border border-black"><?php echo $task['description'];?></td>
                                        <td class="border border-black"><?php echo $task['due_date'];?></td>
                                        <td class="border border-black font-bold text-white hover:bg-orange-900 transition bg-orange-700">
                                            <a href="index.php?function=viewTask">View</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div class="fixed bottom-0 left-0 right-0">
    <marquee behavior="scroll" scrollamount="10" class="bg-orange-700 text-orange-50 p-4 px-20 text-xl">Daily Add Your Task Because Which helps You Can Accomplish Your Goal. All The Best..</marquee>
</div>
</main>
<!-- Main End -->
<script>
    function logout(){
        return confirm("are you want to Logout");
    }

    function login(){
        return alert("login successfully");
    }
</script>
</body>
</html>