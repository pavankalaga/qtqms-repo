<div class="p-4 bg-gray-100">
    <h1 class="font-bold text-lg mb-4">Lead Tagging Details</h1>
    
    <div x-show="activeTab === 'details'" class="">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <!-- <th class="py-3 px-4 text-left"></th> -->
                        <th class="py-3 px-4 text-left">Business Name</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Phone</th>
                        <th class="py-3 px-4 text-left">Head Quarters</th>
                        <th class="py-3 px-4 text-left">State</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Assign User</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @if ($reports && $reports->count() > 0)
                        @foreach($reports as $report)
                            <tr class="border-b hover:bg-gray-100 transition duration-150">
                                <!-- <td class="py-2 px-4">
                                    <input type="checkbox" wire:model="selected_reports" value="{{ $report->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                </td> -->
                                <td class="py-2 px-4">{{ $report->business_name }}</td>
                                <td class="py-2 px-4">{{ $report->email }}</td>
                                <td class="py-2 px-4">{{ $report->phone }}</td>
                                <td class="py-2 px-4">{{ $report->city }}</td>
                                <td class="py-2 px-4">{{ $report->state }}</td>
                                <td class="py-2 px-4 {{ $report->status === 'own' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $report->status }}
                                </td>
                                <td class="py-2 px-4">
                                    <form wire:submit.prevent="submitAssignUser('{{ $report->id }}')">
                                        <div class="flex">

                                            <select wire:model="assign_users.{{ $report->id }}" class="form-select w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                                <option value="" selected>Choose...</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error("assign_users.$report->id")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                            <button type="submit" >
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="{{ route('business.info.view', $report->id) }}" class="text-indigo-600 hover:text-indigo-800">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('business.info.edit', $report->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="py-4 text-center text-gray-500">No Reports Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="mt-4 flex justify-center">
                {{ $reports->links() }} <!-- Use links() only if $reports is paginated -->
            </div>
        </div>
    </div>
</div>

<style>
    .pagination .page-item.active .page-link {
        background-color: gray; /* Dark Indigo */
        color: white;
        border: none;
    }
    .pagination .page-link {
        color: #4F46E5; /* Indigo */
        border: 1px solid #d1d5db; /* Gray-300 */
    }
    .pagination .page-link:hover {
        background-color: #e5e7eb; /* Gray-200 */
    }
</style>

<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            icon: event.detail.type,
            title: event.detail.message,
            showConfirmButton: true,
            timer: 3000
        });
    });

    function confirmDelete(reportId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4F46E5',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteReport', reportId);
                Swal.fire('Deleted!', 'The record has been deleted.', 'success');
            }
        });
    }
</script>
