<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

</head>
<body>
<?php require "../templates/navigation.php"; ?>

<div class="flex min-h-screen items-center justify-center">
    <div class="relative flex flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
        <h4 class="block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            Login
        </h4>
        <p class="mt-1 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
            Enter your details to login.
        </p>
        <form class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96" method="post" action="../controllers/login.php">
            <div class="mb-4 flex flex-col gap-6">

                <div class="relative h-11 w-full min-w-[200px]">
                    <input
                            class="peer h-full w-full rounded-md border border-blue-gray-200 bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                            placeHolder="Email"
                            name="email"
                    />

                </div>
                <div class="relative h-11 w-full min-w-[200px]">
                    <input
                            type="password"
                            class="peer h-full w-full rounded-md border border-blue-gray-200 bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                            placeHolder="Password"
                            name="password"
                    />

                </div>
            </div>

            <input
                    class="mt-6 block w-full select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="submit"
                    value="Register"
            >


            <p class="mt-4 block text-center font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                Forgot a password?
                <a
                        class="font-semibold text-pink-500 transition-colors hover:text-blue-700"
                        href=""

                >
                    Restart password
                </a>
            </p>
        </form>

    </div>
</div>


</body>
</html>


