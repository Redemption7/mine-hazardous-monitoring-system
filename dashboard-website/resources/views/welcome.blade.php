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
            <a href="{{ route('register') }}" class="hover:text-darkGrayishBlue">Register</a>
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
<!-- Hero Section -->
<section id="hero">
    <div class="container flex flex-col-reverse md:flex-row items-center-px-6 mx-auto mt-10 space-y-0 md:space-y-0">
        <!-- Left items -->
        <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
            <h1 class="max-w-md text-4xl font-bold text-center md:text-3xl md:text-left">
                MINE HAZARD MONITORING SYSTEM
            </h1>
            <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
                The Mine Monitoring System makes it simple for mines to keep track of their greatest assets Human Capital
                , Ensuring they are safe by monitoring both the workers and their environment
                in real time
            </p>
            <div class="flex justify-center md:justify-start">
                <a href="#" class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full
                    baseline hover:bg-brightRedLight">
                    Live Monitoring
                </a>
            </div>
        </div>

        <!-- Image -->
        <div class="md:w-1/2">
            <img src="img/illustration-intro.svg" alt="">
        </div>

    </div>
</section>

<!-- Features Section -->
<section id="features">
    <!-- Flex Container -->
    <div class="container flex flex-col px-4 mx-auto mt-10 space-y-12 md:space-y-0 md:flex-row">
        <!-- Whats's Different -->
        <div class="flex-col space-y-12 md:w-1/2">
            <h2 class="max-w-md text-4xl font-bold text-center md:text-left">
                Main Objectives?
            </h2>
            <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">

            </p>
        </div>
        <!-- Numbered List -->
        <div class="flex flex-col space-y-8 md:w-1/2">
            <!-- List Item 1 -->
            <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                <!--Heading  -->
                <div class="rounded-l-ful bg-brightRedSupLight md:bg-transparent">
                    <div class="flex flex-center space-x-2">
                        <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                            01
                        </div>
                        <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Make Sure Employees Are Sober!
                        </h3>
                    </div>
                </div>

                <div>
                    <h3 class="hidden mb-4 text-lg font-bold md:block">
                        Make Sure Employees Are Sober!
                    </h3>
                    <p class="text-darkGrayishBlue">
                        To avoid potential hazards caused by, operating mine machinery why
                        under the influence of alcohol
                    </p>
                </div>
            </div>
            <!-- List Item 2 -->
            <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                <!--Heading  -->
                <div class="rounded-l-ful bg-brightRedSupLight md:bg-transparent">
                    <div class="flex flex-center space-x-2">
                        <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                            02
                        </div>
                        <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Monitor Gas, Dust, and
                        </h3>
                    </div>
                </div>

                <div>
                    <h3 class="hidden mb-4 text-lg font-bold md:block">
                        Monitor Gas, Dust
                    </h3>
                    <p class="text-darkGrayishBlue">
                        Set parameters to alert when gas and dust levels have risen above threshold,
                        faster evacuation if need be to keep the mine as safe as possible
                    </p>
                </div>
            </div>
            <!-- List Item 3 -->
            <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                <!--Heading  -->
                <div class="rounded-l-ful bg-brightRedSupLight md:bg-transparent">
                    <div class="flex flex-center space-x-2">
                        <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                            03
                        </div>
                        <h3 class="text-base font-bold md:mb-4 md:hidden">
                            Keep track of time-in attendance of all the workers,
                            also enables an easy body count at any point in time
                        </h3>
                    </div>
                </div>

                <div>
                    <h3 class="hidden mb-4 text-lg font-bold md:block">
                        Everything you need in one place
                    </h3>
                    <p class="text-darkGrayishBlue">
                        Stop jumping from one service provider to another to
                        communicate, store
                        files, track tasks and share documents. Manage offers
                        all-in-one-place
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section id="testimonials">
    <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
        <!-- Heading -->
        <h2 class="text-4xl font-bold text-center">
            Top 3 workers of the month?
        </h2>
        <!-- Testimonials container  -->
        <div class="flex flex-col mt-24 md:flex-row md:space-x-6">
            <!-- Testimonial 1 -->
            <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3">
                <img src="img/avatar-anisha.png" alt="" class="w-16 mt-14" />
                <h5 class="text-lg font-bold">
                    Anisha Lee
                </h5>
                <p class="test-sm text-darkGrayishBlue">

                </p>
            </div>
            <!-- Testimonial 2 -->
            <div class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3">
                <img src="img/avatar-anisha.png" alt="" class="w-16 mt-14" />
                <h5 class="text-lg font-bold">
                    Ali Bravo
                </h5>
                <p class="test-sm text-darkGrayishBlue">

                </p>
            </div>
            <!-- Testimonial 3 -->
            <div class="hidden flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:flex md:w-1/3">
                <img src="img/avatar-richard.png" alt="" class="w-16 mt-14" />
                <h5 class="text-lg font-bold">
                    Richard
                </h5>
                <p class="test-sm text-darkGrayishBlue">

                </p>
            </div>
        </div>
        <!-- Button -->
        <div class="my-16">
            <a href="#" class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full
                baseline hover:bg-brightRedLight">
                Get Started
            </a>
        </div>
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
