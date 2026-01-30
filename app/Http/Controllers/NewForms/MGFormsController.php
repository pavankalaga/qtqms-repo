<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MrmAgendaForm;
use App\Models\MrmAttendanceForm;
use App\Models\MinutesOfMrmForm;
use App\Models\MrmTaskComplianceForm;

class MGFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/MG/FOM-007
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null;

        switch ($formCode) {
            case 'FOM-007':
                return $this->storeMrmAgenda($request);

            case 'FOM-008':
                return $this->storeMrmAttendance($request);

            case 'FOM-009':
                return $this->storeMinutesOfMrm($request);

            case 'FOM-010':
                return $this->storeMrmTaskCompliance($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * FOM-007 – MRM Agenda Form
     * Single record per meeting date
     * Filter: Meeting Date onchange loads data
     * =============================================
     */
    private function storeMrmAgenda(Request $request)
    {
        $mrmDate = $request->input('mrm_date');

        // Collect attendees array
        $attendees = [];
        $attendeesInput = $request->input('attendees', []);
        foreach ($attendeesInput as $name) {
            $trimmed = trim($name ?? '');
            if ($trimmed !== '') {
                $attendees[] = $trimmed;
            }
        }

        // Collect agenda completed checkboxes
        $agendaCompleted = [];
        $agendaInput = $request->input('agenda_completed', []);
        foreach ($agendaInput as $index => $val) {
            $agendaCompleted[] = (int) $index;
        }

        $payload = [
            'doc_no'            => $request->doc_no,
            'mrm_date'          => $mrmDate ?: null,
            'mrm_time'          => $request->input('mrm_time', ''),
            'location'          => $request->input('location', ''),
            'duration'          => $request->input('duration', ''),
            'chairperson'       => $request->input('chairperson', ''),
            'recorder'          => $request->input('recorder', ''),
            'attendees'         => $attendees,
            'agenda_completed'  => $agendaCompleted,
            'confirmation_date' => $request->input('confirmation_date') ?: null,
            'sender_name'       => $request->input('sender_name', ''),
            'contact_details'   => $request->input('contact_details', ''),
        ];

        $existingId = $request->input('record_id');

        if ($existingId) {
            MrmAgendaForm::where('id', $existingId)->update(
                array_merge($payload, ['updated_by' => auth()->id()])
            );
            $record = MrmAgendaForm::find($existingId);
        } else {
            $record = MrmAgendaForm::create(
                array_merge($payload, ['created_by' => auth()->id()])
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'MRM Agenda Form saved successfully.',
            'data'    => $record,
        ]);
    }

    /**
     * LOAD MRM Agenda Form data by meeting date (AJAX)
     */
    public function loadMrmAgenda(Request $request)
    {
        $record = null;

        if ($request->filled('mrm_date')) {
            $record = MrmAgendaForm::where('mrm_date', $request->mrm_date)
                ->latest('id')
                ->first();
        }

        return response()->json([
            'success' => $record !== null,
            'data'    => $record,
        ]);
    }

    /**
     * =============================================
     * FOM-008 – MRM Attendance Form
     * Single record per meeting date
     * Filter: Meeting Date onchange loads data
     * =============================================
     */
    private function storeMrmAttendance(Request $request)
    {
        $meetingDate = $request->input('meeting_date');

        // Collect attendees array (objects with name, department, designation, signature)
        $attendees = [];
        $attendeesInput = $request->input('attendees', []);
        foreach ($attendeesInput as $row) {
            $name        = trim($row['name'] ?? '');
            $department  = trim($row['department'] ?? '');
            $designation = trim($row['designation'] ?? '');
            $signature   = trim($row['signature'] ?? '');
            if ($name !== '' || $department !== '' || $designation !== '') {
                $attendees[] = [
                    'name'        => $name,
                    'department'  => $department,
                    'designation' => $designation,
                    'signature'   => $signature,
                ];
            }
        }

        $payload = [
            'doc_no'       => $request->doc_no,
            'meeting_date' => $meetingDate ?: null,
            'meeting_time' => $request->input('meeting_time', ''),
            'venue'        => $request->input('venue', ''),
            'attendees'    => $attendees,
            'remarks'      => $request->input('remarks', ''),
        ];

        $existingId = $request->input('record_id');

        if ($existingId) {
            MrmAttendanceForm::where('id', $existingId)->update(
                array_merge($payload, ['updated_by' => auth()->id()])
            );
            $record = MrmAttendanceForm::find($existingId);
        } else {
            $record = MrmAttendanceForm::create(
                array_merge($payload, ['created_by' => auth()->id()])
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'MRM Attendance Form saved successfully.',
            'data'    => $record,
        ]);
    }

    /**
     * LOAD MRM Attendance Form data by meeting date (AJAX)
     */
    public function loadMrmAttendance(Request $request)
    {
        $record = null;

        if ($request->filled('meeting_date')) {
            $record = MrmAttendanceForm::where('meeting_date', $request->meeting_date)
                ->latest('id')
                ->first();
        }

        return response()->json([
            'success' => $record !== null,
            'data'    => $record,
        ]);
    }

    /**
     * =============================================
     * FOM-009 – Minutes of MRM
     * Single record per meeting date
     * Filter: Meeting Date onchange loads data
     * =============================================
     */
    private function storeMinutesOfMrm(Request $request)
    {
        $meetingDate = $request->input('date');

        // Present members
        $present = [];
        foreach ($request->input('present', []) as $name) {
            $trimmed = trim($name ?? '');
            if ($trimmed !== '') {
                $present[] = $trimmed;
            }
        }

        // Absent members (name + reason)
        $absent = [];
        foreach ($request->input('absent', []) as $row) {
            $name   = trim($row['name'] ?? '');
            $reason = trim($row['reason'] ?? '');
            if ($name !== '' || $reason !== '') {
                $absent[] = ['name' => $name, 'reason' => $reason];
            }
        }

        // Previous meeting actions
        $previousActions = [];
        foreach ($request->input('previous_actions', []) as $row) {
            $action = trim($row['action'] ?? '');
            $resp   = trim($row['responsible'] ?? '');
            if ($action !== '' || $resp !== '') {
                $previousActions[] = [
                    'action'      => $action,
                    'responsible' => $resp,
                    'target'      => $row['target'] ?? '',
                    'status'      => trim($row['status'] ?? ''),
                ];
            }
        }

        // Current meeting actions
        $currentActions = [];
        foreach ($request->input('current_actions', []) as $row) {
            $action = trim($row['action'] ?? '');
            $resp   = trim($row['responsible'] ?? '');
            if ($action !== '' || $resp !== '') {
                $currentActions[] = [
                    'action'      => $action,
                    'responsible' => $resp,
                    'target'      => $row['target'] ?? '',
                    'status'      => trim($row['status'] ?? ''),
                ];
            }
        }

        $payload = [
            'doc_no'           => $request->doc_no,
            'meeting_date'     => $meetingDate ?: null,
            'present'          => $present,
            'absent'           => $absent,
            'venue'            => $request->input('venue', ''),
            'start_time'       => $request->input('start_time', ''),
            'end_time'         => $request->input('end_time', ''),
            'previous_actions' => $previousActions,
            'summary'          => $request->input('summary', ''),
            'decisions'        => $request->input('decisions', ''),
            'current_actions'  => $currentActions,
            'performance'      => $request->input('performance', ''),
            'remarks'          => $request->input('remarks', ''),
            'next_review'      => $request->input('next_review') ?: null,
            'chairperson'      => $request->input('chairperson', ''),
            'chairperson_date' => $request->input('chairperson_date') ?: null,
            'recorder'         => $request->input('recorder', ''),
            'recorder_date'    => $request->input('recorder_date') ?: null,
        ];

        $existingId = $request->input('record_id');

        if ($existingId) {
            MinutesOfMrmForm::where('id', $existingId)->update(
                array_merge($payload, ['updated_by' => auth()->id()])
            );
            $record = MinutesOfMrmForm::find($existingId);
        } else {
            $record = MinutesOfMrmForm::create(
                array_merge($payload, ['created_by' => auth()->id()])
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Minutes of MRM saved successfully.',
            'data'    => $record,
        ]);
    }

    /**
     * LOAD Minutes of MRM data by meeting date (AJAX)
     */
    public function loadMinutesOfMrm(Request $request)
    {
        $record = null;

        if ($request->filled('meeting_date')) {
            $record = MinutesOfMrmForm::where('meeting_date', $request->meeting_date)
                ->latest('id')
                ->first();
        }

        return response()->json([
            'success' => $record !== null,
            'data'    => $record,
        ]);
    }

    /**
     * =============================================
     * FOM-010 – MRM Task Completion & Compliance
     * Single record per meeting date
     * Filter: Meeting Date onchange loads data
     * =============================================
     */
    private function storeMrmTaskCompliance(Request $request)
    {
        $meetingDate = $request->input('meeting_date');

        // Collect tasks array (objects)
        $tasks = [];
        foreach ($request->input('tasks', []) as $row) {
            $action = trim($row['action'] ?? '');
            $resp   = trim($row['responsible'] ?? '');
            if ($action !== '' || $resp !== '') {
                $tasks[] = [
                    'action'       => $action,
                    'responsible'  => $resp,
                    'target_date'  => $row['target_date'] ?? '',
                    'status'       => trim($row['status'] ?? ''),
                    'completed_on' => $row['completed_on'] ?? '',
                    'compliance'   => trim($row['compliance'] ?? ''),
                ];
            }
        }

        $payload = [
            'doc_no'           => $request->doc_no,
            'meeting_date'     => $meetingDate ?: null,
            'tasks'            => $tasks,
            'performance'      => $request->input('performance', ''),
            'remarks'          => $request->input('remarks', ''),
            'next_review'      => $request->input('next_review') ?: null,
            'chairperson'      => $request->input('chairperson', ''),
            'chairperson_date' => $request->input('chairperson_date') ?: null,
            'recorder'         => $request->input('recorder', ''),
            'recorder_date'    => $request->input('recorder_date') ?: null,
        ];

        $existingId = $request->input('record_id');

        if ($existingId) {
            MrmTaskComplianceForm::where('id', $existingId)->update(
                array_merge($payload, ['updated_by' => auth()->id()])
            );
            $record = MrmTaskComplianceForm::find($existingId);
        } else {
            $record = MrmTaskComplianceForm::create(
                array_merge($payload, ['created_by' => auth()->id()])
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'MRM Task Completion & Compliance saved successfully.',
            'data'    => $record,
        ]);
    }

    /**
     * LOAD MRM Task Completion & Compliance data by meeting date (AJAX)
     */
    public function loadMrmTaskCompliance(Request $request)
    {
        $record = null;

        if ($request->filled('meeting_date')) {
            $record = MrmTaskComplianceForm::where('meeting_date', $request->meeting_date)
                ->latest('id')
                ->first();
        }

        return response()->json([
            'success' => $record !== null,
            'data'    => $record,
        ]);
    }
}
