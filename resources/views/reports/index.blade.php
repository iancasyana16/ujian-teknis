<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            Reports
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Filter Form -->
        <div class="bg-white shadow-xl rounded-xl p-6">
            <form action="{{ route('reports.index') }}" method="GET"
                class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start" value="{{ $start }}"
                        class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-gray-700">End Date</label>
                    <input type="date" name="end" value="{{ $end }}"
                        class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Report Summary -->
        <div class="bg-white shadow-xl rounded-xl p-6">
            <h3 class="text-xl font-semibold mb-4">Summary ({{ $start }} to {{ $end }})</h3>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Income</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-green-600">
                            ${{ number_format($incomes, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Expense</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-red-600">
                            ${{ number_format($expenses, 2) }}</td>
                    </tr>
                    <tr class="bg-gray-50 font-semibold">
                        <td class="px-6 py-4 whitespace-nowrap">Net</td>
                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($incomes - $expenses, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>