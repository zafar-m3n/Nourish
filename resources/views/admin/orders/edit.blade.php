<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="in_transit" {{ $order->status == 'in_transit' ? 'selected' : '' }}>In
                                    Transit</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                    Delivered</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="delivery_date" class="block text-sm font-medium text-gray-700">Delivery
                                Date</label>
                            <input type="date" name="delivery_date" id="delivery_date"
                                value="{{ old('delivery_date', $order->delivery_date ? $order->delivery_date->format('Y-m-d') : '') }}"
                                class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="volunteer_id" class="block text-sm font-medium text-gray-700">Assigned
                                Volunteer</label>
                            <input type="text" name="volunteer_id" id="volunteer_id"
                                value="{{ old('volunteer_id', $order->volunteer_id ?? '') }}" class="mt-1 block w-full">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">Update
                                Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
