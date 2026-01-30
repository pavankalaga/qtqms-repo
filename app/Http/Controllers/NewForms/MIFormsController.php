<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HivConsentForm;
use App\Models\StainQcAfbGramForm;
use App\Models\BiochemicalMediaQcForm;
use App\Models\AtccStrainQcForm;

class MIFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/MI/FOM-001
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null;

        switch ($formCode) {
            case 'FOM-001':
                return $this->storeHivConsent($request);

            case 'FOM-002':
            case 'FOM-002(A)':
            case 'FOM-002(B)':
            case 'FOM-002(C)':
                return $this->storeStainQcAfbGram($request);

            case 'FOM-003':
            case 'FOM-003(A)':
            case 'FOM-003(B)':
            case 'FOM-003(C)':
            case 'FOM-003(D)':
            case 'FOM-003(E)':
            case 'FOM-003(F)':
            case 'FOM-003(G)':
                return $this->storeBiochemicalMediaQc($request);

            case 'FOM-004':
            case 'FOM-004(A)':
            case 'FOM-004(B)':
            case 'FOM-004(C)':
            case 'FOM-004(D)':
            case 'FOM-004(E)':
            case 'FOM-004(F)':
            case 'FOM-004(G)':
                return $this->storeAtccStrainQc($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * FOM-001 – HIV Consent-Counselling Form (Trilingual)
     * Single record per patient, filter by mobile
     * =============================================
     */
    private function storeHivConsent(Request $request)
    {
        $payload = [
            'doc_no' => $request->doc_no,

            // ---- English ----
            'patient_name'      => $request->input('name', ''),
            'age'               => $request->input('age', ''),
            'sex'               => $request->input('sex', ''),
            'form_date'         => $request->input('date') ?: null,
            'address'           => $request->input('address', ''),
            'mobile'            => $request->input('mobile', ''),
            'lab_id'            => $request->input('lab_id', ''),
            'consent_given'     => $request->has('consent_given') ? 1 : 0,
            'doctor_name'       => $request->input('doctor_name', ''),
            'doctor_address'    => $request->input('doctor_address', ''),
            'doctor_contact'    => $request->input('doctor_contact', ''),
            'patient_signature' => $request->input('patient_signature', ''),
            'signature_date'    => $request->input('signature_date') ?: null,

            // ---- Hindi ----
            'patient_name_hi'      => $request->input('name_hi', ''),
            'age_hi'               => $request->input('age_hi', ''),
            'sex_hi'               => $request->input('sex_hi', ''),
            'form_date_hi'         => $request->input('date_hi') ?: null,
            'address_hi'           => $request->input('address_hi', ''),
            'mobile_hi'            => $request->input('mobile_hi', ''),
            'lab_id_hi'            => $request->input('lab_id_hi', ''),
            'consent_given_hi'     => $request->has('consent_given_hi') ? 1 : 0,
            'doctor_name_hi'       => $request->input('doctor_name_hi', ''),
            'doctor_address_hi'    => $request->input('doctor_address_hi', ''),
            'doctor_contact_hi'    => $request->input('doctor_contact_hi', ''),
            'patient_signature_hi' => $request->input('patient_signature_hi', ''),
            'signature_date_hi'    => $request->input('signature_date_hi') ?: null,

            // ---- Telugu ----
            'patient_name_te'      => $request->input('name_te', ''),
            'age_te'               => $request->input('age_te', ''),
            'sex_te'               => $request->input('sex_te', ''),
            'form_date_te'         => $request->input('date_te') ?: null,
            'address_te'           => $request->input('address_te', ''),
            'mobile_te'            => $request->input('mobile_te', ''),
            'lab_id_te'            => $request->input('lab_id_te', ''),
            'consent_given_te'     => $request->has('consent_given_te') ? 1 : 0,
            'doctor_name_te'       => $request->input('doctor_name_te', ''),
            'doctor_address_te'    => $request->input('doctor_address_te', ''),
            'doctor_contact_te'    => $request->input('doctor_contact_te', ''),
            'patient_signature_te' => $request->input('patient_signature_te', ''),
            'signature_date_te'    => $request->input('signature_date_te') ?: null,
        ];

        $existingId = $request->input('record_id');

        if ($existingId) {
            HivConsentForm::where('id', $existingId)->update(
                array_merge($payload, ['updated_by' => auth()->id()])
            );
            $record = HivConsentForm::find($existingId);
        } else {
            $record = HivConsentForm::create(
                array_merge($payload, ['created_by' => auth()->id()])
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'HIV Consent-Counselling Form saved successfully.',
            'data'    => $record,
        ]);
    }

    /**
     * LOAD HIV Consent Form data by patient mobile (AJAX)
     */
    public function loadHivConsent(Request $request)
    {
        $record = null;

        if ($request->filled('mobile')) {
            $mobile = $request->mobile;
            $record = HivConsentForm::where('mobile', $mobile)
                ->orWhere('mobile_hi', $mobile)
                ->orWhere('mobile_te', $mobile)
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
     * FOM-002 – Stain Quality Control Form (AFB Gram Stain)
     * Row-based: From/To date filter on row_date
     * =============================================
     */
    private function storeStainQcAfbGram(Request $request)
    {
        $rowIds             = $request->input('row_id', []);
        $rowDates           = $request->input('row_date', []);
        $manufacturers      = $request->input('manufacturer', []);
        $lotNos             = $request->input('lot_no', []);
        $expiryDates        = $request->input('expiry_date', []);
        $atccs              = $request->input('atcc', []);
        $resultExpecteds    = $request->input('result_expected', []);
        $resultObtaineds    = $request->input('result_obtained', []);
        $doneBys            = $request->input('done_by', []);
        $correctiveActions  = $request->input('corrective_action', []);
        $remarksList        = $request->input('remarks', []);

        $savedIds = [];
        $count    = count($manufacturers);

        for ($i = 0; $i < $count; $i++) {
            $mfr    = trim($manufacturers[$i] ?? '');
            $lot    = trim($lotNos[$i] ?? '');
            $doneBy = trim($doneBys[$i] ?? '');
            if ($mfr === '' && $lot === '' && $doneBy === '') {
                continue;
            }

            $rowDate    = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;
            $expiryDate = ($expiryDates[$i] ?? '') !== '' ? $expiryDates[$i] : null;

            $payload = [
                'doc_no'            => $request->doc_no,
                'row_date'          => $rowDate,
                'manufacturer'      => $mfr,
                'lot_no'            => $lot,
                'expiry_date'       => $expiryDate,
                'atcc'              => trim($atccs[$i] ?? ''),
                'result_expected'   => trim($resultExpecteds[$i] ?? ''),
                'result_obtained'   => trim($resultObtaineds[$i] ?? ''),
                'done_by'           => $doneBy,
                'corrective_action' => trim($correctiveActions[$i] ?? ''),
                'remarks'           => trim($remarksList[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                StainQcAfbGramForm::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = StainQcAfbGramForm::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Stain Quality Control Form (AFB Gram Stain) saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => StainQcAfbGramForm::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD Stain QC AFB Gram data (AJAX)
     */
    public function loadStainQcAfbGram(Request $request)
    {
        $query = StainQcAfbGramForm::query();

        if ($request->filled('doc_no')) {
            $query->where('doc_no', $request->doc_no);
        }
        if ($request->filled('from_date')) {
            $query->where('row_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->where('row_date', '<=', $request->to_date);
        }

        $rows = $query->orderBy('id')->get();

        return response()->json([
            'success' => $rows->isNotEmpty(),
            'data'    => $rows,
        ]);
    }

    /**
     * =============================================
     * FOM-003 – Biochemical Media QC Form
     * Row-based: From/To date filter on row_date
     * Shared table for FOM-003, FOM-003(A)–(G)
     * =============================================
     */
    private function storeBiochemicalMediaQc(Request $request)
    {
        $rowIds           = $request->input('row_id', []);
        $rowDates         = $request->input('row_date', []);
        $productInfos     = $request->input('product_info', []);
        $analysisDoneBys  = $request->input('analysis_done_by', []);
        $appearances      = $request->input('appearance', []);
        $incubations      = $request->input('incubation', []);
        $atccs            = $request->input('atcc', []);
        $growthExpecteds  = $request->input('growth_expected', []);
        $growthObserveds  = $request->input('growth_observed', []);
        $correctiveActions = $request->input('corrective_action', []);
        $signatures       = $request->input('signature', []);

        $savedIds = [];
        $count    = count($productInfos);

        for ($i = 0; $i < $count; $i++) {
            $prod = trim($productInfos[$i] ?? '');
            $atcc = trim($atccs[$i] ?? '');
            $sig  = trim($signatures[$i] ?? '');
            if ($prod === '' && $atcc === '' && $sig === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'            => $request->doc_no,
                'row_date'          => $rowDate,
                'product_info'      => $prod,
                'analysis_done_by'  => trim($analysisDoneBys[$i] ?? ''),
                'appearance'        => trim($appearances[$i] ?? ''),
                'incubation'        => trim($incubations[$i] ?? ''),
                'atcc'              => $atcc,
                'growth_expected'   => trim($growthExpecteds[$i] ?? ''),
                'growth_observed'   => trim($growthObserveds[$i] ?? ''),
                'corrective_action' => trim($correctiveActions[$i] ?? ''),
                'signature'         => $sig,
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                BiochemicalMediaQcForm::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = BiochemicalMediaQcForm::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Biochemical Media QC Form saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => BiochemicalMediaQcForm::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD Biochemical Media QC data (AJAX)
     */
    public function loadBiochemicalMediaQc(Request $request)
    {
        $query = BiochemicalMediaQcForm::query();

        if ($request->filled('doc_no')) {
            $query->where('doc_no', $request->doc_no);
        }
        if ($request->filled('from_date')) {
            $query->where('row_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->where('row_date', '<=', $request->to_date);
        }

        $rows = $query->orderBy('id')->get();

        return response()->json([
            'success' => $rows->isNotEmpty(),
            'data'    => $rows,
        ]);
    }

    /**
     * =============================================
     * FOM-004 – ATCC Strain Quality Control Form
     * Row-based: From/To date filter on row_date
     * Shared table for FOM-004, FOM-004(A)–(G)
     * =============================================
     */
    private function storeAtccStrainQc(Request $request)
    {
        $rowIds           = $request->input('row_id', []);
        $rowDates         = $request->input('row_date', []);
        $atccInfos        = $request->input('atcc_info', []);
        $characteristics  = $request->input('characteristics', []);
        $antibioticNames  = $request->input('antibiotic_name', []);
        $expectedZones    = $request->input('expected_zone', []);
        $obtainedZones    = $request->input('obtained_zone', []);
        $doneBys          = $request->input('done_by', []);
        $capas            = $request->input('capa', []);
        $approvedBys      = $request->input('approved_by', []);

        $savedIds = [];
        $count    = count($atccInfos);

        for ($i = 0; $i < $count; $i++) {
            $atcc   = trim($atccInfos[$i] ?? '');
            $doneBy = trim($doneBys[$i] ?? '');
            $chars  = trim($characteristics[$i] ?? '');
            if ($atcc === '' && $doneBy === '' && $chars === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'          => $request->doc_no,
                'row_date'        => $rowDate,
                'atcc_info'       => $atcc,
                'characteristics' => $chars,
                'antibiotic_name' => trim($antibioticNames[$i] ?? ''),
                'expected_zone'   => trim($expectedZones[$i] ?? ''),
                'obtained_zone'   => trim($obtainedZones[$i] ?? ''),
                'done_by'         => $doneBy,
                'capa'            => trim($capas[$i] ?? ''),
                'approved_by'     => trim($approvedBys[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                AtccStrainQcForm::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = AtccStrainQcForm::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'ATCC Strain Quality Control Form saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => AtccStrainQcForm::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD ATCC Strain QC data (AJAX)
     */
    public function loadAtccStrainQc(Request $request)
    {
        $query = AtccStrainQcForm::query();

        if ($request->filled('doc_no')) {
            $query->where('doc_no', $request->doc_no);
        }
        if ($request->filled('from_date')) {
            $query->where('row_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->where('row_date', '<=', $request->to_date);
        }

        $rows = $query->orderBy('id')->get();

        return response()->json([
            'success' => $rows->isNotEmpty(),
            'data'    => $rows,
        ]);
    }
}
