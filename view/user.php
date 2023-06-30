<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'view/head.php'; ?>
    <title>user-register page</title>
</head>
<body class="bg-orange-950 flex justify-center">
    <div class="bg-orange-800 rounded-xl w-96 mt-56">
        <div class="p-8">
            <div class="text-center text-white mt-3 font-sans font-bold text-3xl">
                <h1>Register Here</h1>
            </div>
            <form  method="post" action="index.php?function=user">
                <div class="mt-7">
                    <label class="text-white flex" for="username">
                        Username
                        &nbsp;&nbsp;
                        <span>
                        <?php if (array_key_exists('name', $_COOKIE)): ?>
                            <div class="text-red-200 animate-pulse">
                                <?php echo $_COOKIE['name']; setcookie('name', '', -1)?>
                            </div>
                        <?php endif; ?>
                    </span>
                    </label>
                    <input class="mt-1 p-2 w-80 bg-orange-400 placeholder:text-black caret-orange-800 outline-none" type="text" placeholder="Enter a Username" name="username" id="username" title="Username">
                </div>
                <div class="mt-5">
                    <label class="text-white flex" for="pass">
                        Password
                        &nbsp;&nbsp;
                        <span>
                        <?php if (array_key_exists('pass', $_COOKIE)): ?>
                            <div class="text-red-200 animate-pulse">
                                <?php echo $_COOKIE['pass']; setcookie('pass', '', -1)?>
                            </div>
                        <?php endif; ?>
                    </span>
                    </label>
                    <input class="mt-1 p-2 w-80 bg-orange-400 placeholder:text-black caret-orange-800 outline-none" type="text" placeholder="Enter a Password" name="pass" id="pass" title="Password">
                </div>
                <?php //@todo validate email ?>
                <div class="mt-5">
                    <label class="text-white flex" for="email">
                        E-mail
                        &nbsp;&nbsp;
                        <span>
                        <?php if (array_key_exists('error', $_COOKIE)): ?>
                            <div class="text-red-200 animate-pulse">
                                <?php echo $_COOKIE['error']; setcookie('error', '', -1)?>
                            </div>
                        <?php endif; ?>
                    </span>
                    </label>
                    <input class="mt-1 p-2 w-80 bg-orange-400 placeholder:text-black caret-orange-800 outline-none" type="text" placeholder="Enter a email" name="email" id="email" title="E-mail">
                </div>
                <button class="mt-8 py-3 bg-orange-950 text-white w-full font-semibold hover:bg-orange-600 transistion duration-300" type="submit" name="submit">Register</button>
                <a class="text-white font-bold grid place-items-center mt-6" href="index.php?function=login">Login</a>
            </form>
        </div>
    </div>
</body>
</html>

