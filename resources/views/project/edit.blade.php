<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">

                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Title -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="title" class="mb-2 text-gray-700 font-medium">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}"
                                placeholder="Enter project title" class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 
                                focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">
                        </div>

                        <!-- Description -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="description" class="mb-2 text-gray-700 font-medium">Description</label>
                            <textarea id="description" name="description"
                                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 
                                focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200 resize-none h-32">{{ old('description', $project->description) }}</textarea>
                        </div>

                        <!-- Manager -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="manager_id" class="mb-2 text-gray-700 font-medium">Manager</label>
                            <select name="manager_id" id="manager_id" class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 
                                focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">

                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}" {{ $manager->id == $project->manager_id ? 'selected' : '' }}>
                                        {{ $manager->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="md:col-span-2 flex space-x-4">
                            <a href="{{ route('projects.index') }}"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 text-center rounded-lg shadow-md transition duration-200">
                                Cancel
                            </a>

                            <button type="submit" class="flex-1 bg-blue-600 text-white hover:bg-blue-700 rounded-lg ">
                                Update
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>