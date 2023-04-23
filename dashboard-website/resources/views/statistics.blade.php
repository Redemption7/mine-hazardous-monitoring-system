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
<x-navigation />

<!-- Graphs  -->
<section class="mx-auto p-6">
    <div class="flex items-center justify-center">
        <div class="pr-4 w-3/4 md:w-3/12">
            <div class="mx-auto overflow-hidden">
                <canvas
                    data-te-chart="pie"
                    data-te-dataset-label="AIR QUALITY"
                    data-te-labels="['Dust', 'Harmful Gas' , 'Oxygen' ]"
                    data-te-dataset-data="[2112, 2343, 2545]"
                    data-te-dataset-background-color="['rgba(63, 81, 181, 0.5)', 'rgba(77, 182, 172, 0.5)', 'rgba(66, 133, 244, 0.5)']">
                </canvas>
            </div>
        </div>

        <div class="hidden md:flex h-[250px] min-h-[1em] w-px self-stretch bg-gradient-to-tr from-transparent via-neutral-500 to-transparent opacity-20 dark:opacity-100"></div>

        <div class="hidden md:block pl-4 pb-4 w-3/12">

            <div class="mx-auto overflow-hidden">
                <canvas
                    data-te-chart="line"
                    data-te-dataset-label="Employee Attendance"
                    data-te-labels="['Monday', 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday ']"
                    data-te-dataset-data="[3, 0, 0, 0, 0, 0, 0]">
                </canvas>
            </div>

        </div>
    </div>

</section>

<!-- Main content -->
<section id="alert" class="mx-auto container w-1/4">

    <div class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700"
        role="alert">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="h-5 w-5">
              <path fill-rule="evenodd"
                  d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                  clip-rule="evenodd" />
            </svg>
          </span>
            A simple success alert - check it out!
    </div>
    <div class="mb-3 inline-flex w-full items-center rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700"
        role="alert">
      <span class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-5 w-5">
          <path fill-rule="evenodd"
              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
              clip-rule="evenodd" />
        </svg>
          </span>
                A simple danger alert - check it out!
    </div>
    <div class="mb-3 inline-flex w-full items-center rounded-lg bg-warning-100 px-6 py-5 text-base text-warning-800"
        role="alert">
      <span class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-5 w-5">
          <path fill-rule="evenodd"
              d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
              clip-rule="evenodd" />
        </svg>
      </span>
        A simple warning alert - check it out!
    </div>

</section>

<!-- Main content -->
<section class="container mx-auto p-6">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">Class</th>
                            <th scope="col" class="px-6 py-4">Heading</th>
                            <th scope="col" class="px-6 py-4">Heading</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Default
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Primary
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-secondary-200 bg-secondary-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Secondary
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-success-200 bg-success-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Success
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-danger-200 bg-danger-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Danger
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-warning-200 bg-warning-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Warning
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-info-200 bg-info-100 text-neutral-800">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Info
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-neutral-100 bg-neutral-50 text-neutral-800 dark:bg-neutral-50">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Light
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        <tr
                            class="border-b border-neutral-700 bg-neutral-800 text-neutral-50 dark:border-neutral-600 dark:bg-neutral-700">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                Dark
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                            <td class="whitespace-nowrap px-6 py-4">Cell</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<x-footer />

</body>
</html>
