<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-xl p-8">

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Project</label>
                        <select name="project_id"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Assigned To</label>
                        <select name="assigned_to_user_id"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $task->assigned_to_user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Status</label>
                        <select name="status"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in progress" {{ $task->status == 'in progress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
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
</x-app-layout>