<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <div class="flex flex-col">
                            <label for="name" class="mb-2 text-gray-700 font-medium">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter name"
                                value="{{ old('name', $customer->name) }}"
                                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col">
                            <label for="email" class="mb-2 text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter email"
                                value="{{ old('email', $customer->email) }}"
                                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200">
                        </div>

                        <!-- Address -->
                        <div class="flex flex-col md:col-span-2">
                            <label for="address" class="mb-2 text-gray-700 font-medium">Address</label>
                            <textarea name="address" id="address" placeholder="Enter address"
                                class="p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition duration-200 resize-none h-32">{{ old('address', $customer->address) }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="md:col-span-2 flex space-x-4">
                            <button type="reset"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                                Reset
                            </button>
                            <button type="submit"
                                class="flex-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                                Update
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>