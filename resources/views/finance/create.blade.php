<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">Create Finance</h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-xl p-8">

            <form action="{{ route('finances.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Type -->
                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Type</label>
                        <select name="type"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Amount</label>
                        <input type="number" step="0.01" name="amount" placeholder="Enter amount"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Description</label>
                        <textarea name="description" placeholder="Enter description"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none h-32"></textarea>
                    </div>

                    <!-- Date -->
                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Date</label>
                        <input type="date" name="date"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Buttons -->
                    <div class="md:col-span-2 flex space-x-4">
                        <button type="reset"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
                            Reset
                        </button>
                        <button type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
                            Save
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</x-app-layout>