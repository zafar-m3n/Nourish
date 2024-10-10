<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Donor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-6 text-2xl font-semibold">Donation Statistics</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- My Donations Count -->
                        <div class="rounded-lg bg-blue-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500">
                                    <i class="fas fa-gift text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">My Donations</h4>
                                    <p class="mt-2 text-3xl font-bold text-blue-700">{{ $myDonationsCount }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Donation History -->
                        <div class="rounded-lg bg-green-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-500">
                                    <i class="fas fa-history text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Donation History</h4>
                                    <p class="mt-2 text-3xl font-bold text-green-700">{{ $donationHistoryCount }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Example: Pending Donations -->
                        <div class="rounded-lg bg-yellow-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-500">
                                    <i class="fas fa-hourglass-half text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Pending Donations</h4>
                                    <p class="mt-2 text-3xl font-bold text-yellow-700">{{ $pendingDonationsCount ?? 0 }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Example: Total Orders Linked to Donations -->
                        <div class="rounded-lg bg-red-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-500">
                                    <i class="fas fa-shopping-cart text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Orders Linked to My Donations</h4>
                                    <p class="mt-2 text-3xl font-bold text-red-700">{{ $linkedOrdersCount ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
