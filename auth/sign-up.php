<?php
require 'auth_functions.php';

$response = null;

if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['user_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $role = htmlspecialchars(trim($_POST['role'])); // Captured role ('developer' or 'employer')
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Pass $role to your service function
    $response = $authService->registerUser($name, $email, $role, $password, $confirm_password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - JKyber Labs</title>
    <link rel="icon" href="../components/favicon.jpg">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[url('../components/hero-pattern-dark.svg')]">

    <main class="max-w-4xl flex items-center mx-auto md:min-h-screen p-4 md:p-8">
        <div
            class="grid bg-gray-100 items-center gap-y-10 border border-slate-100 [box-shadow:0_2px_10px_-3px_rgba(14,14,14,0.3)] rounded-lg overflow-hidden md:grid-cols-3">

            <div
                class="flex flex-col justify-center space-y-6 min-h-full bg-gradient-to-r from-slate-900 to-slate-700 p-6 max-md:order-1 md:space-y-16">
                <div>
                    <h2 class="text-white text-lg font-medium">Create Your Account</h2>
                    <p class="text-sm text-slate-400 mt-4 leading-relaxed">Welcome to our registration page! Get started
                        by creating your account.</p>
                </div>
                <div>
                    <h2 class="text-white text-lg font-medium">Simple & Secure Registration</h2>
                    <p class="text-sm text-slate-400 mt-4 leading-relaxed">Our registration process is designed to be
                        straightforward and secure. We prioritize your privacy and data security.</p>
                </div>
            </div>

            <div class="w-full py-6 px-6 max-w-lg mx-auto md:col-span-2 md:px-14">

                <div class="mb-10 flex flex-row gap-3">
                    <a href="/job-portal/index.php"
                        class="mr-5 rounded-xl bg-indigo-700 text-md font-bold text-white px-5 py-2">Home</a>
                    <h1 class="text-slate-900 text-2xl font-bold my-auto">Create an account</h1>
                </div>

                <form class="space-y-6 mb-4" method="POST" action="">
                    <div>
                        <label for="name" class="mb-2 text-slate-900 font-medium text-sm inline-block">Name</label>
                        <input type="text" id="name" name="user_name" placeholder="Enter your name" required
                            class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                    </div>
                    <div>
                        <label for="email" class="mb-2 text-slate-900 font-medium text-sm inline-block">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                    </div>
                    <div>
                        <label for="password"
                            class="mb-2 text-slate-900 font-medium text-sm inline-block">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                            class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                    </div>
                    <div>
                        <label for="confirm-password"
                            class="mb-2 text-slate-900 font-medium text-sm inline-block">Confirm password</label>
                        <input type="password" id="confirm-password" name="confirm_password" placeholder="••••••••"
                            required
                            class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                    </div>

                    <div>
                        <label for="role" class="mb-2 text-slate-900 font-medium text-sm inline-block">I want to sign up
                            as</label>
                        <select id="role" name="role" required
                            class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 cursor-pointer">
                            <option value="" disabled selected>Select your account type</option>
                            <option value="developer">Developer / Job Seeker</option>
                            <option value="employer">Employer / Recruiter</option>
                        </select>
                    </div>

                    <div class="flex items-start flex-wrap gap-2">
                        <label class="flex items-center group has-[input:checked]:text-slate-900">
                            <input id="tmc" name="terms_accepted" type="checkbox" required class="sr-only" />
                            <span
                                class="flex h-4 w-4 shrink-0 items-center justify-center rounded outline-1 outline-slate-300 bg-white group-has-[input:checked]:bg-blue-600 group-has-[input:checked]:outline-blue-600 group-focus-within:outline-2 group-focus-within:outline-blue-600"
                                aria-hidden="true">
                                <svg class="size-3 text-white opacity-0 group-has-[input:checked]:opacity-100"
                                    viewBox="0 0 12 10" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 5l3 3 7-7" />
                                </svg>
                            </span>
                            <span class="ml-3 text-sm text-slate-700">
                                I accept the
                            </span>
                        </label>

                        <a href="#"
                            class="ml-1 text-sm font-medium text-blue-700 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                            Terms and Conditions
                        </a>
                    </div>

                    <button type="submit" name="submit"
                        class="w-full py-2 px-3.5 text-sm rounded-md font-semibold cursor-pointer tracking-wide text-white border border-blue-600 bg-indigo-600 hover:bg-indigo-700 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                        Create an account
                    </button>
                </form>

                <section>
                    <hr class="border-gray-400 my-4">
                    <p class="text-center mt-3 font-bold text-gray-500 mb-5">Or Continue With</p>

                    <div class="flex flex-col gap-3">
                        <a href="#"
                            class="inline-flex items-center justify-center gap-2.5 py-2 px-3.5 text-sm rounded-md font-semibold text-slate-900 border border-slate-300 bg-white hover:bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] overflow-visible"
                                viewBox="0 0 512 512" aria-hidden="true">
                                <path fill="#fbbd00"
                                    d="M120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308H52.823C18.568 144.703 0 198.922 0 256s18.568 111.297 52.823 155.785h86.308v-86.308C126.989 305.13 120 281.367 120 256z" />
                                <path fill="#0f9d58"
                                    d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216C305.044 385.147 281.181 392 256 392z" />
                                <path fill="#31aa52"
                                    d="m139.131 325.477-86.308 86.308a260.085 260.085 0 0 0 22.158 25.235C123.333 485.371 187.62 512 256 512V392c-49.624 0-93.117-26.72-116.869-66.523z" />
                                <path fill="#3c79e6"
                                    d="M512 256a258.24 258.24 0 0 0-4.192-46.377l-2.251-12.299H256v120h121.452a135.385 135.385 0 0 1-51.884 55.638l86.216 86.216a260.085 260.085 0 0 0 25.235-22.158C485.371 388.667 512 324.38 512 256z" />
                                <path fill="#cf2d48"
                                    d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606C388.668 26.629 324.381 0 256 0l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z" />
                                <path fill="#eb4132"
                                    d="M256 120V0C187.62 0 123.333 26.629 74.98 74.98a259.849 259.849 0 0 0-22.158 25.235l86.308 86.308C162.883 146.72 206.376 120 256 120z" />
                            </svg>
                            Google
                        </a>

                        <a href="#"
                            class="inline-flex items-center justify-center gap-2.5 py-2 px-3.5 text-sm rounded-md font-semibold text-slate-900 border border-slate-300 bg-white hover:bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] overflow-visible"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.197 22 16.44 22 12.017 22 6.484 17.522 2 12 2z" />
                            </svg>
                            GitHub
                        </a>
                    </div>
                </section>

                <div class="mt-6 text-slate-900 text-sm text-center">
                    Already have an account?
                    <a href="./sign-in.php"
                        class="text-blue-700 hover:underline ml-1 font-medium focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                        Login here
                    </a>
                </div>

                <div class="mt-4 text-center text-black">
                    <?php if ($response): ?>
                        <?php if (is_array($response) && isset($response['msg']) && $response['msg'] === "success"): ?>
                            <p class="text-center text-green-600 font-medium">Your registration was a success</p>
                        <?php elseif (is_string($response)): ?>
                            <p class="text-red-500 font-medium"><?php echo $response; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>