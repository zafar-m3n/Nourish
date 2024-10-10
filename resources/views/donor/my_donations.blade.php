<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('My Donations') }}
            </h2>
            <a href="{{ route('donor.donations.create') }}"
                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                Create New Donation
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if ($donations->isEmpty())
                        <p class="text-gray-500">You haven't made any donations yet.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Food Type</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Quantity</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Expiration Date</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($donations as $donation)
                                    <tr class="odd:bg-gray-100 even:bg-white"> <!-- Zebra striping -->
                                        <td class="whitespace-nowrap px-6 py-4">{{ $donation->food_type }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $donation->quantity }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $donation->expiration_date->format('Y-m-d') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <span
                                                class="{{ $donation->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} inline-flex rounded-full px-2 text-xs font-semibold leading-5">
                                                {{ ucfirst($donation->status) }}
                                            </span>
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
