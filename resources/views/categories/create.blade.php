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

                            <h1 class="text-2xl font-bold text-gray-900 mb-6">
                                Add New Category
                            </h1>

                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Name -->
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium">
                                            Category Name
                                        </label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                                            required autofocus>
                                        @error('name')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Type -->
                                    <div>
                                        <label for="type"
                                            class="block text-sm font-medium">
                                            Type
                                        </label>
                                        <select name="type" id="type"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('type') border-red-500 @enderror"
                                            required>
                                            <option value="">-- Select Type --</option>
                                            <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>
                                                Income
                                            </option>
                                            <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>
                                                Expense
                                            </option>
                                        </select>
                                        @error('type')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-8 flex justify-end gap-4">
                                    <a href="{{ route('categories.index') }}"
                                        class="px-4 py-2 bg-red-300 dark:bg-red-600 text-gray-800 dark:text-gray-200 rounded hover:bg-red-400 dark:hover:bg-red-700">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                        Save Category
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
