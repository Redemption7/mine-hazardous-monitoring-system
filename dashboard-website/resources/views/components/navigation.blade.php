<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <nav class="relative container mx-auto p-6">
        <!-- Flex container -->
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="pt-2">
                <img src="img/logo.jpg" class="w-36" alt="">
            </div>
            <!-- Menu Items -->
            <div class="hidden md:flex space-x-12">
                <a href="{{ route('home') }}" class="hover:text-darkGrayishBlue">Home</a>
                <a href="{{ route('statistics') }}" class="hover:text-darkGrayishBlue">Statistics</a>
                <a href="{{ route('register') }}" class="hover:text-darkGrayishBlue">Register</a>
            </div>
            <!-- Button -->
            <a href="#" class="hidden md:flex p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight">
                Hello, Admin
            </a>
            <!-- Hamburger Icom -->
            <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>
            </button>

            <!-- Mobile Menu  -->
            <div id="menu" class="absolute flex-col items-center self-end hidden py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
                <a href="#">Home</a>
                <a href="#">Statistics</a>
                <a href="#">About Us</a>
            </div>
        </div>
    </nav>
</div>
