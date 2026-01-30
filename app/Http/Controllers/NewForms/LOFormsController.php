<?php

namespace App\Http\Controllers\NewForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CsrSampleTrackingSheet;
use App\Models\CsrSampleTrackingOutlier;

class LOFormsController extends Controller
{
    /**
     * MAIN STORE ROUTER
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Expected: TDPL/LO/FOM-005
        $parts = explode('/', $docNo);
        $formCode = $parts[2] ?? null;

        switch ($formCode) {
            case 'FOM-005':
                return $this->storeCsrSampleTrackingSheet($request);

            case 'FOM-006':
                return $this->storeCsrSampleTrackingOutliers($request);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Unknown form code: ' . $formCode,
                ], 400);
        }
    }

    /**
     * =============================================
     * FOM-005 – CSR Sample Tracking Sheet
     * Row-based: each table row = separate DB record
     * =============================================
     */
    private function storeCsrSampleTrackingSheet(Request $request)
    {
        // Header fields (shared across all rows)
        $csrName        = $request->csr_name;
        $route          = $request->route;
        $routeStartTime = $request->route_start_time;
        $startKm        = $request->start_km;
        $endKm          = $request->end_km;
        $totalKm        = $request->total_km;

        // Row arrays
        $rowIds         = $request->input('row_id', []);
        $clientNames    = $request->input('client_name', []);
        $clientCodes    = $request->input('client_code', []);
        $barcodes       = $request->input('barcode', []);
        $workOrders     = $request->input('work_order', []);
        $trfs           = $request->input('trf', []);
        $clinicalHists  = $request->input('clinical_history', []);
        $sampleVolumes  = $request->input('sample_volume', []);
        $tempPickups    = $request->input('temp_pickup', []);
        $tempDrops      = $request->input('temp_drop', []);
        $clientSigs     = $request->input('client_signature', []);
        $pickupTimes    = $request->input('pickup_time', []);

        $savedIds = [];
        $count    = count($clientNames);

        for ($i = 0; $i < $count; $i++) {
            // Skip completely empty rows
            $cName = trim($clientNames[$i] ?? '');
            $cCode = trim($clientCodes[$i] ?? '');
            $bcode = trim($barcodes[$i] ?? '');
            if ($cName === '' && $cCode === '' && $bcode === '') {
                continue;
            }

            $payload = [
                'doc_no'           => $request->doc_no,
                'csr_name'         => $csrName,
                'route'            => $route,
                'route_start_time' => $routeStartTime,
                'start_km'         => $startKm,
                'end_km'           => $endKm,
                'total_km'         => $totalKm,
                'client_name'      => $cName,
                'client_code'      => $cCode,
                'barcode'          => $bcode,
                'work_order'       => trim($workOrders[$i] ?? ''),
                'trf'              => trim($trfs[$i] ?? ''),
                'clinical_history' => trim($clinicalHists[$i] ?? ''),
                'sample_volume'    => trim($sampleVolumes[$i] ?? ''),
                'temp_pickup'      => trim($tempPickups[$i] ?? ''),
                'temp_drop'        => trim($tempDrops[$i] ?? ''),
                'client_signature' => trim($clientSigs[$i] ?? ''),
                'pickup_time'      => trim($pickupTimes[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                CsrSampleTrackingSheet::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = CsrSampleTrackingSheet::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'CSR Sample Tracking Sheet saved successfully.',
            'saved_ids' => $savedIds,
        ]);
    }

    /**
     * LOAD CSR Sample Tracking Sheet data (AJAX)
     */
    public function loadCsrSampleTrackingSheet(Request $request)
    {
        $query = CsrSampleTrackingSheet::query();

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $rows = $query->orderBy('id')->get();

        return response()->json([
            'success' => $rows->isNotEmpty(),
            'data'    => $rows,
        ]);
    }

    /**
     * =============================================
     * FOM-006 – CSR Sample Tracking - Outliers
     * Row-based: From/To date filter on row_date
     * =============================================
     */
    private function storeCsrSampleTrackingOutliers(Request $request)
    {
        $rowIds        = $request->input('row_id', []);
        $rowDates      = $request->input('row_date', []);
        $clientNames   = $request->input('client_name', []);
        $clientCodes   = $request->input('client_code', []);
        $barcodes      = $request->input('barcode', []);
        $workOrders    = $request->input('work_order', []);
        $trfs          = $request->input('trf', []);
        $clinicalHists = $request->input('clinical_history', []);
        $sampleVolumes = $request->input('sample_volume', []);
        $tempPickups   = $request->input('temp_pickup', []);
        $tempDrops     = $request->input('temp_drop', []);
        $observations  = $request->input('observations', []);
        $accSigs       = $request->input('accession_signature', []);

        $savedIds = [];
        $count    = count($clientNames);

        for ($i = 0; $i < $count; $i++) {
            $cName = trim($clientNames[$i] ?? '');
            $cCode = trim($clientCodes[$i] ?? '');
            $bcode = trim($barcodes[$i] ?? '');
            if ($cName === '' && $cCode === '' && $bcode === '') {
                continue;
            }

            $rowDate = ($rowDates[$i] ?? '') !== '' ? $rowDates[$i] : null;

            $payload = [
                'doc_no'              => $request->doc_no,
                'row_date'            => $rowDate,
                'client_name'         => $cName,
                'client_code'         => $cCode,
                'barcode'             => $bcode,
                'work_order'          => trim($workOrders[$i] ?? ''),
                'trf'                 => trim($trfs[$i] ?? ''),
                'clinical_history'    => trim($clinicalHists[$i] ?? ''),
                'sample_volume'       => trim($sampleVolumes[$i] ?? ''),
                'temp_pickup'         => trim($tempPickups[$i] ?? ''),
                'temp_drop'           => trim($tempDrops[$i] ?? ''),
                'observations'        => trim($observations[$i] ?? ''),
                'accession_signature' => trim($accSigs[$i] ?? ''),
            ];

            $existingId = $rowIds[$i] ?? null;

            if ($existingId) {
                CsrSampleTrackingOutlier::where('id', $existingId)->update(
                    array_merge($payload, ['updated_by' => auth()->id()])
                );
                $savedIds[] = (int) $existingId;
            } else {
                $rec = CsrSampleTrackingOutlier::create(
                    array_merge($payload, ['created_by' => auth()->id()])
                );
                $savedIds[] = $rec->id;
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'CSR Sample Tracking - Outliers saved successfully.',
            'saved_ids' => $savedIds,
            'data'      => CsrSampleTrackingOutlier::whereIn('id', $savedIds)->orderBy('id')->get(),
        ]);
    }

    /**
     * LOAD CSR Sample Tracking Outliers data (AJAX)
     */
    public function loadCsrSampleTrackingOutliers(Request $request)
    {
        $query = CsrSampleTrackingOutlier::query();

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
