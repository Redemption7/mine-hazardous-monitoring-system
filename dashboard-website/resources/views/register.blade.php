<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Landing Page</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<!-- Navbar -->
<nav class="relative container mx-auto p-6">
    <!-- Flex container -->
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="pt-2">
            <img src="img/logo.jpg" class="w-36" alt="">
        </div>
        <!-- Menu Items -->
        <div class="hidden md:flex space-x-6">
            <a href="#" class="hover:text-darkGrayishBlue">Home</a>
            <a href="#" class="hover:text-darkGrayishBlue">Statistics</a>
            <a href="#" class="hover:text-darkGrayishBlue">About Us</a>
            <a href="#" class="hover:text-darkGrayishBlue">Register</a>
        </div>
        <!-- Button -->
        <a href="#" class="hidden md:flex p-3 px-6 pt-2 text-white bg-brightRed rounded-full
        baseline hover:bg-brightRedLight">
            Login Now
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

<section id="register" class="center">
    <div class="container flex flex-col-reverse md:flex-col items-center-px-6 mx-auto mt-10 space-y-0 md:space-y-0">
        <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
            </div>
            <div>
                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                <input type="text" id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Digging" required>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div>
        <div class="mb-6">
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
            <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
            </div>
            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
        </div>
        <div class="flex flex-col items-end text-center mb-6">
            <button type="submit" class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full
            shadow-2xl baseline hover:bg-brightRedLight">Submit</button>
        </div>
    </form>

    </div>
</section>
<!-- CTA Section -->
<section id="cta" class="bg-brightRed">
    <!-- Flex Container -->
    <div class="container flex flex-col items-center justify-between px-6 py-24 mx-auto space-y-12 md:flex md:flex-row md:space-y-0">
        <!-- Heading  -->
        <h2 class="text-5xl font-bold leading-tight text-center text-white md:max-w-xl md:text-left">
            Simplify How Your Team Works Today
        </h2>
        <div>
            <a href="#" class="p-3 px-6 pt-2 text-white bg-white rounded-full
                shadow-2xl baseline hover:bg-brightRedLight">
                Get Started
            </a>
        </div>
    </div>

</section>

<!-- footer -->
<footer class="bg-veryDarkBlue">
    <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
        <!-- Logo and Special Links container -->
        <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">
            <div class="mx-auto my-6 text-center text-white md:hidden">
                Copyright &copy; 2022, All Rights Reserved
            </div>
            <div>
                <img src="img/logo.jpg" alt="" class="h-8 w-36">
            </div>
            <!-- Social Links Container -->
            <div class="flex justify-center space-x-4">
                <!-- Link 1 -->
                <a href="">
                    <img src="img/icon-facebook.svg" alt="" class="h-8">
                </a>
                <!-- Link 2 -->
                <a href="">
                    <img src="img/icon-youtube.svg" alt="" class="h-8">
                </a>
                <!-- Link 3 -->
                <a href="">
                    <img src="img/icon-twitter.svg" alt="" class="h-8">
                </a>
                <!-- Link 4 -->
                <a href="">
                    <img src="img/icon-pinterest.svg" alt="" class="h-8">
                </a>
                <!-- Link 5 -->
                <a href="">
                    <img src="img/icon-instagram.svg" alt="" class="h-8">
                </a>
            </div>
        </div>
        <div class="flex justify-around space-x-32">
            <div class="flex flex-col space-y-3 text-white">
                <a href="#" class="hover:text-brightRed">Home</a>
                <a href="#" class="hover:text-brightRed">Statistics</a>
                <a href="#" class="hover:text-brightRed">About Us</a>
            </div>
            <div class="flex flex-col space-y-3 text-white">
                <a href="#" class="hover:text-brightRed">Careers</a>
                <a href="#" class="hover:text-brightRed">Community</a>
                <a href="#" class="hover:text-brightRed">Privacy Policy</a>
            </div>
        </div>
        <!-- Input Container -->
        <div class="flex flex-col justify-between">
            <form>
                <div class="flex space-x-3">
                    <input type="text" class="flex-1 px-4 rounded-full focus:outline-none"
                           placeholder="Updated in your inbox">
                    <button class="px-6 py-2 text-white rounded-full bg-brightRed hover:bg-brightRedLight focus:outline-none">
                        Go
                    </button>
                </div>
            </form>
            <div class="hidden text-white md:block">
                Copyright &copy; 2022, All Rights Reserved
            </div>
        </div>
    </div>
</footer>
</body>
</html>
