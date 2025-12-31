<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-3xl font-bold text-gray-900 white:text-white mb-8">
                        Welcome back, {{ auth()->user()->name }}!
                    </h1>

                    <!-- Monthly Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                            <div class="text-sm opacity-90">Income ({{ now()->format('F Y') }})</div>
                            <div class="text-3xl font-bold mt-2">{{ number_format($income, 2) }}</div>
                        </div>

                        <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg">
                            <div class="text-sm opacity-90">Expenses ({{ now()->format('F Y') }})</div>
                            <div class="text-3xl font-bold mt-2">{{ number_format($expenses, 2) }}</div>
                        </div>

                        <div
                            class="{{ $balance >= 0 ? 'bg-blue-600' : 'bg-orange-600' }} text-white p-6 rounded-lg shadow-lg">
                            <div class="text-sm opacity-90">Balance</div>
                            <div class="text-3xl font-bold mt-2">
                                {{ $balance >= 0 ? '+' : '' }}{{ number_format($balance, 2) }}
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                        <!-- Add Transaction -->
                        <a href="{{ route('transactions.create') }}"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white p-8 rounded-lg text-center shadow transition">
                            <h2 class="text-2xl font-semibold">+ Add Transaction</h2>
                            <p class="mt-2 opacity-90">Record new income or expense</p>
                        </a>

                        <!-- Add Category -->
                        <a href="{{ route('categories.create') }}"
                            class="bg-purple-600 hover:bg-purple-700 text-white p-8 rounded-lg text-center shadow transition">
                            <h2 class="text-2xl font-semibold">+ Add Category</h2>
                            <p class="mt-2 opacity-90">Create new category</p>
                        </a>

                        <!-- View All Transactions -->
                        <a href="{{ route('transactions.index') }}"
                            class="bg-gray-700 hover:bg-gray-800 text-white p-8 rounded-lg text-center shadow transition">
                            <h2 class="text-2xl font-semibold">All Transactions</h2>
                            <p class="mt-2 opacity-90">View full history</p>
                        </a>

                        <!-- View Categories - NEW -->
                        <a href="{{ route('categories.index') }}"
                            class="bg-teal-600 hover:bg-teal-700 text-white p-8 rounded-lg text-center shadow transition">
                            <h2 class="text-2xl font-semibold">View Categories</h2>
                            <p class="mt-2 opacity-90">Manage all categories</p>
                        </a>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white white:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200 white:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 white:text-white">Recent Transactions</h2>
                        </div>

                        @if ($recentTransactions->count() > 0)
                            <table class="w-full divide-y divide-gray-200 white:divide-gray-700">
                                <tbody>
                                    @foreach ($recentTransactions as $t)
                                        <tr>
                                            <td class="px-6 py-4 text-sm">{{ $t->date }}</td>
                                            <td class="px-6 py-4 text-sm">
                                                <span
                                                    class="px-2 py-1 text-xs rounded-full {{ $t->category->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $t->category->name }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm">{{ $t->description ?? '-' }}</td>
                                            <td class="px-6 py-4 text-sm text-right font-medium">
                                                {{ number_format($t->amount, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-8 text-center text-gray-500">
                                No transactions yet. Start by <a href="{{ route('transactions.create') }}"
                                    class="text-indigo-600">adding one</a>!
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
