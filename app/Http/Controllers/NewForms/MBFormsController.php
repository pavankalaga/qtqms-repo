<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MbWorkRegister;
use App\Models\MasterMixPreparationRegister;
use App\Models\NucleicAcidExtractionRegister;

class MBFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/MB/REG-001
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null;

        switch ($formCode) {
            case 'REG-001':
                return $this->storeMbWorkRegister($request);

            case 'REG-002':
                return $this->storeMasterMixPreparation($request);

            case 'REG-003':
                return $this->storeNucleicAcidExtraction($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * REG-001 – Molecular Biology Work Register
     * Row-based: From/To date filter on row_date
     * =============================================
     */
    private function storeMbWorkRegister(Request $request)
    {
        $rowIds                   = $request->input('row_id', []);
        $rowDates                 = $request->input('row_date', []);
        $barcodes                 = $request->input('barcode', []);
        $patientNames             = $request->input('patient_name', []);
        $ageGenders               = $request->input('age_gender', []);
        $investigations           = $request->input('investigation', []);
        $sampleTypes              = $request->input('sample_type', []);
        $sampleReceivedDatetimes  = $request->input('sample_received_datetime', []);
        $sampleReceivedBys        = $request->input('sample_received_by', []);
        $sampleProcessingDatetimes = $request->input('sample_processing_datetime', []);
        $sampleProcessedBys       = $request->input('sample_processed_by', []);
        $observationsList         = $request->input('observations', []);
        $hodSignatures            = $request->input('hod_signature', []);

        $savedIds = [];
        $count    = count($barcodes);

        for ($i = 0; $i < $count; $i++) {
            $barcode = trim($barcodes[$i] ?? '');
            $pName   = trim($patientNames[$i] ?? '');
            $inv     = trim($investigations[$i] ?? '');
            if ($barcode === '' && $pName === '' && $inv === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'                     => $request->doc_no,
                'row_date'                   => $rowDate,
                'barcode'                    => $barcode,
                'patient_name'               => $pName,
                'age_gender'                 => trim($ageGenders[$i] ?? ''),
                'investigation'              => $inv,
                'sample_type'                => trim($sampleTypes[$i] ?? ''),
                'sample_received_datetime'   => trim($sampleReceivedDatetimes[$i] ?? ''),
                'sample_received_by'         => trim($sampleReceivedBys[$i] ?? ''),
                'sample_processing_datetime' => trim($sampleProcessingDatetimes[$i] ?? ''),
                'sample_processed_by'        => trim($sampleProcessedBys[$i] ?? ''),
                'observations'               => trim($observationsList[$i] ?? ''),
                'hod_signature'              => trim($hodSignatures[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                MbWorkRegister::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = MbWorkRegister::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Molecular Biology Work Register saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => MbWorkRegister::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD Molecular Biology Work Register data (AJAX)
     */
    public function loadMbWorkRegister(Request $request)
    {
        $query = MbWorkRegister::query();

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
     * REG-002 – Master Mix Preparation Register
     * Row-based: From/To date filter on row_date
     * =============================================
     */
    private function storeMasterMixPreparation(Request $request)
    {
        $rowIds               = $request->input('row_id', []);
        $rowDates             = $request->input('row_date', []);
        $rowTimes             = $request->input('row_time', []);
        $kitNameLotNos        = $request->input('kit_name_lot_no', []);
        $batchNumbers         = $request->input('batch_number', []);
        $noOfReactions        = $request->input('no_of_reactions', []);
        $reagentNameComponents = $request->input('reagent_name_components', []);
        $totalReactionVolumes = $request->input('total_reaction_volume', []);
        $preparedBys          = $request->input('prepared_by', []);
        $remarksList          = $request->input('remarks', []);

        $savedIds = [];
        $count    = count($kitNameLotNos);

        for ($i = 0; $i < $count; $i++) {
            $kit     = trim($kitNameLotNos[$i] ?? '');
            $batch   = trim($batchNumbers[$i] ?? '');
            $reagent = trim($reagentNameComponents[$i] ?? '');
            if ($kit === '' && $batch === '' && $reagent === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'                   => $request->doc_no,
                'row_date'                 => $rowDate,
                'row_time'                 => trim($rowTimes[$i] ?? ''),
                'kit_name_lot_no'          => $kit,
                'batch_number'             => $batch,
                'no_of_reactions'          => trim($noOfReactions[$i] ?? ''),
                'reagent_name_components'  => $reagent,
                'total_reaction_volume'    => trim($totalReactionVolumes[$i] ?? ''),
                'prepared_by'              => trim($preparedBys[$i] ?? ''),
                'remarks'                  => trim($remarksList[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                MasterMixPreparationRegister::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = MasterMixPreparationRegister::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Master Mix Preparation Register saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => MasterMixPreparationRegister::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD Master Mix Preparation Register data (AJAX)
     */
    public function loadMasterMixPreparation(Request $request)
    {
        $query = MasterMixPreparationRegister::query();

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
     * REG-003 – Nucleic Acid Extraction Register
     * Row-based: From/To date filter on row_date
     * =============================================
     */
    private function storeNucleicAcidExtraction(Request $request)
    {
        $rowIds              = $request->input('row_id', []);
        $rowDates            = $request->input('row_date', []);
        $timesOfReceipt      = $request->input('time_of_sample_receipt', []);
        $kitLotNos           = $request->input('extraction_kit_lot_no', []);
        $totalSamples        = $request->input('total_number_of_samples', []);
        $sampleBarcodes      = $request->input('sample_barcode', []);
        $performedBys        = $request->input('performed_by', []);
        $verifiedBys         = $request->input('verified_by', []);
        $remarksList         = $request->input('remarks', []);

        $savedIds = [];
        $count    = count($sampleBarcodes);

        for ($i = 0; $i < $count; $i++) {
            $kitLot  = trim($kitLotNos[$i] ?? '');
            $barcode = trim($sampleBarcodes[$i] ?? '');
            $perf    = trim($performedBys[$i] ?? '');
            if ($kitLot === '' && $barcode === '' && $perf === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'                  => $request->doc_no,
                'row_date'                => $rowDate,
                'time_of_sample_receipt'  => trim($timesOfReceipt[$i] ?? ''),
                'extraction_kit_lot_no'   => $kitLot,
                'total_number_of_samples' => trim($totalSamples[$i] ?? ''),
                'sample_barcode'          => $barcode,
                'performed_by'            => $perf,
                'verified_by'             => trim($verifiedBys[$i] ?? ''),
                'remarks'                 => trim($remarksList[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                NucleicAcidExtractionRegister::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = NucleicAcidExtractionRegister::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Nucleic Acid Extraction Register saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => NucleicAcidExtractionRegister::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD Nucleic Acid Extraction Register data (AJAX)
     */
    public function loadNucleicAcidExtraction(Request $request)
    {
        $query = NucleicAcidExtractionRegister::query();

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
