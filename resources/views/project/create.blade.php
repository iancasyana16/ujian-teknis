<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">

                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Title -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="title" class="mb-2 text-gray-700 font-medium">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                placeholder="Enter project title" class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 
                                focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">
                        </div>

                        <!-- Description -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="description" class="mb-2 text-gray-700 font-medium">Description</label>
                            <textarea id="description" name="description" placeholder="Enter description"
                                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 
                                focus:border-transparent shadow-sm transition duration-200 resize-none h-32">{{ old('description') }}</textarea>
                        </div>

                        <!-- Manager -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="manager_id" class="mb-2 text-gray-700 font-medium">Manager</label>
                            <select name="manager_id" id="manager_id" class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 
                                focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">
                                <option value="">Select Manager</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">
                                        {{ $manager->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="md:col-span-2 flex space-x-4">
                            <button type="reset" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg 
                                shadow-md transition duration-200">
                                Reset
                            </button>

                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 
                                hover:to-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                                Save
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>