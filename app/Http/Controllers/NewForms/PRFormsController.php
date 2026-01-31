<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChemicalWasteDisposalForm;
use App\Models\NewSupplierVerificationForm;
use App\Models\SupplierEvaluationForm;
use App\Models\ApprovedProductProvider;
use App\Models\AnnualSupplierEvaluationForm;

class PRFormsController extends Controller
{
    public function store(Request $request)
    {
        $docNo = $request->doc_no;
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeNewSupplier($request);
            case 'FOM-002':
                return $this->storeChemicalWaste($request);
            case 'FOM-003':
                return $this->storeSupplierEvaluation($request);
            case 'FOM-005':
                return $this->storeApprovedProductProviders($request);
            case 'FOM-011':
                return $this->storeAnnualSupplierEvaluation($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * FOM-002 – Chemical Waste Disposal Form
     * Single record per month_year + location
     * =============================================
     */
    protected function storeChemicalWaste(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $request->validate([
            'month_year' => 'required',
        ]);

        $payload = [
            'month_year' => $request->month_year,
            'location'   => $request->location,
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        // 10 item rows
        for ($i = 1; $i <= 10; $i++) {
            $payload["item_{$i}"]        = $request->input("item_{$i}");
            $payload["description_{$i}"] = $request->input("description_{$i}");
            $payload["unit_pack_{$i}"]   = $request->input("unit_pack_{$i}");
            $payload["reason_{$i}"]      = $request->input("reason_{$i}");
            $payload["method_{$i}"]      = $request->input("method_{$i}");
            $payload["qty_{$i}"]         = $request->input("qty_{$i}");
            $payload["unit_cost_{$i}"]   = $request->input("unit_cost_{$i}");
            $payload["total_value_{$i}"] = $request->input("total_value_{$i}");
            $payload["remarks_{$i}"]     = $request->input("remarks_{$i}");
        }

        $payload['overall_total'] = $request->input('overall_total');

        // Signature rows
        $payload['store_incharge']      = $request->input('store_incharge');
        $payload['store_incharge_sign'] = $request->input('store_incharge_sign');
        $payload['store_incharge_date'] = $request->input('store_incharge_date');
        $payload['head_facility']       = $request->input('head_facility');
        $payload['head_facility_sign']  = $request->input('head_facility_sign');
        $payload['head_facility_date']  = $request->input('head_facility_date');
        $payload['disposing_staff']     = $request->input('disposing_staff');
        $payload['disposing_staff_sign'] = $request->input('disposing_staff_sign');
        $payload['disposing_staff_date'] = $request->input('disposing_staff_date');

        if ($request->filled('form_id')) {
            ChemicalWasteDisposalForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = ChemicalWasteDisposalForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Chemical Waste Disposal Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Chemical Waste Disposal Form saved successfully');
    }

    /**
     * LOAD Chemical Waste Disposal Form data (AJAX)
     */
    public function loadChemicalWaste(Request $request)
    {
        $query = ChemicalWasteDisposalForm::query();

        if ($request->filled('month_year')) {
            $query->where('month_year', $request->month_year);
        }
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $form = $query->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-001 – New Supplier Verification Form
     * Single record per supplier_name
     * =============================================
     */
    protected function storeNewSupplier(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        // Basic fields
        $basics = ['supplier_name', 'location', 'verification_date', 'inspector_name'];
        foreach ($basics as $f) {
            $payload[$f] = $request->input($f);
        }

        // 5 sections × 3 questions radio + notes
        for ($s = 1; $s <= 5; $s++) {
            for ($q = 1; $q <= 3; $q++) {
                $payload["sec{$s}_q{$q}"] = $request->input("sec{$s}_q{$q}");
            }
            $payload["sec{$s}_notes"] = $request->input("sec{$s}_notes");
        }

        // Additional notes
        $payload['additional_notes'] = $request->input('additional_notes');

        // Inspector signature
        $payload['inspector_signature_name'] = $request->input('inspector_signature_name');
        $payload['inspector_signature']      = $request->input('inspector_signature');
        $payload['inspector_signature_date'] = $request->input('inspector_signature_date');

        // Approval
        $payload['risk_level']      = $request->input('risk_level');
        $payload['approval_status'] = $request->input('approval_status');

        // Approved by
        $payload['approved_by_name']      = $request->input('approved_by_name');
        $payload['approved_by_signature'] = $request->input('approved_by_signature');
        $payload['approved_by_date']      = $request->input('approved_by_date');

        if ($request->filled('form_id')) {
            NewSupplierVerificationForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = NewSupplierVerificationForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'New Supplier Verification Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'New Supplier Verification Form saved successfully');
    }

    /**
     * LOAD New Supplier Verification Form data (AJAX)
     */
    public function loadNewSupplier(Request $request)
    {
        $query = NewSupplierVerificationForm::query();

        if ($request->filled('supplier_name')) {
            $query->where('supplier_name', $request->supplier_name);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-003 – Supplier Evaluation Form
     * Single record per supplier_name
     * =============================================
     */
    protected function storeSupplierEvaluation(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        // Header fields
        $headers = ['supplier_name', 'agreement_reference', 'contract_description',
                     'time_period', 'evaluator_name', 'evaluation_date'];
        foreach ($headers as $f) {
            $payload[$f] = $request->input($f);
        }

        // 5 categories: items per cat = [4, 2, 1, 1, 2]
        $itemsPerCat = [4, 2, 1, 1, 2];
        foreach ($itemsPerCat as $idx => $count) {
            $c = $idx + 1;
            for ($q = 1; $q <= $count; $q++) {
                $payload["cat{$c}_score_{$q}"]  = $request->input("cat{$c}_score_{$q}");
                $payload["cat{$c}_action_{$q}"] = $request->input("cat{$c}_action_{$q}");
            }
            $payload["cat{$c}_total"] = $request->input("cat{$c}_total");
        }

        // Footer
        $payload['final_total_score']          = $request->input('final_total_score');
        $payload['purchase_manager_signature'] = $request->input('purchase_manager_signature');
        $payload['overall_comments']           = $request->input('overall_comments');

        if ($request->filled('form_id')) {
            SupplierEvaluationForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = SupplierEvaluationForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Supplier Evaluation Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Supplier Evaluation Form saved successfully');
    }

    /**
     * LOAD Supplier Evaluation Form data (AJAX)
     */
    public function loadSupplierEvaluation(Request $request)
    {
        $query = SupplierEvaluationForm::query();

        if ($request->filled('supplier_name')) {
            $query->where('supplier_name', $request->supplier_name);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-005 – List of Approved External Product Providers
     * Single record, all input values stored as JSON
     * =============================================
     */
    protected function storeApprovedProductProviders(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
            'form_data'  => $request->input('form_data'),
        ];

        if ($request->filled('form_id')) {
            ApprovedProductProvider::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = ApprovedProductProvider::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Approved Product Providers saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Approved Product Providers saved successfully');
    }

    /**
     * LOAD Approved Product Providers data (AJAX)
     */
    public function loadApprovedProductProviders(Request $request)
    {
        $form = ApprovedProductProvider::latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }

    /**
     * =============================================
     * FOM-011 – Annual Supplier Evaluation Form
     * Single record per supplier_name
     * =============================================
     */
    protected function storeAnnualSupplierEvaluation(Request $request)
    {
        $isAjax = $request->ajax() || $request->wantsJson();

        $payload = [
            'doc_no'     => $request->doc_no,
            'issue_no'   => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        // Header fields
        $headers = ['supplier_name', 'agreement_reference', 'contract_description',
                     'time_period', 'evaluator_name', 'evaluation_date'];
        foreach ($headers as $f) {
            $payload[$f] = $request->input($f);
        }

        // 5 categories: items per cat = [4, 2, 1, 1, 2]
        $itemsPerCat = [4, 2, 1, 1, 2];
        foreach ($itemsPerCat as $idx => $count) {
            $c = $idx + 1;
            for ($q = 1; $q <= $count; $q++) {
                $payload["cat{$c}_score_{$q}"]  = $request->input("cat{$c}_score_{$q}");
                $payload["cat{$c}_action_{$q}"] = $request->input("cat{$c}_action_{$q}");
            }
            $payload["cat{$c}_total"] = $request->input("cat{$c}_total");
        }

        // Grand total + comments + approval
        $payload['grand_total']          = $request->input('grand_total');
        $payload['overall_comments']     = $request->input('overall_comments');
        $payload['approval_status']      = $request->input('approval_status');
        $payload['conditions']           = $request->input('conditions');
        $payload['approved_by']          = $request->input('approved_by');
        $payload['approved_date']        = $request->input('approved_date');
        $payload['next_evaluation_date'] = $request->input('next_evaluation_date');

        if ($request->filled('form_id')) {
            AnnualSupplierEvaluationForm::where('id', $request->form_id)->update($payload);
            $formId = $request->form_id;
        } else {
            $form = AnnualSupplierEvaluationForm::create($payload);
            $formId = $form->id;
        }

        if ($isAjax) {
            return response()->json([
                'success' => true,
                'message' => 'Annual Supplier Evaluation Form saved successfully',
                'form_id' => $formId,
            ]);
        }

        return back()->with('success', 'Annual Supplier Evaluation Form saved successfully');
    }

    /**
     * LOAD Annual Supplier Evaluation Form data (AJAX)
     */
    public function loadAnnualSupplierEvaluation(Request $request)
    {
        $query = AnnualSupplierEvaluationForm::query();

        if ($request->filled('supplier_name')) {
            $query->where('supplier_name', $request->supplier_name);
        }

        $form = $query->latest()->first();

        return response()->json([
            'data' => $form,
        ]);
    }
}
