<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-8 text-gray-700">

                    <h1 class="text-2xl font-semibold mb-6">
                        New Category
                    </h1>

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Category Name <span class="required text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400"
                                    required autofocus>
                                @error('name')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label class="block text-sm font-medium mb-1">
                                    Type <span class="required text-red-500">*</span>
                                </label>
                                <select name="type" required
                                    class="w-full rounded-md border-gray-300 focus:border-indigo-400 focus:ring-indigo-400">
                                    <option value="">Select type</option>
                                    <option value="income" {{ old('type') === 'income' ? 'selected' : '' }}>
                                        Income
                                    </option>
                                    <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>
                                        Expense
                                    </option>
                                </select>
                                @error('type')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-8 flex justify-end gap-4">
                            <a href="{{ route('categories.index') }}"
                                class="px-4 py-2 bg-gray-100 border border-gray-300 text-gray-700 rounded hover:bg-gray-200">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-6 py-2 bg-indigo-50 text-indigo-700 border border-indigo-100 rounded hover:bg-indigo-100 transition">
                                Save Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
