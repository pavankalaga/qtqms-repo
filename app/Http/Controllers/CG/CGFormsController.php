<?php

namespace App\Http\Controllers\CG;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CgCytogeneticsTrf;
use App\Models\CgCytogeneticsConsent;

class CGFormsController extends Controller
{
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // TDPL/CG/FOM-001 → FOM-001
        $formCode = last(explode('/', $docNo));
        switch ($formCode) {

            case 'FOM-001':
                return $this->storeCytogeneticsTrf($request);

            case 'FOM-002':
                return $this->storeCytogeneticsConsent($request);

            default:
                return back()->with('error', 'Unknown CG form');
        }
    }

    public function storeCytogeneticsTrf(Request $request)
    {

        // 🔑 Inline edit support
        $formId = $request->cg_form_id;   // ✅ THIS WAS MISSING

        $data = $request->only([
            'patient_name',
            'patient_age',
            'patient_gender',
            'patient_address',

            'physician_address',
            'physician_phone',
            'hospital_lab',
            'collection_date',
            'collection_time',
            'specimen_type',

            'sample_received_at',
            'sample_condition',

            'study_requests',
            'study_other_details',

            'prenatal_studies',
            'prenatal_ultrasound_details',
            'prenatal_other_details',

            'pediatric_studies',
            'pediatric_cardiac_details',
            'pediatric_anomalies_details',

            'adult_studies',
            'familial_translocation_details',
            'previous_child_details',
            'adult_other_details',

            'suspected_chromosome',
            'study_indication',
            'additional_conditions',
            'suspected_trisomy',

            'major_birth_defect',
            'multiple_anomalies',
            'parental_followup',
            'other_notes',

            'oncology_diagnosis',
            'new_diagnosis',
            'wbc',
            'blasts_percentage',
            'repeat_study',
            'bone_marrow_transplant',
            'donor_sex',
            'previous_therapy',

            'sample_types',
            'study_categories',
        ]);

        // 🔹 Normalize checkbox arrays
        $jsonFields = [
            'study_requests',
            'prenatal_studies',
            'pediatric_studies',
            'adult_studies',
            'additional_conditions',
            'sample_types',
            'study_categories',
        ];

        foreach ($jsonFields as $field) {
            $data[$field] = $request->has($field)
                ? array_values((array) $request->input($field))
                : [];
        }

        // 🔁 CREATE or UPDATE
        if ($formId) {
            $form = CgCytogeneticsTrf::findOrFail($formId);
            $form->update($data);
        } else {
            $form = CgCytogeneticsTrf::create($data);
        }

        return back()->with([
            'success' => 'Cytogenetics Test Request Form saved successfully',
            'cg_form_id' => $form->id,
        ]);
    }

    public function storeCytogeneticsConsent(Request $request)
    {
        // 🔑 Inline edit support
        $formId = $request->cg_consent_id;

        $data = $request->only([
            'patient_signature',
            'patient_full_name',
            'patient_date',
            'patient_time',

            'obtainer_signature',
            'obtainer_full_name',
            'obtainer_date',
            'obtainer_time',
        ]);

        // 🔹 Normalize checkboxes
        $data['consent_karyotype'] = $request->has('consent_karyotype');
        $data['consent_fish']      = $request->has('consent_fish');

        // 🔁 CREATE or UPDATE
        if ($formId) {
            $form = CgCytogeneticsConsent::findOrFail($formId);
            $form->update($data);
        } else {
            $form = CgCytogeneticsConsent::create($data);
        }

        return back()->with([
            'success' => 'Cytogenetics Consent Form saved successfully',
            'cg_consent_id' => $form->id,
        ]);
    }
}
