<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentChangeRequestForm;
use App\Models\InternalAuditorsForm;
use App\Models\AnnualIqAuditPlan;
use App\Models\AuthorizedSpecimenSignature;
use App\Models\AuthorizedSignatoryList;
use App\Models\VaccinationProcurementForm;
use App\Models\EmployeeVaccinationRecord;

class QAFormsController extends Controller
{
    public function store(Request $request)
    {
        $docNo = $request->doc_no;
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeDcr($request);
            case 'FOM-004':
                return $this->storeInternalAuditors($request);
            case 'FOM-013':
                return $this->storeAnnualAuditPlan($request);
            case 'FOM-017':
                return $this->storeAuthorizedSignatures($request);
            case 'FOM-018':
                return $this->storeAuthorizedSignatoryList($request);
            case 'FOM-019':
                return $this->storeVaccinationProcurement($request);
            case 'FOM-036':
                return $this->storeEmployeeVaccinationRecords($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * FOM-001 – Document Change Request Form
     * Single record per requester_name + document_no
     * =============================================
     */
    protected function storeDcr(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        // Text fields
        $textFields = [
            'requester_name', 'department',
            'document_name', 'document_no', 'page_no', 'clause_no',
            'nature_of_change', 'reason_for_change',
            'request_status',
            'request_status_date', 'request_status_signature',
            'approved_by', 'approved_by_date', 'approved_by_signature',
            'current_version', 'new_version',
        ];
        foreach ($textFields as $f) {
            $payload[$f] = $request->input($f);
        }

        // JSON array fields (checkboxes)
        foreach (['document_types', 'followup_changes'] as $field) {
            $val = $request->input($field);
            $payload[$field] = $val ? array_values((array) $val) : [];
        }

        if ($request->filled('form_id')) {
            DocumentChangeRequestForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = DocumentChangeRequestForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Document Change Request Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Document Change Request Form saved successfully');
    }

    /**
     * LOAD Document Change Request Form data (AJAX)
     */
    public function loadDcr(Request $request)
    {
        $query = DocumentChangeRequestForm::query();

        if ($request->filled('requester_name')) {
            $query->where('requester_name', $request->requester_name);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-004 – List of Internal Auditors
     * Single record, auditors stored as JSON
     * =============================================
     */
    protected function storeInternalAuditors(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
            'auditors'   => $request->input('auditors'),
            'prepared_by'     => $request->input('prepared_by'),
            'approved_by'     => $request->input('approved_by'),
            'quality_manager' => $request->input('quality_manager'),
            'lab_director'    => $request->input('lab_director'),
        ];

        if ($request->filled('form_id')) {
            InternalAuditorsForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = InternalAuditorsForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'List of Internal Auditors saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'List of Internal Auditors saved successfully');
    }

    /**
     * LOAD Internal Auditors data (AJAX)
     */
    public function loadInternalAuditors()
    {
        $form = InternalAuditorsForm::latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-013 – Annual IQ Audit Plan
     * One record per plan_year, grid stored as JSON
     * =============================================
     */
    protected function storeAnnualAuditPlan(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
            'plan_year'  => $request->input('plan_year'),
            'plan_data'  => $request->input('plan_data'),
        ];

        if ($request->filled('form_id')) {
            AnnualIqAuditPlan::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = AnnualIqAuditPlan::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Annual IQ Audit Plan saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Annual IQ Audit Plan saved successfully');
    }

    /**
     * LOAD Annual IQ Audit Plan data (AJAX)
     */
    public function loadAnnualAuditPlan(Request $request)
    {
        $query = AnnualIqAuditPlan::query();

        if ($request->filled('plan_year')) {
            $query->where('plan_year', $request->plan_year);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-017 – Authorized Specimen-Signatures Form
     * One record per month_year + department,
     * rows stored as JSON array
     * =============================================
     */
    protected function storeAuthorizedSignatures(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        // Build signatures array from parallel arrays
        $signatures = [];
        $employeeNames   = $request->input('employee_name', []);
        $designations    = $request->input('designation', []);
        $fullSignatures  = $request->input('full_signature', []);
        $shortSignatures = $request->input('short_signature', []);

        for ($i = 0; $i < count($employeeNames); $i++) {
            if (empty($employeeNames[$i]) && empty($designations[$i])
                && empty($fullSignatures[$i]) && empty($shortSignatures[$i])) {
                continue;
            }
            $signatures[] = [
                'employee_name'   => $employeeNames[$i] ?? '',
                'designation'     => $designations[$i] ?? '',
                'full_signature'  => $fullSignatures[$i] ?? '',
                'short_signature' => $shortSignatures[$i] ?? '',
            ];
        }

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
            'month_year' => $request->input('month_year'),
            'location'   => $request->input('location'),
            'department' => $request->input('department'),
            'signatures' => $signatures,
        ];

        if ($request->filled('form_id')) {
            AuthorizedSpecimenSignature::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = AuthorizedSpecimenSignature::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Authorized Specimen-Signatures Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Authorized Specimen-Signatures Form saved successfully');
    }

    /**
     * LOAD Authorized Specimen-Signatures data (AJAX)
     */
    public function loadAuthorizedSignatures(Request $request)
    {
        $query = AuthorizedSpecimenSignature::query();

        if ($request->filled('month_year')) {
            $query->where('month_year', $request->month_year);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-018 – Authorized Signatory List
     * Single record, signatories stored as JSON
     * =============================================
     */
    protected function storeAuthorizedSignatoryList(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $signatories = [];
        $depts            = $request->input('dept', []);
        $signatoryNames   = $request->input('signatory_name', []);
        $qualifications   = $request->input('qualification', []);
        $experiences      = $request->input('experience', []);
        $trainings        = $request->input('training', []);
        $worktypes        = $request->input('worktype', []);
        $authorizedAreas  = $request->input('authorized_area', []);
        $specimenSigs     = $request->input('specimen_signature', []);

        for ($i = 0; $i < count($depts); $i++) {
            $signatories[] = [
                'dept'                => $depts[$i] ?? '',
                'signatory_name'      => $signatoryNames[$i] ?? '',
                'qualification'       => $qualifications[$i] ?? '',
                'experience'          => $experiences[$i] ?? '',
                'training'            => $trainings[$i] ?? '',
                'worktype'            => $worktypes[$i] ?? '',
                'authorized_area'     => $authorizedAreas[$i] ?? '',
                'specimen_signature'  => $specimenSigs[$i] ?? '',
            ];
        }

        $payload = [
            'doc_no'      => $request->doc_no,
            'issue_no'    => $request->issue_no,
            'issue_date'  => $request->issue_date,
            'signatories' => $signatories,
        ];

        if ($request->filled('form_id')) {
            AuthorizedSignatoryList::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = AuthorizedSignatoryList::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Authorized Signatory List saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Authorized Signatory List saved successfully');
    }

    /**
     * LOAD Authorized Signatory List data (AJAX)
     */
    public function loadAuthorizedSignatoryList()
    {
        $form = AuthorizedSignatoryList::latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-019 – Vaccination Procurement & Traceability Form
     * Each row is a separate record
     * =============================================
     */
    protected function storeVaccinationProcurement(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $savedIds = [];

        if (is_array($request->row_purchase_date)) {
            $rowCount       = count($request->row_purchase_date);
            $rowIds          = $request->row_id ?? [];
            $rowVaccineName  = $request->row_vaccine_name ?? [];
            $rowManufacturer = $request->row_manufacturer_name ?? [];
            $rowSupplier     = $request->row_supplier_name ?? [];
            $rowLotNo        = $request->row_lot_no ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_purchase_date[$i])) {
                    continue;
                }

                $data = [
                    'purchase_date'     => $request->row_purchase_date[$i],
                    'vaccine_name'      => $rowVaccineName[$i] ?? null,
                    'manufacturer_name' => $rowManufacturer[$i] ?? null,
                    'supplier_name'     => $rowSupplier[$i] ?? null,
                    'lot_no'            => $rowLotNo[$i] ?? null,
                ];

                $rowId = $rowIds[$i] ?? null;

                if ($rowId) {
                    VaccinationProcurementForm::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = VaccinationProcurementForm::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = VaccinationProcurementForm::whereIn('id', $savedIds)
                ->orderBy('purchase_date', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Vaccination Procurement & Traceability Form saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Vaccination Procurement & Traceability Form saved successfully');
    }

    /**
     * LOAD Vaccination Procurement data (AJAX)
     */
    public function loadVaccinationProcurement(Request $request)
    {
        $query = VaccinationProcurementForm::query();

        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date;

        if ($from) {
            $query->whereDate('purchase_date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('purchase_date', '<=', $to);
        }

        return response()->json([
            'data' => $query->orderBy('purchase_date', 'desc')->get()
        ]);
    }

    /**
     * =============================================
     * FOM-036 – Employee Vaccination Records
     * Each row is a separate employee record
     * =============================================
     */
    protected function storeEmployeeVaccinationRecords(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $savedIds = [];

        if (is_array($request->row_emp_id)) {
            $rowCount        = count($request->row_emp_id);
            $rowIds          = $request->row_id ?? [];
            $rowName         = $request->row_name ?? [];
            $rowDepartment   = $request->row_department ?? [];
            $rowDesignation  = $request->row_designation ?? [];
            $rowDose1Due     = $request->row_dose1_due ?? [];
            $rowDose1Given   = $request->row_dose1_given ?? [];
            $rowDose1Lot     = $request->row_dose1_lot ?? [];
            $rowDose2Due     = $request->row_dose2_due ?? [];
            $rowDose2Given   = $request->row_dose2_given ?? [];
            $rowDose2Lot     = $request->row_dose2_lot ?? [];
            $rowDose3Due     = $request->row_dose3_due ?? [];
            $rowDose3Given   = $request->row_dose3_given ?? [];
            $rowDose3Lot     = $request->row_dose3_lot ?? [];
            $rowTitre        = $request->row_titre ?? [];
            $rowStatus       = $request->row_status ?? [];
            $rowSignature    = $request->row_signature ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_emp_id[$i]) && empty($rowName[$i])) {
                    continue;
                }

                $data = [
                    'emp_id'      => $request->row_emp_id[$i] ?? null,
                    'name'        => $rowName[$i] ?? null,
                    'department'  => $rowDepartment[$i] ?? null,
                    'designation' => $rowDesignation[$i] ?? null,
                    'dose1_due'   => $rowDose1Due[$i] ?? null,
                    'dose1_given' => $rowDose1Given[$i] ?? null,
                    'dose1_lot'   => $rowDose1Lot[$i] ?? null,
                    'dose2_due'   => $rowDose2Due[$i] ?? null,
                    'dose2_given' => $rowDose2Given[$i] ?? null,
                    'dose2_lot'   => $rowDose2Lot[$i] ?? null,
                    'dose3_due'   => $rowDose3Due[$i] ?? null,
                    'dose3_given' => $rowDose3Given[$i] ?? null,
                    'dose3_lot'   => $rowDose3Lot[$i] ?? null,
                    'titre'       => $rowTitre[$i] ?? null,
                    'status'      => $rowStatus[$i] ?? null,
                    'signature'   => $rowSignature[$i] ?? null,
                ];

                $rowId = $rowIds[$i] ?? null;

                if ($rowId) {
                    EmployeeVaccinationRecord::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = EmployeeVaccinationRecord::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = EmployeeVaccinationRecord::whereIn('id', $savedIds)
                ->orderBy('name', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Employee Vaccination Records saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Employee Vaccination Records saved successfully');
    }

    /**
     * LOAD Employee Vaccination Records data (AJAX)
     */
    public function loadEmployeeVaccinationRecords(Request $request)
    {
        $query = EmployeeVaccinationRecord::query();

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return response()->json([
            'data' => $query->orderBy('name', 'asc')->get()
        ]);
    }
}
