{{-- resources/views/dashboard/partials/external_quality_table.blade.php --}}
@php
    $months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];
    $filteredPlanners = $selectedLabId ? $planners->where('lab_id', $selectedLabId) : $planners;
    $grouped = $filteredPlanners->groupBy('provider');
@endphp
<div class="table-responsive">
    <table class="stock-planner-table monthview">
        <thead>
            <tr>
                <th>Provider</th>
                <th>EQA Name</th>
                <th>Lab ID</th>
                @foreach($months as $month)
                    <th>{{ $month }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($grouped as $provider => $records)
                <tr>
                    <td rowspan="{{ $records->count() + 1 }}">{{ $provider }}</td>
                </tr>
                @foreach($records as $plan)
                    <tr>
                        <td>{{ $plan->eqas_name ?? '' }}</td>
                        <td>{{ $plan->lab_id ?? '' }}</td>
                        @foreach($months as $month)
                            <td>
                                {{-- Add your logic to display month data here --}}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>


