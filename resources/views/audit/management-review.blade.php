@extends('layouts.base')
@section('content')

    <!DOCTYPE html>


    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Management Review Meeting</title>
        <style>
            .stock-planner-table {
                width: 100% !important;
                border-collapse: collapse !important;
                margin-top: 20px !important;
            }



            .stock-planner-table td {
                padding: 10px !important;
                text-align: left !important;
                border: 1px solid #ddd !important;
                vertical-align: top;
            }

            .stock-planner-table th {
                padding: 10px !important;
                text-align: left !important;
                border: 1px solid #ddd !important;
                background-color: #007BFF !important;
                color: white !important;
            }

            .stock-planner-table p {
                padding-top: 1rem;
            }
        </style>
    </head>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <body>

        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Management Review Meeting</div>
                <!-- <button type="button" class="btn btn-warning">Submit</button> -->
            </div>

            <form action="{{ route('management.review.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Item</th>
                                <th>Discussion Guidance</th>
                                <th>Key Notes</th>
                                <th>Actions Agreed</th>
                                <th>Resp.</th>
                                <th>Target Date</th>
                                <th>Upload File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $items = [
                                    ['id' => 1, 'item' => 'Review previous actions', 'discussion' => 'Review and confirm the status of actions raised or carried over from last management review'],
                                    ['id' => 2, 'item' => 'Customer complaints', 'discussion' => 'Review any customer complaints reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 3, 'item' => 'Environmental incidents / complaints', 'discussion' => 'Review any environmental incidents reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 4, 'item' => 'Accidents and near misses', 'discussion' => 'Review any accidents and near misses reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 5, 'item' => 'Information security incidents', 'discussion' => 'Review any information security incidents and personal information breaches reported since the last meeting. Confirm the status of communications with the ICO and affected personal information subjects. Confirm the status of the investigations and corrective/ preventive actions raised.'],
                                    ['id' => 6, 'item' => 'Customer Feedback', 'discussion' => 'Review any customer feedback received since the last meeting and confirm the status of the investigations and corrective actions.'],
                                    ['id' => 7, 'item' => 'Control measures assessments – Information Security', 'discussion' => 'Review the results of any information security control measures assessments completed. Confirm the status of any corrective/ preventive actions raised. Review the schedule for control measures assessments and the status of planned assessments.'],
                                    ['id' => 8, 'item' => 'Control measures assessments – Health and Safety', 'discussion' => 'Review the results of any health and safety control measures assessments completed. Confirm the status of any corrective/preventive actions raised. Review the schedule for control measures assessments and the status of planned assessments. Confirm the involvement of employees in relation to determining and implementing controls.'],
                                    ['id' => 9, 'item' => 'Communication', 'discussion' => 'Confirm and review any external third-party communications received (or meetings held) involving health, safety, environmental and information security matters. Confirm employee communications involving health, safety, environmental and information security matters completed or planned. Confirm any other communication with interested parties about health and safety.'],
                                    ['id' => 10, 'item' => 'Internal resources', 'discussion' => 'Review training requirements and confirm the status of any training planned'],
                                    ['id' => 11, 'item' => 'Equipment / infrastructure maintenance', 'discussion' => 'Confirm equipment/infrastructure inspections, maintenance and calibration completed and planned. Confirm proposed changes to the Equipment and Maintenance Register. Confirm areas where additional resource is required to complete the schedule. Review any complaints received relating to the organisation’s environmental performance or BMS.'],
                                    ['id' => 12, 'item' => 'Suppliers and subcontractors', 'discussion' => 'Review any supplier-related complaints/problems or audits since the last meeting. Confirm the status of any investigations and actions. Review and agree any changes to suppliers’ approved status on the Approved Suppliers Register. Confirm the involvement of employees in establishing controls for the use of external resources.'],
                                    ['id' => 13, 'item' => 'Environmental aspects', 'discussion' => 'Confirm the organisation’s Significant Environmental Aspects on the Environmental Aspects Register. Confirm any new environmental aspect assessments completed or reviewed and the results of this work. Confirm the status of actions and of any environmental aspect assessments/reviews planned.'],
                                    ['id' => 14, 'item' => 'Risk assessments – Information Security', 'discussion' => 'Review all new information security threats or vulnerabilities. Confirm proposed changes to the information security risk treatment plan or Statement of Applicability. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 15, 'item' => 'Risk assessments – Health and Safety', 'discussion' => 'Confirm health and safety risk assessments completed or reviewed and the results of this work. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 16, 'item' => 'Compliance requirements', 'discussion' => 'Confirm any new, legal or other requirements identified. Confirm the results of any compliance audits completed. Confirm the status of any actions. Confirm the status of any information security compliance audits planned.'],
                                    ['id' => 17, 'item' => 'Emergency plans', 'discussion' => 'Confirm the results of any fire drills or other emergency drills completed. Confirm the status of any corrective actions. Review the Emergency Plan and confirm any proposed changes.'],
                                    ['id' => 18, 'item' => 'Business continuity', 'discussion' => 'Confirm the results of any tests completed. Confirm the status of any corrective/ preventive actions raised. Review the Business Continuity Plan and confirm any proposed changes'],
                                    ['id' => 19, 'item' => 'Objectives and Process Performance', 'discussion' => 'Review the quality, environmental, health and safety, and information security objectives and performance indicators (including any trends) on the Objectives and KPI Register. Confirm proposed changes to quality, environmental, health and safety, and information security objectives. Confirm the involvement of employees in setting the objectives and in determining how to achieve them. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 20, 'item' => 'Internal audits', 'discussion' => 'Confirm the results of any internal audits completed. Confirm the status of any corrective actions. Review the Internal Audit Plan and confirm the status of internal audits planned. Confirm the involvement of employees in establishing the audit schedule.'],
                                    ['id' => 21, 'item' => 'External audits', 'discussion' => 'Confirm the results of any external audits completed. Confirm the status of any corrective actions. Review the status of any external audits planned.'],
                                    ['id' => 22, 'item' => 'Problems / nonconformities/ Improvement opportunities', 'discussion' => 'Review any outstanding BMS- related improvement ideas, problems or nonconformities (not covered on agenda items above). Review any BMS-related improvement ideas, problems or nonconformities raised/reported since the last meeting. Confirm the status of the investigations and corrective/ preventive actions raised. Review any improvement opportunities not covered under other agenda items (not covered on agenda items above).'],
                                    ['id' => 23, 'item' => 'Needs and expectations of interested parties', 'discussion' => 'Review the needs and expectations of relevant interested parties. Confirm any changes to the needs and expectations of relevant interested parties. Confirm any new interested parties identified and their needs and expectations. Confirm the involvement of employees in establishing these needs and expectations.'],
                                    ['id' => 24, 'item' => 'Business risks and opportunities', 'discussion' => 'Review business risks and opportunities and any actions to address them. Confirm any new business risks/ opportunities identified and any changes to the business risks and opportunities assessment. Confirm any actions arising from changes to the Business Risks, Opportunities and Interested Parties Register. Confirm the involvement of employees in assessing these risks and opportunities.'],
                                    ['id' => 25, 'item' => 'Changes affecting the BMS', 'discussion' => 'Review changes to internal issues, external issues and interested parties that affect the organisation. Review the impact of changes and confirm any actions. Review the current management system scope and confirm it still adequately reflects the scope of the certification.'],
                                    ['id' => 26, 'item' => 'Policy review', 'discussion' => 'Review the Quality Policy, Environmental Policy, Occupational Health and Safety Policy and Information Security Policy. Confirm the involvement of employees in setting the Occupational Health and Safety Policy. Confirm whether they are still appropriate to the organisation and any changes required.'],
                                    ['id' => 27, 'item' => 'A.O.B.', 'discussion' => ''],
                                ];
                            @endphp

                            @foreach($items as $index => $data)
                                <tr>
                                    <td>{{ $data['id'] }}</td>
                                    <td>
                                        <strong>{{ $data['item'] }}</strong>
                                        <input type="hidden" name="items[{{ $index }}][item]" value="{{ $data['item'] }}">
                                    </td>
                                    <td>
                                        {{ $data['discussion'] }}
                                        <input type="hidden" name="items[{{ $index }}][discussion_guidance]"
                                            value="{{ $data['discussion'] }}">
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][key_notes]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][actions_agreed]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][responsibility]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <input type="date" name="items[{{ $index }}][target_date]">
                                    </td>
                                    <td>
                                        <input type="file" name="items[{{ $index }}][file]">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" style="width: 100%;color:#fff" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".stock-planner-table tbody td").forEach(td => {
                    if (!td.querySelector("input") && !td.querySelector("textarea")) { // Check if td does not contain an input
                        td.setAttribute("contenteditable", "true");
                    }
                });
            });
        </script>
    </body>

    </html>

@endsection