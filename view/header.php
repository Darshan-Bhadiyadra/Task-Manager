<header class=" bg-orange-700 w-full mb-14 fixd top-0 left-0 right-0">
    <div class="flex p-4 text-center">
        <div class="w-11/12">
            <nav>
                <ul class="text-orange-50 flex font-semibold text-xl">
                    <li class="px-24"><a class="hover:text-orange-200 capitalize transistion duration-300" href="index.php?function=dashboard">dashboard</a></li>
                    <li class="px-24"><a class="hover:text-orange-200 capitalize transistion duration-300" href="index.php?function=createTask">create task</a></li>
                    <li class="px-24"><a class="hover:text-orange-200 capitalize transistion duration-300" href="index.php?function=viewTask">view task</a></li>
                </ul>
            </nav>
        </div>
        <div class="w-2/12 text-white font-semibold capitalize text-center hover:text-orange-200">
            <?php //@todo controller function should be logout ?>
            <a class="bg-orange-600 hover:bg-orange-800  transistion duration-300 py-3 px-6 text-xl" href="index.php?function=logout" onclick="return logout()">logout</a>
        </div>
    </div>
</header>