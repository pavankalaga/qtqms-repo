<tbody id="risk-table-body">
    @foreach ($data22 as $risk)
        <tr>
            <td>{{ $risk->riskName }}</td>
            <td>{{ $risk->responsible }}</td>
            <td>{{ $risk->residual_risk_priority }}</td>
            <td>{{$risk->control_measure_type}}</td>
            <td>{{ $risk->progress }}%</td>
            <td>{{ $risk->control_status }}</td>
        </tr>
    @endforeach
</tbody>

<div class="d-flex justify-content-center mt-3">
    {{ $data22->links('pagination::bootstrap-5') }}
</div>