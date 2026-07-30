<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKyber Dev Jobs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="./components/favicon.jpg">
</head>

<body class="text-white">

    <?php include 'components/header.php' ?>

    <!-- Showcase -->
    <section
        class="relative bg-indigo-400 p-20 md:p-30 bg-[url('./components/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
            <div class="w-auto inline-flex items-center p-1 pe-2 mb-4 text-sm text-fg-brand-strong rounded-full bg-indigo-600 border border-brand-subtle mb-15"
                role="alert">
                <span class="bg-indigo-400 text-fg-brand-strong py-0.5 px-2 rounded-full">New</span>
                <div class="ms-2 text-sm">
                    Great job! You've acknowledged this <a href="#"
                        class="font-medium underline hover:no-underline">significant</a> alert message.
                </div>
                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 5 7 7-7 7" />
                </svg>
            </div>
            <h1 class="mb-6 text-4xl font-bold tracking-tighter text-heading md:text-5xl lg:text-6xl">We invest in the
                world’s potential</h1>
            <p class="mb-8 text-base font-normal text-body md:text-xl">Here at JKyber Digitals we focus on markets where
                technology, innovation, and capital can unlock long-term value and drive economic growth.</p>


            <form action="/job-portal/auth/sign-up.php" class="max-w-md mx-auto">
                <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-3 px-9 bg-indigo-400 text-heading text-sm rounded-md focus:bg-indigo-700 focus:border-indigo-300 shadow-4xl placeholder:text-body"
                        placeholder="Search" required />
                    <button type="submit"
                        class="absolute end-1.5 bottom-1.5 text-white bg-blue-700 hover:bg-blue-800 box-border border border-transparent focus:ring-4 focus:ring-blue-medium shadow-2xl font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none cursor-pointer">Search</button>
                </div>
            </form>

        </div>
        <div
            class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0">
        </div>
    </section>


    <!-- Card Section -->
    <div
        class="bg-white w-full text-black p-5 mt-6 my-auto flex md:flex-row flex-col gap-5 container mx-auto justify-center">

        <div class="bg-gray-100 w-full block p-6 border border-default rounded rounded-xl shadow shadow-2xl">
            <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">For Developers</h5>
            <p class="text-body mb-4">Browse our job listings and start your career today. </p>

            <a href="./auth/sign-up.php" 
                class="inline-flex items-center text-white bg-indigo-500 box-border border border-transparent hover:bg-indigo-700 shadow-xs font-medium leading-5 rounded-sm text-sm px-4 py-2.5 cursor-pointer">
                Browse Jobs
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>

        <div class="w-full bg-indigo-100 block p-6 border border-default rounded rounded-xl shadow shadow-2xl">
            <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">For Employers</h5>
            <p class="text-body mb-4">List your job to find the perfect developer for the role </p>
            <a href="./auth/sign-up.php" 
                class="inline-flex items-center text-white bg-indigo-500 box-border border border-transparent hover:bg-indigo-700 shadow-xs font-medium leading-5 rounded-sm text-sm px-4 py-2.5 cursor-pointer">
                Create your listing
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>

    </div>

    <!-- Recent Jobs Section -->
    <?php include 'components/recent-jobs.php'; ?>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Target the button and the collapsible menu wrapper
            const toggleBtn = document.querySelector('[data-collapse-toggle="navbar-cta"]');
            const menu = document.getElementById('navbar-cta');

            if (toggleBtn && menu) {
                toggleBtn.addEventListener('click', () => {
                    // 2. Toggle Tailwind's 'hidden' class on the menu
                    menu.classList.toggle('hidden');

                    // 3. Keep accessibility attribute updated
                    const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
                    toggleBtn.setAttribute('aria-expanded', !isExpanded);
                });
            }
        });
    </script>
</body>

</html>