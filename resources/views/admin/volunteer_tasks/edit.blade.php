<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Volunteer Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('admin.volunteer-tasks.update', $volunteerTask->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Task Type -->
                        <div class="mb-4">
                            <label for="task_type" class="block text-sm font-medium text-gray-700">Task Type</label>
                            <select name="task_type" id="task_type" class="mt-1 block w-full" required>
                                <option value="collection"
                                    {{ $volunteerTask->task_type == 'collection' ? 'selected' : '' }}>Collection
                                </option>
                                <option value="delivery"
                                    {{ $volunteerTask->task_type == 'delivery' ? 'selected' : '' }}>Delivery</option>
                            </select>
                        </div>

                        <!-- Donation -->
                        <div class="mb-4">
                            <label for="donation_id" class="block text-sm font-medium text-gray-700">Related
                                Donation</label>
                            <select name="donation_id" id="donation_id" class="mt-1 block w-full" required>
                                @foreach ($donations as $donation)
                                    <option value="{{ $donation->id }}"
                                        {{ $volunteerTask->donation_id == $donation->id ? 'selected' : '' }}>
                                        {{ $donation->food_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Volunteer (Optional) -->
                        <div class="mb-4">
                            <label for="volunteer_id" class="block text-sm font-medium text-gray-700">Assign Volunteer
                                (Optional)</label>
                            <select name="volunteer_id" id="volunteer_id" class="mt-1 block w-full">
                                <option value="">Unassigned</option>
                                @foreach ($volunteers as $volunteer)
                                    <option value="{{ $volunteer->id }}"
                                        {{ $volunteerTask->volunteer_id == $volunteer->id ? 'selected' : '' }}>
                                        {{ $volunteer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Due Date -->
                        <div class="mb-4">
                            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="mt-1 block w-full"
                                value="{{ $volunteerTask->due_date->format('Y-m-d') }}" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full" required>
                                <option value="pending" {{ $volunteerTask->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="in_progress"
                                    {{ $volunteerTask->status == 'in_progress' ? 'selected' : '' }}>In Progress
                                </option>
                                <option value="completed"
                                    {{ $volunteerTask->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700">
                                Update Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
