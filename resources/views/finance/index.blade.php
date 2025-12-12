<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Finances</h2>
    </x-slot>

    <div class="py-5 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">

        <a href="{{ route('finances.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">
            Create Finance
        </a>

        @if(session('success'))
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
                                Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($finances as $finance)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $loop->iteration + ($finances->currentPage() - 1) * $finances->perPage() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $finance->type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($finance->amount, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $finance->description ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $finance->date->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                    <a href="{{ route('finances.edit', $finance->id) }}"
                                        class="text-indigo-600 font-semibold">Edit</a>
                                    <form action="{{ route('finances.destroy', $finance->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')"
                                            class="text-red-600 font-semibold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $finances->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>