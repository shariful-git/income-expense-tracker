<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="max-w-7xl mx-auto py-6">

                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                                Add New Transaction
                            </h1>

                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Category -->
                                    <div>
                                        <label for="category_id"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Category
                                        </label>
                                        <select name="category_id" id="category_id" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('category_id') border-red-500 @enderror">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories->groupBy('type') as $type => $grouped)
                                                <optgroup label="{{ ucfirst($type) }}">
                                                    @foreach ($grouped as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Amount -->
                                    <div>
                                        <label for="amount"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Amount
                                        </label>
                                        <input type="number" step="0.01" name="amount" id="amount"
                                            value="{{ old('amount') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('amount') border-red-500 @enderror"
                                            required placeholder="0.00">
                                        @error('amount')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Date -->
                                    <div>
                                        <label for="date"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Date
                                        </label>
                                        <input type="date" name="date" id="date"
                                            value="{{ old('date', today()->format('Y-m-d')) }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('date') border-red-500 @enderror"
                                            required>
                                        @error('date')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="md:col-span-2">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Description (optional)
                                        </label>
                                        <textarea name="description" id="description" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror"
                                            placeholder="e.g., Grocery shopping at supermarket">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-8 flex justify-end gap-4">
                                    <a href="{{ route('transactions.index') }}"
                                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-400">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                        Save Transaction
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
