<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Income Expense Tracker') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen font-sans">

    <!-- Header -->
    <header class="w-full px-6 lg:px-12 py-6">
        @if (Route::has('login'))
            <nav class="flex justify-end gap-4 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border border-gray-300 hover:border-gray-600 rounded-sm transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-1.5 border border-gray-300 hover:border-gray-600 rounded-sm transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-1.5 border border-gray-300 hover:border-gray-600 rounded-sm transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Hero Section -->
    <main class="flex-1 flex items-center justify-center px-6 lg:px-12">
        <div class="text-center w-full max-w-full">
            <!-- Title -->
            <h1 class="text-4xl lg:text-6xl font-semibold mb-4">
                Track Your Money <span class="text-red-400">Effortlessly</span>
            </h1>
            <p class="text-lg lg:text-xl text-gray-500 mb-12 max-w-4xl mx-auto">
                A simple, personal income & expense tracker built for real people.<br>
                Add transactions, categorize them, and see clear monthly summaries.
            </p>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-12 px-6 lg:px-12">
                <div class="bg-white p-6 rounded-lg ring-1 ring-gray-200 shadow-sm hover:shadow-md transition">
                    <h3 class="font-medium mb-2">📈 Track Income & Expenses</h3>
                    <p class="text-sm text-gray-500">Quickly add daily transactions with amount, date, and notes.</p>
                </div>
                <div class="bg-white p-6 rounded-lg ring-1 ring-gray-200 shadow-sm hover:shadow-md transition">
                    <h3 class="font-medium mb-2">🏷️ Custom Categories</h3>
                    <p class="text-sm text-gray-500">Create your own categories like Food, Salary, Rent, etc.</p>
                </div>
                <div class="bg-white p-6 rounded-lg ring-1 ring-gray-200 shadow-sm hover:shadow-md transition">
                    <h3 class="font-medium mb-2">📊 Monthly Reports</h3>
                    <p class="text-sm text-gray-500">See total income, expenses, and balance at a glance.</p>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center px-6 lg:px-12">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" aria-label="Register for Income Expense Tracker"
                       class="inline-block px-8 py-3 bg-red-200 text-gray-800 rounded-sm font-medium hover:bg-red-300 transition">
                        Get Started – It's Free
                    </a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" aria-label="Login to Income Expense Tracker"
                       class="inline-block px-8 py-3 border border-gray-300 rounded-sm font-medium hover:border-gray-500 transition">
                        Already have an account? Log in
                    </a>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-sm text-gray-500 w-full">
        Powered by <a href="https://github.com/shariful-git">Shariful</a> • Simple & Easy to Maintain
    </footer>

</body>
</html>
