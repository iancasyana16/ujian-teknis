<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <div class="py-5 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">

        <a href="{{ route('tasks.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">
            Create Task
        </a>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-sm sm:rounded-lg p-5">
            <div class="p-6 text-gray-900 overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Project</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Assigned To</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $loop->iteration + ($tasks->currentPage() - 1) * $tasks->perPage() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->project->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $task->assignedTo->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $task->status }}</td>

                                <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="text-indigo-600 font-semibold">Edit</a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')"
                                            class="text-red-600 font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>

            </div>
        </div>

    </div>
</x-app-layout>