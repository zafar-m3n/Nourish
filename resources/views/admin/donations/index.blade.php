<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Donations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('admin.donations.create') }}"
                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                    Create New Donation
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if ($donations->isEmpty())
                        <p>No donations available.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Food
                                        Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Quantity
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">
                                        Expiration Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($donations as $donation)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $donation->food_type }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $donation->quantity }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $donation->expiration_date->format('Y-m-d') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <span
                                                class="{{ $donation->status == 'available'
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($donation->status == 'in_transit'
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : 'bg-blue-100 text-blue-800') }} inline-flex rounded-full px-2 text-xs font-semibold leading-5">
                                                {{ ucfirst($donation->status) }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('admin.donations.edit', $donation->id) }}"
                                                class="text-blue-600 hover:text-blue-800">Edit</a>
                                            <form action="{{ route('admin.donations.destroy', $donation->id) }}"
                                                method="POST" class="ml-2 inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
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
