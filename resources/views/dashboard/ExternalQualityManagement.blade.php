@php
    $months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    // $filteredPlanners = $selectedLabId ? $planners->where('lab_id', $selectedLabId) : $planners;
@endphp

@php
    $filteredPlanners = $selectedLabId ? $planners->where('lab_id', $selectedLabId) : $planners;
@endphp

<div class="table-responsive">
    <table class="stock-planner-table monthview">
        <thead>
            <tr style="position:sticky" class="fixedtr">
                <th rowspan="2">
                    <div style="justify-content: space-around;">
                        <span> Months <i class="fa-solid fa-arrow-right"></i></span><br>
                        <span> <i class="fa-solid fa-arrow-down"></i> EQAS Provider</span>
                    </div>
                </th>
                <th rowspan="2">Program</th>
                @foreach($months as $month)
                    <th colspan="3">{{ $month }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach($months as $month)
                    <th>Plan</th>
                    <th>Submission</th>
                    <th>Close</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
                $grouped = $filteredPlanners->groupBy('provider');
            @endphp

            @foreach($grouped as $provider => $records)
                <tr>
                    <td rowspan="{{ $records->count() + 1 }}">{{ $provider }}</td>
                </tr>
                @foreach($records as $plan)
                    @php
                        $selectedMonths = json_decode($plan->months_selected, true);
                    @endphp
                    <tr>
                        <td>{{ $plan->eqas_name }}</td>
                        @for($m = 1; $m <= 12; $m++)
                            {{-- Plan --}}
                            <td class="text-center">
                                @if(!empty($selectedMonths[$m - 1]) )
                                    <i class="fa-solid fa-circle-check" style="color: #147500;"></i>
                                @endif
                            </td>

                            {{-- Submission --}}
                            <td class="text-center">
                                @php
                                   $subKey = "{$plan->provider}|{$plan->eqas_name}|{$m}|{$plan->lab_id}|{$plan->department}";
                                    $submission = $submissions[$subKey][0] ?? null;
                                @endphp
                        

                                @php
                                    $color = '#ff0000'; // Default red for not submitted
                                    $icon = 'fa-solid fa-circle-xmark'; // Default red X icon

                                    if ($submission) {
                                        $eqaCycle = \Illuminate\Support\Carbon::parse($submission->eqa_cycle);
                                        $submissionDate = $submission->eqas_submission_date 
                                            ? \Illuminate\Support\Carbon::parse($submission->eqas_submission_date) 
                                            : null;

                                        if ($submission->status == 'completed') {
                                            if ($submissionDate && $submissionDate->lte($eqaCycle)) {
                                                $color = '#147500'; // Green: On time
                                            } else {
                                                $color = '#FFD700'; // Yellow: Late
                                            }
                                            $icon = 'fa-solid fa-circle-check'; // Show tick icon
                                        }
                                    }
                                @endphp
                              
                               @if(!empty($selectedMonths[$m - 1]) )
                               <!-- && \Carbon\Carbon::parse($selectedMonths[$m - 1])->isFuture()   -->
                                  <!-- <i class="fa-solid fa-circle-check" style="color: #147500;"></i> -->
                                    <i class="{{$icon}}" style="color: {{$color}}"></i>
                                @endif


                            </td>

                            {{-- Close --}}
                            <td class="text-center">
                                @php
                                    $closeKey = "{$plan->provider}|{$plan->eqas_name}|{$m}|{$plan->lab_id}|{$plan->department}";
                                    $close = $submissions[$closeKey][0] ?? null;
                                @endphp
                                 @if(!empty($selectedMonths[$m - 1])  )
                                 <!-- && \Carbon\Carbon::parse($selectedMonths[$m - 1])->isFuture()  -->
                                    @if($close && $close->program_status == 'completed')
                                        <i class="fa-solid fa-circle-check" style="color: #147500;"></i>
                                    @else
                                        <i class="fa-solid fa-circle-xmark" style="color: #ff0000;"></i>
                                    @endif
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;

    if (hash) {
        // Hide all panels first
        const panels = document.querySelectorAll('.pivot-panel');
        panels.forEach(panel => panel.style.display = 'none');

        // Show the one from hash
        const activePanel = document.querySelector(hash);
        if (activePanel) {
            activePanel.style.display = 'block';
            // Scroll to it (optional)
            activePanel.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
</script>



