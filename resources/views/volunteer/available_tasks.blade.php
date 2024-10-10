<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Available Volunteer Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if ($tasks->isEmpty())
                        <p class="text-gray-500">There are no available tasks at the moment.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Task Type</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Due Date</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Donation</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($tasks as $task)
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="whitespace-nowrap px-6 py-4">{{ ucfirst($task->task_type) }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $task->due_date->format('Y-m-d') }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $task->donation->food_type }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <form action="{{ route('volunteer.assign_task', $task->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700">
                                                    Assign to Myself
                                                </button>
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
