<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Add Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-8 text-gray-700">

                    <h1 class="text-2xl font-semibold mb-6">
                        New Transaction
                    </h1>

                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Category -->
                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Category
                                </label>
                                <select name="category_id" required
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400">
                                    <option value="">Select category</option>
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
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Amount
                                </label>
                                <input type="number" step="0.01" name="amount"
                                    value="{{ old('amount') }}"
                                    placeholder="0.00"
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400"
                                    required>
                                @error('amount')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Date
                                </label>
                                <input type="date" name="date"
                                    value="{{ old('date', today()->format('Y-m-d')) }}"
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400"
                                    required>
                                @error('date')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1">
                                    Description (optional)
                                </label>
                                <textarea name="description" rows="3"
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400"
                                    placeholder="e.g. Grocery shopping">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-8 flex justify-end gap-4">
                            <a href="{{ route('transactions.index') }}"
                               class="px-4 py-2 bg-gray-100 border border-gray-300 text-gray-700 rounded hover:bg-gray-200">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-6 py-2 bg-indigo-50 text-indigo-700 border border-indigo-100 rounded hover:bg-indigo-100 transition">
                                Save Transaction
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
