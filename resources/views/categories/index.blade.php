<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-6 text-gray-700">

                    <!-- Header Actions -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">
                            Categories
                        </h1>

                        <a href="{{ route('categories.create') }}"
                            class="px-4 py-2 bg-indigo-50 text-indigo-700 border border-indigo-100 rounded hover:bg-indigo-100 transition">
                            + Add Category
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 border border-emerald-100 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Categories Table -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                                    <tr>
                                        <th class="px-6 py-3 text-left">Name</th>
                                        <th class="px-6 py-3 text-left">Type</th>
                                        <th class="px-6 py-3 text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse($categories as $category)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 font-medium">
                                                {{ $category->name }}
                                            </td>

                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 rounded-full text-xs
                                                    {{ $category->type === 'income' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                                    {{ ucfirst($category->type) }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                                <a href="{{ route('categories.edit', $category) }}"
                                                    class="text-indigo-600 hover:underline mr-4">
                                                    Edit
                                                </a>

                                                <form action="{{ route('categories.destroy', $category) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Delete this category? Transactions will remain uncategorized.')"
                                                        class="text-rose-600 hover:underline">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                                                No categories yet.
                                                <a href="{{ route('categories.create') }}"
                                                    class="text-indigo-600 hover:underline">
                                                    Add your first one
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="p-4 bg-gray-50 border-t border-gray-200">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
