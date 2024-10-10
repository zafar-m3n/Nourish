<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Volunteer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-6 text-2xl font-semibold">Task Statistics</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Available Tasks -->
                        <div class="rounded-lg bg-blue-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500">
                                    <i class="fas fa-tasks text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Available Tasks</h4>
                                    <p class="mt-2 text-3xl font-bold text-blue-700">{{ $availableTasksCount }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- My Tasks -->
                        <div class="rounded-lg bg-yellow-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-500">
                                    <i class="fas fa-clipboard-list text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Assigned Tasks</h4>
                                    <p class="mt-2 text-3xl font-bold text-yellow-700">{{ $assignedTasksCount }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Completed Tasks -->
                        <div class="rounded-lg bg-green-100 p-6 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-500">
                                    <i class="fas fa-check-circle text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Completed Tasks</h4>
                                    <p class="mt-2 text-3xl font-bold text-green-700">{{ $completedTasksCount }}</p>
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
