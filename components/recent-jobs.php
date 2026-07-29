<?php require_once './lib/database.php'; ?>
<?php

$latestJobs = $db->getAllDataFromTable("SELECT * FROM jobs LIMIT 3");
$jobs = $latestJobs['data'];


?>



<!-- Recent Jobs section -->
<div class="bg-blue-50 text-black md:p-25 p-19 mt-4">

    <h1 class="text-center font-bold text-black text-4xl mb-15">Recent Jobs</h1>

    <div class="flex flex-col md:flex-row gap-6 sm:gap-10 justify-center items-center">

        <?php foreach($jobs as $job): ?>
        <div class="flex flex-col items-center justify-center max-h-xl">


            <div class="bg-indigo-100 block max-w-sm p-6 border border-default rounded-xl shadow-2xl">
                <a href="#">
                    <img class="rounded-xl" src="<?php echo "/job-portal/$job->job_image" ; ?>" />
                </a>
                <a href="#">
                    <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading"><?php echo $job->job_title; ?></h5>
                </a>
                <p class="mb-6 text-body"><?php echo $job->job_description; ?></p>
                <a href="/job-portal/auth/sign-up.php"
                    class="inline-flex items-center text-white bg-indigo-700 box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-md text-sm px-4 py-2.5 focus:outline-none">
                    Read more
                    <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>

        </div>
        <?php endforeach; ?>

    </div>

</div>