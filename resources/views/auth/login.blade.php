<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'InExsence') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite with Tailwind CDN fallback) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="h-full bg-neutral-50 text-neutral-900 antialiased selection:bg-emerald-500 selection:text-white dark:bg-neutral-950 dark:text-neutral-100">
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden py-12 sm:px-6 lg:px-8">
        <!-- Subtle background decorative blur effects -->
        <div class="pointer-events-none absolute inset-0 -z-10 flex items-center justify-center overflow-hidden">
            <div class="h-96 w-96 rounded-full bg-emerald-400/20 blur-3xl filter dark:bg-emerald-600/15"></div>
            <div class="-ml-24 h-96 w-96 rounded-full bg-teal-400/20 blur-3xl filter dark:bg-teal-500/10"></div>
        </div>

        <!-- Header / Logo -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 transition-transform hover:scale-105">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-md shadow-emerald-500/25">
                    <!-- Icon: Income & Expense (InExsence) -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                    InEx<span class="text-emerald-600 dark:text-emerald-400">sence</span>
                </span>
            </a>
            <h2 class="mt-6 text-2xl font-bold tracking-tight text-neutral-900 sm:text-3xl dark:text-white">
                Welcome back
            </h2>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                Sign in to your account to manage your income & expenses
            </p>
        </div>

        <!-- Login Card -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[440px] px-4 sm:px-0">
            <div class="rounded-2xl border border-neutral-200/80 bg-white p-6 shadow-xl shadow-neutral-200/50 sm:p-8 dark:border-neutral-800 dark:bg-neutral-900/90 dark:shadow-none backdrop-blur-xl">

                <!-- Session Status (e.g. password reset link sent) -->
                @if (session('status'))
                    <div class="mb-5 flex items-center gap-3 rounded-lg border border-emerald-200 bg-emerald-50/80 p-3.5 text-sm text-emerald-800 dark:border-emerald-800/40 dark:bg-emerald-950/40 dark:text-emerald-300">
                        <svg class="h-5 w-5 shrink-0 text-emerald-600 dark:text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Validation Errors Alert -->
                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50/80 p-3.5 text-sm text-red-700 dark:border-red-900/50 dark:bg-red-950/40 dark:text-red-300">
                        <div class="flex items-center gap-2 font-medium">
                            <svg class="h-4 w-4 shrink-0 text-red-600 dark:text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            <span>Please check the credentials you entered:</span>
                        </div>
                        <ul class="mt-1.5 list-inside list-disc space-y-0.5 text-xs text-red-600 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                            Email address
                        </label>
                        <div class="relative mt-1.5">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="you@example.com"
                                class="block w-full rounded-xl border border-neutral-300 bg-white py-2.5 pl-11 pr-4 text-sm text-neutral-900 placeholder-neutral-400 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 dark:border-neutral-700 dark:bg-neutral-800/80 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-400/20 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 dark:border-red-500 @enderror"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-500 hover:underline dark:text-emerald-400 dark:hover:text-emerald-300">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="relative mt-1.5">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-neutral-400">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="block w-full rounded-xl border border-neutral-300 bg-white py-2.5 pl-11 pr-11 text-sm text-neutral-900 placeholder-neutral-400 transition focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 dark:border-neutral-700 dark:bg-neutral-800/80 dark:text-neutral-100 dark:placeholder-neutral-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-400/20 @error('password') border-red-500 focus:border-red-500 focus:ring-red-500/20 dark:border-red-500 @enderror"
                            >
                            <!-- Show / Hide Password toggle -->
                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-neutral-400 hover:text-neutral-600 dark:hover:text-neutral-200"
                                aria-label="Toggle password visibility"
                            >
                                <!-- Eye Icon -->
                                <svg id="eyeIcon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Eye Off Icon -->
                                <svg id="eyeOffIcon" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="h-4 w-4 rounded border-neutral-300 text-emerald-600 focus:ring-emerald-500 dark:border-neutral-700 dark:bg-neutral-800 dark:ring-offset-neutral-900"
                        >
                        <label for="remember_me" class="ml-2.5 block text-sm text-neutral-600 dark:text-neutral-400 select-none cursor-pointer">
                            Keep me signed in
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-1">
                        <button
                            type="submit"
                            class="group relative flex w-full justify-center rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 py-3 px-4 text-sm font-semibold text-white shadow-md shadow-emerald-500/20 transition-all duration-200 hover:from-emerald-500 hover:to-teal-500 hover:shadow-lg hover:shadow-emerald-500/30 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 active:scale-[0.99] dark:focus:ring-offset-neutral-900 cursor-pointer"
                        >
                            <span class="flex items-center gap-2">
                                <span>Sign in</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Optional divider & sign up prompt -->
                <div class="mt-6 pt-6 border-t border-neutral-200/80 text-center text-sm text-neutral-600 dark:border-neutral-800 dark:text-neutral-400">
                    Don't have an account?
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 hover:underline dark:text-emerald-400 dark:hover:text-emerald-300">
                            Create an account
                        </a>
                    @else
                        <a href="{{ url('/register') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 hover:underline dark:text-emerald-400 dark:hover:text-emerald-300">
                            Create an account
                        </a>
                    @endif
                </div>
            </div>

            <!-- Back to Home Link -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-xs text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 transition">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to home
                </a>
            </div>
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function () {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                eyeIcon.classList.toggle('hidden', isPassword);
                eyeOffIcon.classList.toggle('hidden', !isPassword);
            });
        }
    </script>
</body>
</html>

