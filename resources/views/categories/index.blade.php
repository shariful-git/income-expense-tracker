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

                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('categories.create') }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                                    + Add Category
                                </a>
                            </div>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div
                                    class="mb-6 p-4 bg-green-100 white:bg-green-900 text-green-800 white:text-green-200 rounded-lg">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Categories Table Card -->
                            <div class="bg-white white:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 white:divide-gray-700">
                                    <thead class="bg-gray-50 white:bg-gray-900">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white white:bg-gray-800 divide-y divide-gray-200 white:divide-gray-700">
                                        @forelse($categories as $category)
                                            <tr class="hover:bg-gray-50 white:hover:bg-gray-700 transition">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 white:text-white">
                                                    {{ $category->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    <span
                                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $category->type === 'income'
                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                        : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                                        {{ ucfirst($category->type) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                                                    <a href="{{ route('categories.edit', $category) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 mr-6">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $category) }}"
                                                        method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this category? Transactions using it will remain but become uncategorized.')"
                                                            class="text-red-600 hover:text-red-900">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"
                                                    class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                                    No categories yet.
                                                    <a href="{{ route('categories.create') }}"
                                                        class="text-indigo-600 hover:underline ml-1">
                                                        Add your first one!
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
