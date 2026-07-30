<nav class="bg-indigo-700 fixed w-full z-20 top-0 start-0 border-b border-default">

  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="./components/favicon.jpg" class="h-10 rounded rounded-sm" alt="Jkyber" />
      <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">JKyber Dev Jobs</span>
    </a>

    <div class="inline-flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

      <a href="./auth/sign-up.php"
        class="text-white bg-blue-950 hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded rounded-xl text-sm px-3 py-2 focus:outline-none cursor-pointer">Get
        started</a>

      <button data-collapse-toggle="navbar-cta" type="button"
        class="inline-flex items-center p-2 w-9 h-9 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
        aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
          viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
        </svg>
      </button>

    </div>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">

      <ul
        class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-xl bg-indigo-700 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-indigo-700 text-center">
        <li>
          <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-500"
            aria-current="page">Home</a>
        </li>
        <li>
          <a href="/job-portal/about.php"
            class="block py-2 px-3 text-white rounded hover:bg-gray-500">About</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-white rounded hover:bg-gray-500">Services</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-white rounded hover:bg-gray-500">Contact</a>
        </li>
      </ul>

    </div>
    
  </div>

</nav>