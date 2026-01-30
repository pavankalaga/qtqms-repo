<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPatientFeedback;
use App\Models\CytopathologyRequisitionForm;
use App\Models\FnacConsentForm;

class CY_CSFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/CS/FOM-001 or TDPL/CY/FOM-002
        $parts = explode('/', $docNo);

        $department = $parts[1] ?? null; // CS / CY
        $formCode   = $parts[2] ?? null; // FOM-001 / FOM-002

        switch ($department . '_' . $formCode) {

            // ======================
            // CS FORMS
            // ======================
            case 'CS_FOM-001':
                return $this->storeCustomerPatientFeedback($request);

                // ======================
                // CY FORMS
                // ======================
            case 'CY_FOM-001':
                return $this->storeCytopathologyRequisition($request);

            case 'CY_FOM-002':
                return $this->storeConsentForFnac($request); // ✅ single form

            default:
                return back()->with('error', 'Unknown CY / CS form');
        }
    }

    /**
     * CS : Customer / Patient Feedback
     * TDPL/CS/FOM-001
     * Supports INLINE EDIT + NORMAL SUBMIT
     */
    protected function storeCustomerPatientFeedback(Request $request)
    {
        /*
     |==================================================
     | BUILD PAYLOAD (ALL COLUMNS – NOTHING MISSED)
     |==================================================
     */
        $payload = [

            // BASIC DETAILS
            'name'        => $request->name,
            'barcode'     => $request->barcode,
            'date'        => $request->date,
            'address'     => $request->address,
            'contact_no'  => $request->contact_no,

            // RATINGS
            'rating_0' => $request->rating_0,
            'rating_1' => $request->rating_1,
            'rating_2' => $request->rating_2,
            'rating_3' => $request->rating_3,
            'rating_4' => $request->rating_4,
            'rating_5' => $request->rating_5,
            'rating_6' => $request->rating_6,
            'rating_7' => $request->rating_7,
            'rating_8' => $request->rating_8,

            // REMARKS
            'remarks_0' => $request->remarks_0,
            'remarks_1' => $request->remarks_1,
            'remarks_2' => $request->remarks_2,
            'remarks_3' => $request->remarks_3,
            'remarks_4' => $request->remarks_4,
            'remarks_5' => $request->remarks_5,
            'remarks_6' => $request->remarks_6,
            'remarks_7' => $request->remarks_7,
            'remarks_8' => $request->remarks_8,

            // ADDITIONAL FEEDBACK
            'additional_feedback' => $request->additional_feedback,

            // SIGNATURE
            'signature' => $request->signature,

            // OFFICE USE
            'communicated'          => $request->communicated,
            'complainant_id'        => $request->complainant_id,
            'complaint_date'        => $request->complaint_date,
            'complaint_description' => $request->complaint_description,
            'complaint_action'      => $request->complaint_action,
            'closure_date'          => $request->closure_date,

            // ACTION DETAILS
            'by'                => $request->by,
            'on'                => $request->on,
            'preventive_action' => $request->preventive_action,

            // APPROVAL
            'reviewed_by' => $request->reviewed_by,
            'approved_by' => $request->approved_by,
        ];

        /*
     |==================================================
     | INLINE EDIT OR NEW SUBMIT (SAME AS CP FORMS)
     |==================================================
     */
        if ($request->filled('customer_patient_feedback_id')) {

            // ✅ INLINE UPDATE
            CustomerPatientFeedback::where(
                'id',
                $request->customer_patient_feedback_id
            )->update($payload);
        } else {

            // ✅ NORMAL CREATE
            CustomerPatientFeedback::create($payload);
        }

        return back()->with(
            'success',
            'Customer / Patient Feedback saved successfully'
        );
    }


    /**
     * CY : Cytopathology Requisition
     * TDPL/CY/FOM-001
     */
    protected function storeCytopathologyRequisition(Request $request)
    {
        $payload = [
            'doc_no'            => $request->doc_no,
            'lab_no'            => $request->lab_no,
            'date'              => $request->date,
            'name'              => $request->name,
            'dob'               => $request->dob,
            'sex'               => $request->sex,
            'mobile'            => $request->mobile,
            'client_name'       => $request->client_name,
            'client_code'       => $request->client_code,
            'ref_doctor'        => $request->ref_doctor,
            'gynae'             => $request->gynae,
            'non_gynae'         => $request->non_gynae,
            'clinical_features' => $request->clinical_features,
            'sample_site'       => $request->sample_site,
            'history'           => $request->history,
            'nipple'            => $request->nipple,
            'lmp'               => $request->lmp,
            'fnac'              => $request->fnac,
            'misc'              => $request->misc,
            'details'           => $request->details,
        ];

        if ($request->filled('cytopathology_requisition_form_id')) {
            // UPDATE
            CytopathologyRequisitionForm::where('id', $request->cytopathology_requisition_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
        } else {
            // CREATE
            CytopathologyRequisitionForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        return back()->with('success', 'Cytopathology Requisition Form saved successfully');
    }

    /**
     * CY : Consent Form for FNAC (FOM-002)
     * TDPL/CY/FOM-002
     */
    protected function storeConsentForFnac(Request $request)
    {
        $payload = [
            'doc_no'            => $request->doc_no,
            'consent_name'      => $request->consent_name,
            'test_area'         => $request->test_area,
            'patient_name'      => $request->patient_name,
            'doctor_name'       => $request->doctor_name,
            'patient_signature' => $request->patient_signature,
            'doctor_signature'  => $request->doctor_signature,
            'date'              => $request->date,
        ];

        if ($request->filled('fnac_consent_form_id')) {
            // UPDATE
            FnacConsentForm::where('id', $request->fnac_consent_form_id)
                ->update(array_merge($payload, [
                    'updated_by' => auth()->id(),
                ]));
        } else {
            // CREATE
            FnacConsentForm::create(array_merge($payload, [
                'created_by' => auth()->id(),
            ]));
        }

        return back()->with('success', 'FNAC Consent Form saved successfully');
    }
}
