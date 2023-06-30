<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'view/head.php'; ?>
    <title>User Login Page</title>
</head>
<body class="bg-orange-950 flex justify-center">
<div class="bg-orange-800 rounded-xl w-96 mt-56">
    <div class="p-8 grid place-items-center">
        <div class="text-center text-white mt-4 font-sans font-bold text-3xl">
            <h1>Login Here</h1>
        </div>
        <form action="index.php?function=login" method="post">
            <div class="mt-6">
                <label class="text-white" for="username">Username</label>
                <input class="mt-1 p-2 w-80 bg-orange-400 placeholder-black" type="text" title="Username" placeholder="Enter a Username" id="username" name="username"
                value="<?php if (isset($_COOKIE["user"])) {
                    echo $_COOKIE["user"];
                }?>" required>
            </div>
            <div class="mt-5">
                <label class="text-white" for="pass">Password</label>
                <input class="mt-1 p-2 w-80 bg-orange-400 placeholder-black" type="password" title="Password" placeholder="Enter a Password" id="pass" name="pass" required>
            </div>
            <div class="mt-5 flex">
                <span><input class=" accent-orange-400" type="checkbox" title="save data in cookie" id="remember" name="remember" <?php if (isset($_COOKIE["user"])) {
                    echo "checked";
                }?>></span>
                <label class="text-white" for="remember">&nbsp;Remember me</label>
            </div>
            <button class="mt-6 py-3 px-2 bg-orange-950 hover:bg-orange-600 text-white w-80 text-xl font-semibold text-center transistion duration-300" type="submit" name="submit" onclick="return login()">Login</button>
            <a class=" mt-5 text-white font-bold grid place-items-center" href="index.php?function=user">Register</a>
        </form>
    </div>
    <div class="text-center text-white text-lg animate-bounce">
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        } ?>
    </div>
</div>
</body>
</html>