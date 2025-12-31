<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700">

                    <!-- Welcome -->
                    <h1 class="text-3xl font-semibold mb-8">
                        Welcome back, {{ auth()->user()->name }}!
                    </h1>

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                        <!-- Income -->
                        <div class="bg-emerald-50 border border-emerald-100 p-6 rounded-lg">
                            <p class="text-sm text-emerald-600">
                                Income ({{ now()->format('F Y') }})
                            </p>
                            <p class="text-3xl font-semibold text-emerald-700 mt-2">
                                {{ number_format($income, 2) }}
                            </p>
                        </div>

                        <!-- Expenses -->
                        <div class="bg-rose-50 border border-rose-100 p-6 rounded-lg">
                            <p class="text-sm text-rose-600">
                                Expenses ({{ now()->format('F Y') }})
                            </p>
                            <p class="text-3xl font-semibold text-rose-700 mt-2">
                                {{ number_format($expenses, 2) }}
                            </p>
                        </div>

                        <!-- Balance -->
                        <div class="{{ $balance >= 0 ? 'bg-sky-50 border-sky-100' : 'bg-amber-50 border-amber-100' }} border p-6 rounded-lg">
                            <p class="text-sm {{ $balance >= 0 ? 'text-sky-600' : 'text-amber-600' }}">
                                Balance
                            </p>
                            <p class="text-3xl font-semibold {{ $balance >= 0 ? 'text-sky-700' : 'text-amber-700' }} mt-2">
                                {{ $balance >= 0 ? '+' : '' }}{{ number_format($balance, 2) }}
                            </p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                        <a href="{{ route('transactions.create') }}"
                           class="bg-indigo-50 hover:bg-indigo-100 border border-indigo-100 p-6 rounded-lg text-center transition">
                            <h2 class="text-lg font-semibold text-indigo-700">
                                + Add Transaction
                            </h2>
                            <p class="text-sm text-indigo-600 mt-1">
                                Record income or expense
                            </p>
                        </a>

                        <a href="{{ route('categories.create') }}"
                           class="bg-purple-50 hover:bg-purple-100 border border-purple-100 p-6 rounded-lg text-center transition">
                            <h2 class="text-lg font-semibold text-purple-700">
                                + Add Category
                            </h2>
                            <p class="text-sm text-purple-600 mt-1">
                                Create new category
                            </p>
                        </a>

                        <a href="{{ route('transactions.index') }}"
                           class="bg-slate-50 hover:bg-slate-100 border border-slate-200 p-6 rounded-lg text-center transition">
                            <h2 class="text-lg font-semibold text-slate-700">
                                All Transactions
                            </h2>
                            <p class="text-sm text-slate-600 mt-1">
                                View full history
                            </p>
                        </a>

                        <a href="{{ route('categories.index') }}"
                           class="bg-teal-50 hover:bg-teal-100 border border-teal-100 p-6 rounded-lg text-center transition">
                            <h2 class="text-lg font-semibold text-teal-700">
                                View Categories
                            </h2>
                            <p class="text-sm text-teal-600 mt-1">
                                Manage categories
                            </p>
                        </a>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-700">
                                Recent Transactions
                            </h2>
                        </div>

                        @if ($recentTransactions->count())
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($recentTransactions as $t)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-6 py-4">
                                                    {{ $t->date }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="px-2 py-1 rounded-full text-xs
                                                        {{ $t->category->type === 'income'
                                                            ? 'bg-emerald-100 text-emerald-700'
                                                            : 'bg-rose-100 text-rose-700' }}">
                                                        {{ $t->category->name }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $t->description ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 text-right font-medium">
                                                    {{ number_format($t->amount, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="px-6 py-8 text-center text-gray-500">
                                No transactions yet.
                                <a href="{{ route('transactions.create') }}"
                                   class="text-indigo-600 hover:underline">
                                    Add one
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
