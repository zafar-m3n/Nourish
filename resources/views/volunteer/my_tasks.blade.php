<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Assigned Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if ($tasks->isEmpty())
                        <p class="text-gray-500">You have no tasks assigned at the moment.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Task Type
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Due Date
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Donation
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        Actions
                                    </th>
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
                                            <span
                                                class="{{ $task->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($task->status == 'in_progress' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }} inline-flex rounded-full px-2 text-xs font-semibold leading-5">
                                                {{ ucfirst($task->status) }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if ($task->status !== 'completed')
                                                <form action="{{ route('volunteer.complete_task', $task->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="rounded bg-green-500 px-4 py-2 text-white hover:bg-green-700">
                                                        Mark as Completed
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-500">Completed</span>
                                            @endif
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
