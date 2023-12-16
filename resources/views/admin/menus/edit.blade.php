<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
            </div>
            <div class="m-2 p-2">

                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <div class="mb-5">
                                <input type="text" id="name" name="name" value="{{ $menu->name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="image">Image</label>
                            <div id="placeholder_image">
                                <img class="mb-3 w-32 h-32 rounded" src={{ Storage::url($menu->image) }}>
                            </div>
                            <div class="mb-5">
                                <input
                                    class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="image" type="file" name="image">

                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="price">Price</label>
                            <div class="mb-5">
                                <input
                                    class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    name="price" id="price" type="number" value="{{ $menu->price }}"
                                    max="10000.00" step="0.01">

                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <div class="mb-5">
                                <textarea id="description" name="description" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $menu->description }}</textarea>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</h3>
                            <ul
                                class="mb-5 w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach ($categories as $category)
                                    <li
                                        class="w-full border-b last:border-b-0 border-gray-200 rounded-t-lg dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="{{ $category->name }}-checkbox" type="checkbox"
                                            @foreach ($menu_categories as $menu_category)
                                                @if ($menu_category->category_id == $category->id)
                                                checked
                                                @endif 
                                            @endforeach
                                                name="categories[]" value="{{ $category->id }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="{{ $category->name }}-checkbox"
                                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
