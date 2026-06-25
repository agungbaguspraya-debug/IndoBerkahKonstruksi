<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex flex-col">
    @include('layout.header')

    <div class="flex-1 flex items-center justify-center px-4 py-24 md:py-32">

        <form action="/login" method="POST"
            class="w-full max-w-sm md:max-w-md bg-white/80 backdrop-blur-xl
            shadow-2xl rounded-3xl p-6 md:p-8 border border-zinc-200 space-y-5">

            @csrf

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Header -->
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-zinc-800">
                    Welcome Back
                </h1>
                <p class="text-zinc-500 mt-1 text-sm md:text-base">
                    Login untuk melanjutkan
                </p>
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label class="text-sm text-zinc-600">Email</label>
                <input type="email" name="email" placeholder="Masukkan email"
                    class="w-full px-4 py-3 rounded-2xl border border-zinc-300
                    bg-white/70 focus:outline-none focus:ring-2
                    focus:ring-black focus:border-transparent transition text-sm md:text-base">
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label class="text-sm text-zinc-600">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-2xl border border-zinc-300
                    bg-white/70 focus:outline-none focus:ring-2
                    focus:ring-black focus:border-transparent transition text-sm md:text-base">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full py-3 rounded-2xl bg-black text-white
                font-medium hover:bg-zinc-800 transition duration-300
                shadow-lg hover:shadow-black/20 text-sm md:text-base">
                Login
            </button>

            <!-- Register link -->
            <p class="text-center text-sm text-zinc-500">
                Belum punya akun?
                <a href="/register" class="text-black font-medium hover:underline">
                    Register
                </a>
            </p>

        </form>

    </div>
</body>
</html>