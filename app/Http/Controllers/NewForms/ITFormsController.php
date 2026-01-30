<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LisInterfaceValidationForm;
use App\Models\AutoApprovalAuthorizationForm;
use App\Models\LisUserLoginCreationForm;

class ITFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/IT/FOM-001
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null; // FOM-001, FOM-002, etc.

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeLisInterfaceValidationForm($request);

            case 'FOM-003':
                return $this->storeAutoApprovalAuthorizationForm($request);

            case 'FOM-004':
                return $this->storeLisUserLoginCreationForm($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * STORE LIS Interface Validation Form (FOM-001)
     */
    private function storeLisInterfaceValidationForm(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $formId = $request->lis_interface_form_id;

        $data = $request->only([
            'department',
            'analyzer_name',
            'instrument_serial',
            'instrument_id',
            'analyzer_type',
            'validation_step_1',
            'validation_step_2',
            'validation_step_3',
            'validation_step_4',
            'validation_step_5',
            'remarks',
        ]);

        // Collect non-empty test rows (JSON)
        $testsRaw = $request->input('tests', []);
        $testsData = [];

        foreach ($testsRaw as $idx => $row) {
            $code = trim($row['code'] ?? '');
            $name = trim($row['name'] ?? '');
            $lis  = trim($row['lis'] ?? '');

            if ($code === '' && $name === '' && $lis === '') {
                continue;
            }

            $testsData[] = [
                'sno'  => count($testsData) + 1,
                'code' => $code,
                'name' => $name,
                'lis'  => $lis,
            ];
        }

        $data['tests_data'] = !empty($testsData) ? $testsData : null;

        if ($formId) {
            $form = LisInterfaceValidationForm::findOrFail($formId);
            $form->update($data);
        } else {
            $form = LisInterfaceValidationForm::create($data);
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'LIS Interface Validation Form saved successfully',
                'form_id' => $form->id,
            ]);
        }

        return back()->with([
            'success' => 'LIS Interface Validation Form saved successfully',
            'lis_interface_form_id' => $form->id,
        ]);
    }

    /**
     * LOAD LIS Interface Validation Form (FOM-001)
     */
    public function loadLisInterfaceValidationForm(Request $request)
    {
        if (!$request->filled('analyzer_name')) {
            return response()->json(['data' => null]);
        }

        $form = LisInterfaceValidationForm::where('analyzer_name', $request->analyzer_name)
            ->latest()
            ->first();

        return response()->json(['data' => $form]);
    }

    /**
     * =============================================
     * FOM-003 – Auto Approval Authorization
     * Store-only: individual columns + JSON arrays
     * =============================================
     */
    private function storeAutoApprovalAuthorizationForm(Request $request)
    {
        // Section A – Tests (skip empty rows)
        $testsRaw = $request->input('tests', []);
        $testsData = [];
        foreach ($testsRaw as $row) {
            $name  = trim($row['name'] ?? '');
            $dept  = trim($row['dept'] ?? '');
            $equip = trim($row['equip'] ?? '');
            $ref   = trim($row['ref'] ?? '');
            $auto  = trim($row['auto'] ?? '');

            if ($name === '' && $dept === '' && $equip === '') {
                continue;
            }

            $testsData[] = [
                'name'  => $name,
                'dept'  => $dept,
                'equip' => $equip,
                'ref'   => $ref,
                'auto'  => $auto,
            ];
        }

        // Section B – Criteria (skip empty rows)
        $criteriaRaw = $request->input('criteria', []);
        $criteriaData = [];
        foreach ($criteriaRaw as $row) {
            $text = trim($row['text'] ?? '');
            $yn   = trim($row['yn'] ?? '');

            if ($text === '' && $yn === '') {
                continue;
            }

            $criteriaData[] = [
                'text' => $text,
                'yn'   => $yn,
            ];
        }

        // Section C – Authorized Personnel (skip empty rows)
        $authorizedRaw = $request->input('authorized', []);
        $authorizedData = [];
        foreach ($authorizedRaw as $row) {
            $name         = trim($row['name'] ?? '');
            $designation  = trim($row['designation'] ?? '');
            $qualification = trim($row['qualification'] ?? '');
            $department   = trim($row['department'] ?? '');
            $signature    = trim($row['signature'] ?? '');

            if ($name === '' && $designation === '') {
                continue;
            }

            $authorizedData[] = [
                'name'          => $name,
                'designation'   => $designation,
                'qualification' => $qualification,
                'department'    => $department,
                'signature'     => $signature,
            ];
        }

        $record = AutoApprovalAuthorizationForm::create([
            'doc_no'           => $request->doc_no,
            'department'       => $request->department,
            'tests_data'       => !empty($testsData) ? $testsData : null,
            'criteria_data'    => !empty($criteriaData) ? $criteriaData : null,
            'authorized_data'  => !empty($authorizedData) ? $authorizedData : null,
            'log_registration' => $request->log_registration,
            'log_receive'      => $request->log_receive,
            'log_result'       => $request->log_result,
            'log_reports'      => $request->log_reports,
            'declaration'      => $request->declaration,
            'created_by'       => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Auto Approval Authorization saved successfully.',
            'id'      => $record->id,
        ]);
    }

    /**
     * =============================================
     * FOM-004 – LIS User ID & Mail ID Login Creation Form
     * Store: individual columns + JSON roles
     * =============================================
     */
    private function storeLisUserLoginCreationForm(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $formId = $request->lis_user_login_form_id;

        $data = $request->only([
            'date',
            'employee_no',
            'employee_name',
            'department',
            'email',
            'lims_id',
            'requested_by',
            'authorized_by',
            'reason',
            'login_created',
            'created_date',
            'login_by',
            'sign',
        ]);

        $data['date'] = $data['date'] ?: null;
        $data['created_date'] = $data['created_date'] ?: null;
        $data['roles'] = $request->input('roles', []);

        if ($formId) {
            $form = LisUserLoginCreationForm::findOrFail($formId);
            $form->update($data);
        } else {
            $data['created_by'] = auth()->id();
            $form = LisUserLoginCreationForm::create($data);
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'LIS User ID & Mail ID Login Creation Form saved successfully.',
                'form_id' => $form->id,
            ]);
        }

        return back()->with([
            'success' => 'LIS User ID & Mail ID Login Creation Form saved successfully.',
            'lis_user_login_form_id' => $form->id,
        ]);
    }

    /**
     * LOAD LIS User ID & Mail ID Login Creation Form (FOM-004)
     */
    public function loadLisUserLoginCreationForm(Request $request)
    {
        if (!$request->filled('employee_name')) {
            return response()->json(['data' => null]);
        }

        $form = LisUserLoginCreationForm::where('employee_name', $request->employee_name)
            ->latest()
            ->first();

        return response()->json(['data' => $form]);
    }
}
