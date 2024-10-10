<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('donor.donations.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="food_type" class="block text-sm font-medium text-gray-700">Food Type</label>
                            <input type="text" name="food_type" id="food_type" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration
                                Date</label>
                            <input type="date" name="expiration_date" id="expiration_date" class="mt-1 block w-full"
                                required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                                Create Donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
