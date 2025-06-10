<nav class="navbar px-10 md:flex md:justify-between md:items-center md:px-24 md:py-4 max-w-[100rem] mx-auto">
    <div class="nav-items" id="nav-items">
        <img class="h-[36px] md:h-[42px]" src="../assets/img/index/kostintxt.svg" alt="kostin-logo" width="180"
            height="40" class="logo">
        <div class="user-menu hidden md:hidden lg:flex" id="user-menu md:flex mr-4 ml-4">
            <ul class="nav-links ">
                <li><a href="../apps/home.php">Home</a></li>
                <li><a href="../apps/logout.php">About</a></li>
                <li><a href="../apps/logout.php">Service</a></li>
                <li><a href="../apps/logout.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="flex gap-4 flex-row md:flex-row items-center justify-between">
        <a href="../apps/sewakan.php"
            class="hidden md:hidden lg:flex items-center justify-center bg-[#2966CB] text-white px-[30px] py-[12px] rounded-full h-[42px] text-center transition ease-in-out duration-300 hover:bg-[#3482ff] hover:scale-105">
            Sewakan Rumah Anda
        </a>
        <a class="user-icon" href="../apps/profil.php">
            <img class="h-[36px] md:h-[42px]" src="../assets/img/index/account_profile_user.png" alt="User Icon">
        </a>

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="w-xs flex md:flex lg:hidden md:w-xl "
            type="button"><img class="h-[36px] md:h-[42px]" src="../assets/img/index/hamburger.svg" alt="User Icon">
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="../apps/home.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
                </li>
                <li>
                    <a href="../apps/sewakan.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sewakan
                        Kos</a>
                </li>
                <li>
                    <a href="../apps/tentang.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About</a>
                </li>
                <li>
                    <a href="../apps/layanan.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Service</a>
                </li>
                <li>
                    <a href="../apps/kontak.php"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>