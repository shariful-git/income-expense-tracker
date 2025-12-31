<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="max-w-7xl mx-auto py-6">

                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('transactions.create') }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Add Transaction
                                </a>
                            </div>

                            @if (session('success'))
                                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="bg-white white:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                                <table class="w-full divide-y divide-gray-200 white:divide-gray-700">
                                    <thead class="bg-gray-50 white:bg-gray-900">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Description</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                                Amount</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white white:bg-gray-800 divide-y divide-gray-200 white:divide-gray-700">
                                        @forelse($transactions as $transaction)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    {{ $transaction->date }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <span
                                                        class="px-2 py-1 text-xs rounded-full {{ $transaction->category->type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $transaction->category->name }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-sm">{{ $transaction->description ?? '-' }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-right font-medium">
                                                    {{ number_format($transaction->amount, 2) }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-right">
                                                    <a href="{{ route('transactions.edit', $transaction) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                                    <form action="{{ route('transactions.destroy', $transaction) }}"
                                                        method="POST" class="inline">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Delete this transaction?')"
                                                            class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                                    No transactions yet. <a href="{{ route('transactions.create') }}"
                                                        class="text-indigo-600">Add your first one!</a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="p-4">
                                    {{ $transactions->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
