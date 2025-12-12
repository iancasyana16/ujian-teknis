<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            Create Task
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-xl p-8">

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Title</label>
                        <input type="text" name="title" placeholder="Enter title"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Project</label>
                        <select name="project_id"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Assigned To</label>
                        <select name="assigned_to_user_id"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 text-gray-700 font-medium">Status</label>
                        <select name="status"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="pending">Pending</option>
                            <option value="in progress">In Progress</option>
                            <option value="done">Done</option>
                        </select>
                    </div>

                    <button
                        class="md:col-span-2 bg-blue-600 hover:bg-blue-700 py-3 text-white font-semibold rounded-lg shadow-md transition">
                        Save
                    </button>

                </div>

            </form>

        </div>
    </div>
</x-app-layout>