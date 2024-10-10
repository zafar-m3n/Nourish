<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Volunteer Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('admin.volunteer-tasks.store') }}" method="POST">
                        @csrf

                        <!-- Task Type -->
                        <div class="mb-4">
                            <label for="task_type" class="block text-sm font-medium text-gray-700">Task Type</label>
                            <select name="task_type" id="task_type" class="mt-1 block w-full" required>
                                <option value="collection">Collection</option>
                                <option value="delivery">Delivery</option>
                            </select>
                        </div>

                        <!-- Donation -->
                        <div class="mb-4">
                            <label for="donation_id" class="block text-sm font-medium text-gray-700">Related
                                Donation</label>
                            <select name="donation_id" id="donation_id" class="mt-1 block w-full" required>
                                @foreach ($donations as $donation)
                                    <option value="{{ $donation->id }}">{{ $donation->food_type }}</option>
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
                                    <option value="{{ $volunteer->id }}">{{ $volunteer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Due Date -->
                        <div class="mb-4">
                            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="mt-1 block w-full" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700">
                                Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
