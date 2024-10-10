<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ isset($donation) ? 'Edit Donation' : 'Create Donation' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form
                        action="{{ isset($donation) ? route('admin.donations.update', $donation->id) : route('admin.donations.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($donation))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="food_type" class="block text-sm font-medium text-gray-700">Food Type</label>
                            <input type="text" name="food_type" id="food_type"
                                value="{{ old('food_type', $donation->food_type ?? '') }}" class="mt-1 block w-full"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity"
                                value="{{ old('quantity', $donation->quantity ?? '') }}" class="mt-1 block w-full"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration
                                Date</label>
                            <input type="date" name="expiration_date" id="expiration_date"
                                value="{{ old('expiration_date', isset($donation) ? $donation->expiration_date->format('Y-m-d') : '') }}"
                                class="mt-1 block w-full" required>
                        </div>

                        @if (isset($donation))
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full">
                                    <option value="available" {{ $donation->status == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="in_transit"
                                        {{ $donation->status == 'in_transit' ? 'selected' : '' }}>In Transit</option>
                                    <option value="delivered" {{ $donation->status == 'delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                </select>
                            </div>
                        @endif

                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded bg-blue-500 px-4 py-2 text-white">{{ isset($donation) ? 'Update Donation' : 'Create Donation' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
