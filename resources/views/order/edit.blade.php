<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            Edit Order
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-xl p-8">

            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Customer -->
                    <div class="flex flex-col">
                        <label class="mb-2 font-medium text-gray-700">Customer</label>
                        <select name="customer_id"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total Amount -->
                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Total Amount</label>
                        <input type="number" step="0.01" name="total_amount" placeholder="Enter total amount"
                            value="{{ old('total_amount', $order->total_amount) }}"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Status -->
                    <div class="flex flex-col md:col-span-2">
                        <label class="mb-2 font-medium text-gray-700">Status</label>
                        <select name="status"
                            class="p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:outline-none">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in progress" {{ $order->status == 'in progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="md:col-span-2 flex space-x-4">
                        <button type="reset"
                            class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
                            Reset
                        </button>
                        <button type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition">
                            Update
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</x-app-layout>