<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SerologyWorkRegister;
use App\Models\IncomingMaterialInspection;
use App\Models\SupplierCorrectiveActionRequest;
use App\Models\ExpiredReagentTracking;
use App\Models\BorrowingTracking;
use App\Models\RecallTracking;

class SMFormsController extends Controller
{
    public function store(Request $request)
    {
        $docNo = $request->doc_no;
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {
            case 'REG-001':
                return $this->storeSerologyWorkRegister($request);
            case 'FOM-001':
                return $this->storeIncomingMaterialInspection($request);
            case 'FOM-004':
                return $this->storeSupplierCorrectiveAction($request);
            case 'FOM-008':
                return $this->storeExpiredReagentTracking($request);
            case 'FOM-009':
                return $this->storeBorrowingTracking($request);
            case 'FOM-010':
                return $this->storeRecallTracking($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * REG-001 – Serology Work Register
     * Each row is a separate sample record
     * =============================================
     */
    protected function storeSerologyWorkRegister(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $formDate = $request->swrFormDate ?: now()->toDateString();
        $savedIds = [];

        if (is_array($request->row_barcode)) {
            $rowCount           = count($request->row_barcode);
            $rowIds             = $request->row_id ?? [];
            $rowPatientName     = $request->row_patient_name ?? [];
            $rowAgeGender       = $request->row_age_gender ?? [];
            $rowInvestigation   = $request->row_investigation ?? [];
            $rowSampleType      = $request->row_sample_type ?? [];
            $rowSampleReceived  = $request->row_sample_received ?? [];
            $rowReceivedBy      = $request->row_sample_received_by ?? [];
            $rowProcessingDt    = $request->row_processing_datetime ?? [];
            $rowProcessedBy     = $request->row_processed_by ?? [];
            $rowObservations    = $request->row_observations ?? [];
            $rowHodSignature    = $request->row_hod_signature ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_barcode[$i]) && empty($rowPatientName[$i])) {
                    continue;
                }

                $data = [
                    'form_date'           => $formDate,
                    'barcode'             => $request->row_barcode[$i] ?? null,
                    'patient_name'        => $rowPatientName[$i] ?? null,
                    'age_gender'          => $rowAgeGender[$i] ?? null,
                    'investigation'       => $rowInvestigation[$i] ?? null,
                    'sample_type'         => $rowSampleType[$i] ?? null,
                    'sample_received'     => $rowSampleReceived[$i] ?? null,
                    'sample_received_by'  => $rowReceivedBy[$i] ?? null,
                    'processing_datetime' => $rowProcessingDt[$i] ?? null,
                    'processed_by'        => $rowProcessedBy[$i] ?? null,
                    'observations'        => $rowObservations[$i] ?? null,
                    'hod_signature'       => $rowHodSignature[$i] ?? null,
                ];

                $rowId = $rowIds[$i] ?? null;

                if ($rowId) {
                    SerologyWorkRegister::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = SerologyWorkRegister::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = SerologyWorkRegister::whereIn('id', $savedIds)
                ->orderBy('id', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Serology Work Register saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Serology Work Register saved successfully');
    }

    /**
     * LOAD Serology Work Register data (AJAX)
     */
    public function loadSerologyWorkRegister(Request $request)
    {
        $query = SerologyWorkRegister::query();

        $from = $request->from_date;
        $to   = $request->to_date ?: $request->from_date;

        if ($from) {
            $query->whereDate('form_date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('form_date', '<=', $to);
        }

        if ($request->filled('investigation')) {
            $query->where('investigation', $request->investigation);
        }

        if ($request->filled('sample_type')) {
            $query->where('sample_type', $request->sample_type);
        }

        return response()->json([
            'data' => $query->orderBy('form_date', 'desc')->orderBy('id', 'asc')->get()
        ]);
    }

    /**
     * =============================================
     * FOM-001 – Incoming Material Inspection Form
     * Single record per supplier_name + po_number
     * =============================================
     */
    protected function storeIncomingMaterialInspection(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $formId = $request->input('imi_form_id');

        $fields = [
            'supplier_name', 'po_number', 'inspector_name',
            'po_date', 'inspection_date', 'invoice_number',
            'section1_item0', 'section1_item1', 'section1_item2', 'section1_item3', 'section1_notes',
            'section2_item0', 'section2_item1', 'section2_item2', 'section2_notes',
            'section3_item0', 'section3_item1', 'section3_item2', 'section3_item3', 'section3_notes',
            'section4_item0', 'section4_item1', 'section4_item2', 'section4_notes',
            'section5_item0', 'section5_item1', 'section5_item2', 'section5_notes',
            'section6_item0', 'section6_item1', 'section6_item2', 'section6_notes',
            'section7_item0', 'section7_item1', 'section7_item2', 'section7_notes',
            'additional_notes',
            'compliance_inspector_name', 'compliance_signature', 'compliance_inspection_date',
            'approver_name', 'approver_signature', 'approver_date',
        ];

        $data = $request->only($fields);

        if ($formId) {
            $form = IncomingMaterialInspection::findOrFail($formId);
            $form->update($data);
        } else {
            $form = IncomingMaterialInspection::create($data);
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Incoming Material Inspection Form saved successfully',
                'form_id' => $form->id,
            ]);
        }

        return back()->with('success', 'Incoming Material Inspection Form saved successfully');
    }

    /**
     * LOAD Incoming Material Inspection data (AJAX)
     */
    public function loadIncomingMaterialInspection(Request $request)
    {
        if (!$request->filled('supplier_name')) {
            return response()->json(['data' => null]);
        }

        $form = IncomingMaterialInspection::where('supplier_name', $request->supplier_name)
            ->latest()
            ->first();

        return response()->json(['data' => $form]);
    }

    /**
     * =============================================
     * FOM-004 – Supplier Corrective Action Request
     * Single record per supplier_name
     * =============================================
     */
    protected function storeSupplierCorrectiveAction(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $formId = $request->input('scar_form_id');

        $fields = [
            'supplier_name', 'attention', 'phone', 'email',
            'nonconformance_description',
            'po_number', 'product_number', 'product_name', 'quantity_affected',
            'date_sent', 'sent_by',
            'root_cause', 'corrective_action',
            'supplier_manager_signature', 'supplier_signature_date', 'supplier_name_title',
            'response_accepted', 'purchasing_signature', 'purchasing_date',
        ];

        $data = $request->only($fields);

        if ($formId) {
            $form = SupplierCorrectiveActionRequest::findOrFail($formId);
            $form->update($data);
        } else {
            $form = SupplierCorrectiveActionRequest::create($data);
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Supplier Corrective Action Request saved successfully',
                'form_id' => $form->id,
            ]);
        }

        return back()->with('success', 'Supplier Corrective Action Request saved successfully');
    }

    /**
     * LOAD Supplier Corrective Action Request data (AJAX)
     */
    public function loadSupplierCorrectiveAction(Request $request)
    {
        if (!$request->filled('supplier_name')) {
            return response()->json(['data' => null]);
        }

        $form = SupplierCorrectiveActionRequest::where('supplier_name', $request->supplier_name)
            ->latest()
            ->first();

        return response()->json(['data' => $form]);
    }

    /**
     * =============================================
     * FOM-008 – Expired Reagent & Consumable Tracking
     * Each row is a separate record per month/year
     * =============================================
     */
    protected function storeExpiredReagentTracking(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $month = $request->input('ert_month');
        $year  = $request->input('ert_year');

        if (!$month || !$year) {
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please select Month and Year before saving.',
                ], 400);
            }
            return back()->withErrors('Month and Year are required.');
        }

        // Footer fields (shared across all rows)
        $reportedBy   = $request->input('reported_by');
        $reportedSign = $request->input('reported_sign');
        $reportedDate = $request->input('reported_date');
        $approvedBy   = $request->input('approved_by');
        $approvedSign = $request->input('approved_sign');
        $approvedDate = $request->input('approved_date');

        $savedIds = [];

        if (is_array($request->row_reagent_name)) {
            $rowCount = count($request->row_reagent_name);
            $rowIds           = $request->row_id ?? [];
            $rowLot           = $request->row_lot_number ?? [];
            $rowManufactured  = $request->row_date_manufactured ?? [];
            $rowExpiry        = $request->row_expiration_date ?? [];
            $rowUnit          = $request->row_unit ?? [];
            $rowQty           = $request->row_quantity ?? [];
            $rowRemoval       = $request->row_removal_date ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_reagent_name[$i])) {
                    continue;
                }

                $data = [
                    'tracking_month'    => $month,
                    'tracking_year'     => $year,
                    'reagent_name'      => $request->row_reagent_name[$i],
                    'lot_number'        => $rowLot[$i] ?? null,
                    'date_manufactured' => $rowManufactured[$i] ?: null,
                    'expiration_date'   => $rowExpiry[$i] ?: null,
                    'unit_of_measurement' => $rowUnit[$i] ?? null,
                    'quantity'          => $rowQty[$i] ?? null,
                    'removal_date'      => $rowRemoval[$i] ?: null,
                    'reported_by'       => $reportedBy,
                    'reported_sign'     => $reportedSign,
                    'reported_date'     => $reportedDate ?: null,
                    'approved_by'       => $approvedBy,
                    'approved_sign'     => $approvedSign,
                    'approved_date'     => $approvedDate ?: null,
                ];

                $rowId = $rowIds[$i] ?? null;

                if ($rowId) {
                    ExpiredReagentTracking::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = ExpiredReagentTracking::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = ExpiredReagentTracking::whereIn('id', $savedIds)
                ->orderBy('id', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Expired Reagent Tracking saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Expired Reagent Tracking saved successfully');
    }

    /**
     * LOAD Expired Reagent Tracking data (AJAX)
     */
    public function loadExpiredReagentTracking(Request $request)
    {
        if (!$request->filled('month') || !$request->filled('year')) {
            return response()->json(['data' => []]);
        }

        $records = ExpiredReagentTracking::where('tracking_month', $request->month)
            ->where('tracking_year', $request->year)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json(['data' => $records]);
    }

    /**
     * =============================================
     * FOM-009 – Borrowing Tracking Form
     * Each row is a separate record per month/year
     * =============================================
     */
    protected function storeBorrowingTracking(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $month = $request->input('bt_month');
        $year  = $request->input('bt_year');

        if (!$month || !$year) {
            if ($isAjax) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please select Month and Year before saving.',
                ], 400);
            }
            return back()->withErrors('Month and Year are required.');
        }

        $reportedBy   = $request->input('reported_by');
        $reportedSign = $request->input('reported_sign');
        $reportedDate = $request->input('reported_date');
        $approvedBy   = $request->input('approved_by');
        $approvedSign = $request->input('approved_sign');
        $approvedDate = $request->input('approved_date');

        $savedIds = [];

        if (is_array($request->row_reagent_name)) {
            $rowCount = count($request->row_reagent_name);
            $rowIds          = $request->row_id ?? [];
            $rowBorrowed     = $request->row_borrowed_from ?? [];
            $rowLot          = $request->row_lot_number ?? [];
            $rowManufactured = $request->row_date_manufactured ?? [];
            $rowExpiry       = $request->row_expiration_date ?? [];
            $rowQtyUnit      = $request->row_quantity_unit ?? [];
            $rowLims         = $request->row_lims_ticket ?? [];

            for ($i = 0; $i < $rowCount; $i++) {
                if (empty($request->row_reagent_name[$i])) {
                    continue;
                }

                $data = [
                    'tracking_month'    => $month,
                    'tracking_year'     => $year,
                    'reagent_name'      => $request->row_reagent_name[$i],
                    'borrowed_from'     => $rowBorrowed[$i] ?? null,
                    'lot_number'        => $rowLot[$i] ?? null,
                    'date_manufactured' => $rowManufactured[$i] ?: null,
                    'expiration_date'   => $rowExpiry[$i] ?: null,
                    'quantity_unit'     => $rowQtyUnit[$i] ?? null,
                    'lims_ticket'       => $rowLims[$i] ?? null,
                    'reported_by'       => $reportedBy,
                    'reported_sign'     => $reportedSign,
                    'reported_date'     => $reportedDate ?: null,
                    'approved_by'       => $approvedBy,
                    'approved_sign'     => $approvedSign,
                    'approved_date'     => $approvedDate ?: null,
                ];

                $rowId = $rowIds[$i] ?? null;

                if ($rowId) {
                    BorrowingTracking::where('id', $rowId)->update($data);
                    $savedIds[] = $rowId;
                } else {
                    $newRecord = BorrowingTracking::create($data);
                    $savedIds[] = $newRecord->id;
                }
            }
        }

        if ($isAjax) {
            $savedRecords = BorrowingTracking::whereIn('id', $savedIds)
                ->orderBy('id', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Borrowing Tracking saved successfully',
                'data'    => $savedRecords,
            ]);
        }

        return back()->with('success', 'Borrowing Tracking saved successfully');
    }

    /**
     * LOAD Borrowing Tracking data (AJAX)
     */
    public function loadBorrowingTracking(Request $request)
    {
        if (!$request->filled('month') || !$request->filled('year')) {
            return response()->json(['data' => []]);
        }

        $records = BorrowingTracking::where('tracking_month', $request->month)
            ->where('tracking_year', $request->year)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json(['data' => $records]);
    }

    /**
     * =============================================
     * FOM-010 – Recall Tracking Form
     * Single record per product_name
     * =============================================
     */
    protected function storeRecallTracking(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();
        $formId = $request->input('recall_form_id');

        $data = $request->only([
            'product_category', 'product_name', 'manufacturer', 'supplier',
            'lot_number', 'batch_number', 'date_of_manufacture', 'expiry_date',
            'quantity_on_hand', 'additional_notes', 'disposal_details',
            'store_manager', 'designation', 'store_date', 'store_signature',
        ]);

        // JSON arrays
        $data['reason']  = $request->input('reason', []);
        $data['disposal'] = $request->input('disposal', []);

        // Build locations array from row inputs
        $locations = [];
        $depts = $request->input('loc_department', []);
        $qtys  = $request->input('loc_quantity', []);
        $acts  = $request->input('loc_action', []);
        $sigs  = $request->input('loc_signature', []);

        for ($i = 0; $i < count($depts); $i++) {
            if (empty($depts[$i]) && empty($qtys[$i])) continue;
            $locations[] = [
                'department' => $depts[$i] ?? null,
                'quantity'   => $qtys[$i] ?? null,
                'action'     => $acts[$i] ?? null,
                'signature'  => $sigs[$i] ?? null,
            ];
        }
        $data['locations'] = $locations;

        if ($formId) {
            $form = RecallTracking::findOrFail($formId);
            $form->update($data);
        } else {
            $form = RecallTracking::create($data);
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Recall Tracking Form saved successfully',
                'form_id' => $form->id,
            ]);
        }

        return back()->with('success', 'Recall Tracking Form saved successfully');
    }

    /**
     * LOAD Recall Tracking data (AJAX)
     */
    public function loadRecallTracking(Request $request)
    {
        if (!$request->filled('product_name')) {
            return response()->json(['data' => null]);
        }

        $form = RecallTracking::where('product_name', $request->product_name)
            ->latest()
            ->first();

        return response()->json(['data' => $form]);
    }
}
