<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if ($orders->isEmpty())
                        <p>No orders available.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Recipient
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Food Type
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Quantity
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->recipient->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->donation->food_type }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->donation->quantity }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ ucfirst($order->status) }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                class="text-blue-600">Edit</a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
