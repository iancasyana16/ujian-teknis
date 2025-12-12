<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">

            <!-- Create Project Button -->
            @can('projects.create')
                <a href="{{ route('projects.create') }}"
                    class="inline-block bg-blue-600 p-2 rounded hover:bg-blue-700 text-white font-semibold">
                    Create Project
                </a>
            @endcan

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table Container -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="p-6 text-gray-900 overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Manager</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $loop->iteration + ($projects->currentPage() - 1) * $projects->perPage() }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $project->title }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ Str::limit($project->description, 50) }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $project->manager->name ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                        @can('projects.update')
                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('projects.delete')
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="text-red-600 hover:text-red-900 font-semibold">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>