<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HotPlateQcForm;
use App\Models\BioSafetyCabinetForm;
use App\Models\HotAirOvenTemperatureLog;
use App\Models\IncubatorTemperatureLog;
use App\Models\LaminarAirFlowMaintenance;
use App\Models\AutoclaveMaintenance;
use App\Models\HotAirOvenMaintenance;
use App\Models\IncubatorMaintenanceForm;
use App\Models\CentrifugeMaintenanceForm;
use App\Models\BeckmanDxcMaintenanceForm;
use App\Models\BeckmanDxi800MaintenanceForm;
use App\Models\St200MaintenanceForm;
use App\Models\BeckmanDxh560MaintenanceForm;
use App\Models\HoribaH550MaintenanceForm;
use App\Models\BioRadD10MaintenanceForm;
use App\Models\AutomaticTissueProcessorMaintenanceForm;

class BEFormsController extends Controller
{
    /**
     * ==========================================
     * Main Store Router (Multiple Forms)
     * ==========================================
     */
    public function store(Request $request)
    {
        $docNo = $request->doc_no;

        // Example: TDPL/BE/FOM-002 → FOM-002
        $formCode = last(explode('/', $docNo));

        switch ($formCode) {

            case 'FOM-0##': // Hot Plate QC Form
                return $this->storeHotPlateQcForm($request);

                // Future BE Forms
            case 'FOM-006':
                return $this->storeBioSafetyCabinet($request);

            case 'BE-FOM-007':
                return $this->storeHotAirOven($request);

            case 'BE-FOM-008':
                return $this->storeIncubator($request);

            case 'BE-FOM-009':
                return $this->storeLaminarAirFlow($request);

            case 'FOM-010':
                return $this->storeAutoclave($request);

            case 'FOM-012':
                return $this->storeHotAirOvenMaintenance($request);

            case 'FOM-013':
                return $this->storeIncubatorMaintenance($request);

            case 'FOM-014':
                return $this->storeCentrifugeMaintenance($request);

            case 'FOM-015':
                return $this->storeDxcMaintenance($request);

            case 'FOM-016':
                return $this->storeDxiMaintenance($request);

            case 'FOM-017':
                return $this->storeSt200Maintenance($request);

            case 'FOM-019':
                return $this->storeDxh560Maintenance($request);

            case 'FOM-020':
                return $this->storeH550Maintenance($request);

            case 'FOM-021':
                return $this->storeD10Maintenance($request);

            case 'FOM-022':
                return $this->storeAutomaticTissueProcessorMaintenance($request);



            default:
                return back()->with('error', 'Unknown BE form');
        }
    }

    /**
     * ==========================================
     * FOM-002 – Hot Plate QC Form
     * Supports:
     * - Inline edit
     * - Full submit
     * ==========================================
     */
    protected function storeHotPlateQcForm(Request $request)
    {
        // ✅ CORRECT VALIDATION FOR <input type="month">
        $request->validate([
            'month_year' => [
                'required',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/'
            ],
            'instrument_serial_no' => 'nullable|string|max:100',
        ], [
            'month_year.regex' => 'Month & Year format must be YYYY-MM'
        ]);

        // 🔑 COMMON PAYLOAD
        $payload = [
            // ✅ STORE AS STRING (YYYY-MM)
            'month_year' => $request->month_year,

            'instrument_serial_no' => $request->instrument_serial_no,

            // ✅ ARRAY CLEANUP (INLINE SAFE)
            'cleaning_outside' => array_filter($request->cleaning_outside ?? []),
            'temperature_check' => array_filter($request->temperature_check ?? []),
            'lab_staff_signature' => array_filter($request->lab_staff_signature ?? []),
            'lab_supervisor_signature' => array_filter($request->lab_supervisor_signature ?? []),

            'doc_no' => $request->doc_no,
            'issue_no' => $request->issue_no,
            'issue_date' => $request->issue_date,
        ];

        /**
         * ==========================================
         * UPDATE (INLINE / FULL SUBMIT)
         * ==========================================
         */
        if ($request->filled('form_id')) {
            HotPlateQcForm::where('id', $request->form_id)->update($payload);

            return back()->with('success', 'Daily QC Form Register sccessfully');
        }

        /**
         * ==========================================
         * CREATE (FIRST TIME)
         * ==========================================
         */
        $form = HotPlateQcForm::create($payload);

        return back()->with('success', 'Daily QC Form Register sccessfully');
    }


    public function loadHotPlateQc(Request $request)
    {
        // ✅ SAME VALIDATION RULE (controller consistency)
        $request->validate([
            'month_year' => [
                'required',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/'
            ],
            'instrument_serial_no' => 'nullable|string|max:100',
        ]);

        // ✅ SIMPLE STRING MATCH
        $form = HotPlateQcForm::where('month_year', $request->month_year)
            ->when($request->instrument_serial_no, function ($q) use ($request) {
                $q->where('instrument_serial_no', $request->instrument_serial_no);
            })
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }



    /**
     * ==========================================
     * STORE / UPDATE (INLINE + FULL SUBMIT)
     * ==========================================
     */
    public function storeBioSafetyCabinet(Request $request)
    {
        // ✅ VALIDATION (NO DATE CASTING)
        $request->validate([
            'bsc_month_year' => [
                'required',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/'
            ],
            'bsc_equipment_id' => 'nullable|string|max:100',
        ]);

        // 🔒 FORCE YYYY-MM STRING
        $monthYear = substr(trim($request->bsc_month_year), 0, 7);

        // 🔑 COMMON PAYLOAD
        $payload = [
            'bsc_department' => $request->bsc_department,
            'bsc_month_year' => $monthYear,
            'bsc_equipment_id' => $request->bsc_equipment_id,

            // ===== DAILY / WEEKLY JSON =====
            'bsc_clean_ipa' => array_filter($request->bsc_clean_ipa ?? []),
            'bsc_uv_light' => array_filter($request->bsc_uv_light ?? []),
            'bsc_manometer' => array_filter($request->bsc_manometer ?? []),
            'bsc_done_by' => array_filter($request->bsc_done_by ?? []),
            'bsc_hypo_available' => array_filter($request->bsc_hypo_available ?? []),

            'bsc_settle_plate_date' => array_filter($request->bsc_settle_plate_date ?? []),
            'bsc_settle_yes' => $request->bsc_settle_yes ?? [],
            'bsc_settle_no' => $request->bsc_settle_no ?? [],
            'bsc_settle_cfu' => array_filter($request->bsc_settle_cfu ?? []),

            'bsc_uv_efficacy' => array_filter($request->bsc_uv_efficacy ?? []),
            'bsc_checked_by' => array_filter($request->bsc_checked_by ?? []),
            'bsc_remarks' => array_filter($request->bsc_remarks ?? []),
        ];

        /**
         * ==========================================
         * UPDATE (INLINE EDIT OR FULL UPDATE)
         * ==========================================
         */
        if ($request->filled('bsc_form_id')) {
            BioSafetyCabinetForm::where('id', $request->bsc_form_id)->update($payload);

            return back()->with('success', 'Bio Safety Cabinate Form Register sccessfully');
        }

        /**
         * ==========================================
         * CREATE (FIRST TIME SUBMIT)
         * ==========================================
         */
        $form = BioSafetyCabinetForm::create($payload);

        return back()->with('success', 'Bio Safety Cabinate Form Register sccessfully');
    }

    /**
     * ==========================================
     * LOAD (MONTH + EQUIPMENT FILTER)
     * ==========================================
     */
    public function loadBioSafetyCabinet(Request $request)
    {
        $request->validate([
            'bsc_month_year' => [
                'required',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/'
            ],
            'bsc_equipment_id' => 'nullable|string|max:100',
        ]);

        $monthYear = substr(trim($request->bsc_month_year), 0, 7);

        $form = BioSafetyCabinetForm::where('bsc_month_year', $monthYear)
            ->when(
                $request->filled('bsc_department'),
                fn($q) => $q->where('bsc_department', $request->bsc_department)
            )
            ->when(
                $request->filled('bsc_equipment_id'),
                fn($q) => $q->where('bsc_equipment_id', $request->bsc_equipment_id)
            )
            ->first();


        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeHotAirOven(Request $request)
    {

        // ✅ Validation
        $request->validate([
            'hao_month_year' => 'required|date_format:Y-m',

            'hao_instrument_id' => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'hao_month_year'    => $request->hao_month_year,
            'hao_instrument_id' => $request->hao_instrument_id,

            'hao_morning_temp'  => array_filter($request->hao_morning_temp ?? [], fn($v) => $v !== null && $v !== ''),
            'hao_morning_sign'  => array_filter($request->hao_morning_sign ?? [], fn($v) => $v !== null && $v !== ''),
            'hao_evening_temp'  => array_filter($request->hao_evening_temp ?? [], fn($v) => $v !== null && $v !== ''),
            'hao_evening_sign'  => array_filter($request->hao_evening_sign ?? [], fn($v) => $v !== null && $v !== ''),
        ];

        /**
         * ============================
         * UPDATE (INLINE / FULL SAVE)
         * ============================
         */
        if ($request->filled('hao_form_id')) {
            HotAirOvenTemperatureLog::where('id', $request->hao_form_id)
                ->update($payload);

            return back()->with('success', 'Hot Air Oven Form Register sccessfully');
        }

        /**
         * ============================
         * CREATE (FIRST TIME SUBMIT)
         * ============================
         */
        $form = HotAirOvenTemperatureLog::create($payload);
        return back()->with('success', 'Hot Air Oven Form Register sccessfully');
    }

    public function loadHotAirOven(Request $request)
    {
        $request->validate([
            'hao_month_year'    => 'required',
            'hao_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = HotAirOvenTemperatureLog::where('hao_month_year', $request->hao_month_year)
            ->when(
                $request->filled('hao_instrument_id'),
                fn($q) => $q->where('hao_instrument_id', $request->hao_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }




    protected function storeIncubator(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'inc_month_year'    => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'inc_instrument_id' => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'inc_month_year'    => $request->inc_month_year,
            'inc_instrument_id' => $request->inc_instrument_id,

            'inc_morning_temp'  => array_filter($request->inc_morning_temp ?? [], fn($v) => $v !== null && $v !== ''),
            'inc_morning_sign'  => array_filter($request->inc_morning_sign ?? [], fn($v) => $v !== null && $v !== ''),
            'inc_evening_temp'  => array_filter($request->inc_evening_temp ?? [], fn($v) => $v !== null && $v !== ''),
            'inc_evening_sign'  => array_filter($request->inc_evening_sign ?? [], fn($v) => $v !== null && $v !== ''),
        ];

        /**
         * ==========================================
         * UPDATE (INLINE / FULL SUBMIT)
         * ==========================================
         */
        if ($request->filled('inc_form_id')) {

            IncubatorTemperatureLog::where('id', $request->inc_form_id)
                ->update($payload);

            return back()->with('success', 'Incubator Temperature Monitoring Form Updated sccessfully');
        }

        /**
         * ==========================================
         * CREATE (FIRST TIME)
         * ==========================================
         */
        $form = IncubatorTemperatureLog::create($payload);
        return back()->with('success', 'Incubator Temperature Monitoring Form Register sccessfully');
    }

    public function loadIncubator(Request $request)
    {
        $request->validate([
            'inc_month_year'    => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'inc_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = IncubatorTemperatureLog::where('inc_month_year', $request->inc_month_year)
            ->when(
                $request->filled('inc_instrument_id'),
                fn($q) => $q->where('inc_instrument_id', $request->inc_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeLaminarAirFlow(Request $request)
    {
        // ✅ BASIC VALIDATION
        $request->validate([
            'laf_month_year'    => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'laf_department'    => 'nullable|string|max:100',
            'laf_equipment_id'  => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'laf_department'    => $request->laf_department,
            'laf_month_year'    => $request->laf_month_year,
            'laf_equipment_id'  => $request->laf_equipment_id,

            'laf_clean_ipa'         => array_filter($request->laf_clean_ipa ?? []),
            'laf_uv_light'          => array_filter($request->laf_uv_light ?? []),
            'laf_manometer'         => array_filter($request->laf_manometer ?? []),
            'laf_done_by'           => array_filter($request->laf_done_by ?? []),
            'laf_hypo_available'    => array_filter($request->laf_hypo_available ?? []),
            'laf_settle_plate_date' => array_filter($request->laf_settle_plate_date ?? []),
            'laf_settle_result'     => array_filter($request->laf_settle_result ?? []),
            'laf_uv_efficacy'       => array_filter($request->laf_uv_efficacy ?? []),
            'laf_checked_by'        => array_filter($request->laf_checked_by ?? []),
            'laf_remarks'           => array_filter($request->laf_remarks ?? []),
        ];

        /**
         * ==========================================
         * UPDATE (INLINE OR FULL SUBMIT)
         * ==========================================
         */
        if ($request->filled('laf_form_id')) {

            LaminarAirFlowMaintenance::where('id', $request->laf_form_id)
                ->update($payload);

            return back()->with('success', 'Laminar Air Flow Maintenance Form Updated sccessfully');
        }

        /**
         * ==========================================
         * CREATE (FIRST TIME)
         * ==========================================
         */
        $form = LaminarAirFlowMaintenance::create($payload);

        return back()->with('success', 'Laminar Air Flow Maintenance Form Register sccessfully');
    }

    public function loadLaminarAirFlow(Request $request)
    {
        $request->validate([
            'laf_month_year'   => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'laf_department'   => 'nullable|string|max:100',
            'laf_equipment_id' => 'nullable|string|max:100',
        ]);

        $form = LaminarAirFlowMaintenance::where('laf_month_year', $request->laf_month_year)
            ->when(
                $request->filled('laf_department'),
                fn($q) => $q->where('laf_department', $request->laf_department)
            )
            ->when(
                $request->filled('laf_equipment_id'),
                fn($q) => $q->where('laf_equipment_id', $request->laf_equipment_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeAutoclave(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'aut_month_year'     => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'aut_instrument_id'  => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'aut_month_year'    => $request->aut_month_year,
            'aut_instrument_id' => $request->aut_instrument_id,

            'aut_clean_outside'       => array_filter($request->aut_clean_outside ?? [], fn($v) => $v !== null && $v !== ''),
            'aut_chamber_water'       => array_filter($request->aut_chamber_water ?? [], fn($v) => $v !== null && $v !== ''),
            'aut_clean_inside'        => array_filter($request->aut_clean_inside ?? [], fn($v) => $v !== null && $v !== ''),
            'aut_power_check'         => array_filter($request->aut_power_check ?? [], fn($v) => $v !== null && $v !== ''),

            'aut_lab_staff_sign'      => array_filter($request->aut_lab_staff_sign ?? [], fn($v) => $v !== null && $v !== ''),
            'aut_lab_supervisor_sign' => array_filter($request->aut_lab_supervisor_sign ?? [], fn($v) => $v !== null && $v !== ''),
        ];

        /**
         * =================================================
         * INLINE UPDATE OR FULL UPDATE
         * =================================================
         */
        if ($request->filled('aut_form_id')) {

            AutoclaveMaintenance::where('id', $request->aut_form_id)
                ->update($payload);

            return back()->with('success', 'Autoclave Maintenance Form Updated sccessfully');
        }

        /**
         * =================================================
         * FIRST TIME CREATE
         * =================================================
         */
        $form = AutoclaveMaintenance::create($payload);

        return back()->with('success', 'Autoclave Maintenance Form Register sccessfully');
    }

    public function loadAutoclave(Request $request)
    {
        // ✅ Validation (same everywhere)
        $request->validate([
            'aut_month_year'    => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'aut_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = AutoclaveMaintenance::where('aut_month_year', $request->aut_month_year)
            ->when(
                $request->filled('aut_instrument_id'),
                fn($q) => $q->where('aut_instrument_id', $request->aut_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeHotAirOvenMaintenance(Request $request)
    {
        // ✅ VALIDATION (simple & safe)
        $request->validate([
            'hao_maint_month_year'   => 'required|string|max:7', // YYYY-MM
            'hao_maint_instrument_id' => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD (FILTER EMPTY VALUES)
        $payload = [
            'hao_maint_month_year' => $request->hao_maint_month_year,
            'hao_maint_instrument_id' => $request->hao_maint_instrument_id,

            'hao_maint_clean_outside' =>
            array_filter($request->hao_maint_clean_outside ?? [], fn($v) => $v !== null && $v !== ''),

            'hao_maint_clean_inside' =>
            array_filter($request->hao_maint_clean_inside ?? [], fn($v) => $v !== null && $v !== ''),

            'hao_maint_temperature_check' =>
            array_filter($request->hao_maint_temperature_check ?? [], fn($v) => $v !== null && $v !== ''),

            'hao_maint_power_check' =>
            array_filter($request->hao_maint_power_check ?? [], fn($v) => $v !== null && $v !== ''),

            'hao_maint_lab_staff_sign' =>
            array_filter($request->hao_maint_lab_staff_sign ?? [], fn($v) => $v !== null && $v !== ''),

            'hao_maint_lab_supervisor_sign' =>
            array_filter($request->hao_maint_lab_supervisor_sign ?? [], fn($v) => $v !== null && $v !== ''),
        ];

        /**
         * =================================================
         * INLINE UPDATE / FULL UPDATE
         * =================================================
         */
        if ($request->filled('hao_maint_form_id')) {

            HotAirOvenMaintenance::where('id', $request->hao_maint_form_id)
                ->update($payload);

            return back()->with('success', 'Hot Air Oven Maintenance Form Updated sccessfully');
        }

        /**
         * =================================================
         * CREATE (FIRST TIME)
         * =================================================
         */
        $form = HotAirOvenMaintenance::create($payload);

        return back()->with('success', 'Hot Air Oven Maintenance Form Register sccessfully');
    }

    public function loadHaoMaintenance(Request $request)
    {
        $request->validate([
            'hao_maint_month_year' => 'required|string|max:7',
            'hao_maint_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = HotAirOvenMaintenance::where('hao_maint_month_year', $request->hao_maint_month_year)
            ->when(
                $request->filled('hao_maint_instrument_id'),
                fn($q) => $q->where('hao_maint_instrument_id', $request->hao_maint_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }


    protected function storeIncubatorMaintenance(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'inc_maint_month_year'      => 'required|string|max:7',
            'inc_maint_instrument_id'   => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'inc_maint_month_year'    => $request->inc_maint_month_year,
            'inc_maint_instrument_id' => $request->inc_maint_instrument_id,

            'inc_maint_clean_outside'      => array_filter($request->inc_maint_clean_outside ?? []),
            'inc_maint_clean_inside'       => array_filter($request->inc_maint_clean_inside ?? []),
            'inc_maint_temperature_check'  => array_filter($request->inc_maint_temperature_check ?? []),
            'inc_maint_power_check'        => array_filter($request->inc_maint_power_check ?? []),
            'inc_maint_lab_staff_sign'      => array_filter($request->inc_maint_lab_staff_sign ?? []),
            'inc_maint_lab_supervisor_sign' => array_filter($request->inc_maint_lab_supervisor_sign ?? []),
        ];

        // ✅ UPDATE (inline or resubmit)
        if ($request->filled('inc_maint_form_id')) {
            IncubatorMaintenanceForm::where('id', $request->inc_maint_form_id)
                ->update($payload);
        }
        // ✅ CREATE
        else {
            IncubatorMaintenanceForm::create($payload);
        }

        return back()->with('success', 'Incubator Maintenance Form saved successfully');
    }

    public function loadIncubatorMaintenance(Request $request)
    {
        $request->validate([
            'inc_maint_month_year'    => 'required|string|max:7',
            'inc_maint_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = IncubatorMaintenanceForm::where('inc_maint_month_year', $request->inc_maint_month_year)
            ->when(
                $request->filled('inc_maint_instrument_id'),
                fn($q) => $q->where('inc_maint_instrument_id', $request->inc_maint_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }


    protected function storeCentrifugeMaintenance(Request $request)
    {

        // ✅ VALIDATION
        $request->validate([
            'cen_month_year'     => 'required|string|max:7',
            'cen_instrument_id'  => 'nullable|string|max:100',
        ]);

        // ✅ COMMON PAYLOAD
        $payload = [
            'cen_month_year'    => $request->cen_month_year,
            'cen_instrument_id' => $request->cen_instrument_id,

            // DAILY
            'cen_clean_outside'       => array_filter($request->cen_clean_outside ?? []),
            'cen_clean_inside'        => array_filter($request->cen_clean_inside ?? []),
            'cen_power_check'         => array_filter($request->cen_power_check ?? []),
            'cen_carbon_brush'        => array_filter($request->cen_carbon_brush ?? []),
            'cen_lab_staff_sign'      => array_filter($request->cen_lab_staff_sign ?? []),
            'cen_lab_supervisor_sign' => array_filter($request->cen_lab_supervisor_sign ?? []),

            // WEEKLY
            'cen_week1_date'       => $request->cen_week1_date,
            'cen_week2_date'       => $request->cen_week2_date,
            'cen_week3_date'       => $request->cen_week3_date,
            'cen_week4_date'       => $request->cen_week4_date,

            'cen_week1_staff'      => $request->cen_week1_staff,
            'cen_week2_staff'      => $request->cen_week2_staff,
            'cen_week3_staff'      => $request->cen_week3_staff,
            'cen_week4_staff'      => $request->cen_week4_staff,

            'cen_week1_supervisor' => $request->cen_week1_supervisor,
            'cen_week2_supervisor' => $request->cen_week2_supervisor,
            'cen_week3_supervisor' => $request->cen_week3_supervisor,
            'cen_week4_supervisor' => $request->cen_week4_supervisor,
        ];

        /**
         * ======================================
         * UPDATE (INLINE / RE-SUBMIT)
         * ======================================
         */
        if ($request->filled('cen_form_id')) {
            CentrifugeMaintenanceForm::where('id', $request->cen_form_id)
                ->update($payload);

            return back()->with('success', 'Centrifuge Maintenance Form Updated sccessfully');
        }

        /**
         * ======================================
         * CREATE (FIRST SUBMIT)
         * ======================================
         */
        $form = CentrifugeMaintenanceForm::create($payload);

        return back()->with('success', 'Centrifuge Maintenance Form Register sccessfully');
    }


    public function loadCentrifuge(Request $request)
    {
        $request->validate([
            'cen_month_year'    => 'required|string|max:7',
            'cen_instrument_id' => 'nullable|string|max:100',
        ]);

        $form = CentrifugeMaintenanceForm::where('cen_month_year', $request->cen_month_year)
            ->when(
                $request->filled('cen_instrument_id'),
                fn($q) => $q->where('cen_instrument_id', $request->cen_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeDxcMaintenance(Request $request)
    {
        // ❗ Month-Year is mandatory
        $request->validate([
            'dxc_month_year' => 'required|string|max:7',
        ]);

        // ✅ COMMON FILTERS
        $filters = [
            'dxc_month_year' => $request->dxc_month_year,
            'dxc_location'   => $request->dxc_location,
            'dxc_department' => $request->dxc_department,
        ];

        // ✅ FIND EXISTING FORM (INLINE / UPDATE)
        $form = BeckmanDxcMaintenanceForm::where('dxc_month_year', $request->dxc_month_year)
            ->when(
                $request->filled('dxc_location'),
                fn($q) => $q->where('dxc_location', $request->dxc_location)
            )
            ->when(
                $request->filled('dxc_department'),
                fn($q) => $q->where('dxc_department', $request->dxc_department)
            )
            ->first();

        // ✅ PAYLOAD (ALIGNED WITH BLADE)
        $payload = array_merge($filters, [

            // ===== DAILY (JSON) =====
            'dxc_inspect_syringes'     => array_filter($request->dxc_inspect_syringes ?? []),
            'dxc_inspect_roller_pump' => array_filter($request->dxc_inspect_roller_pump ?? []),
            'dxc_inspect_probes'      => array_filter($request->dxc_inspect_probes ?? []),
            'dxc_replace_diluent'     => array_filter($request->dxc_replace_diluent ?? []),
            'dxc_replace_probe_wash'  => array_filter($request->dxc_replace_probe_wash ?? []),
            'dxc_clean_ise'           => array_filter($request->dxc_clean_ise ?? []),
            'dxc_calibrate_ise'       => array_filter($request->dxc_calibrate_ise ?? []),
            'dxc_performed_by'        => array_filter($request->dxc_performed_by ?? []),
            'dxc_reviewed_by'         => array_filter($request->dxc_reviewed_by ?? []),

            // ===== WEEKLY (JSON ARRAYS) =====
            'dxc_week_date' => array_filter($request->dxc_week_date ?? []),

            'dxc_clean_probe_mix' => array_filter($request->dxc_clean_probe_mix ?? []),
            'dxc_perform_w2'      => array_filter($request->dxc_perform_w2 ?? []),
            'dxc_performed_supervisor'
            => array_filter($request->dxc_performed_supervisor ?? []),
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            BeckmanDxcMaintenanceForm::create($payload);
        }

        return back()->with('success', 'Beckman DXC Maintenance Form saved successfully');
    }


    public function loadDxcForm(Request $request)
    {
        $request->validate([
            'dxc_month_year' => 'required',
        ]);

        $form = BeckmanDxcMaintenanceForm::where('dxc_month_year', $request->dxc_month_year)
            ->when(
                $request->filled('dxc_location'),
                fn($q) =>
                $q->where('dxc_location', $request->dxc_location)
            )
            ->when(
                $request->filled('dxc_department'),
                fn($q) =>
                $q->where('dxc_department', $request->dxc_department)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeDxiMaintenance(Request $request)
    {
        // ❗ Month-Year mandatory (same rule everywhere)
        $request->validate([
            'dxi_month_year' => 'required|string|max:7',
        ]);

        // ✅ COMMON FILTERS
        $filters = [
            'dxi_month_year' => $request->dxi_month_year,
            'dxi_location'   => $request->dxi_location,
            'dxi_department' => $request->dxi_department,
        ];

        // ✅ FIND EXISTING FORM (INLINE EDIT SUPPORT)
        $form = BeckmanDxi800MaintenanceForm::where('dxi_month_year', $request->dxi_month_year)
            ->when(
                $request->filled('dxi_location'),
                fn($q) => $q->where('dxi_location', $request->dxi_location)
            )
            ->when(
                $request->filled('dxi_department'),
                fn($q) => $q->where('dxi_department', $request->dxi_department)
            )
            ->first();

        // ✅ PAYLOAD (JSON CLEANED)
        $payload = array_merge($filters, [

            // ===== DAILY =====
            'dxi_system_backup'     => array_filter($request->dxi_system_backup ?? []),
            'dxi_zone_temperature' => array_filter($request->dxi_zone_temperature ?? []),
            'dxi_system_supplies'  => array_filter($request->dxi_system_supplies ?? []),
            'dxi_clean_probe'      => array_filter($request->dxi_clean_probe ?? []),
            'dxi_solid_waste'      => array_filter($request->dxi_solid_waste ?? []),
            'dxi_prime_substrate'  => array_filter($request->dxi_prime_substrate ?? []),
            'dxi_daily_cleaning'   => array_filter($request->dxi_daily_cleaning ?? []),
            'dxi_performed_by'     => array_filter($request->dxi_performed_by ?? []),
            'dxi_reviewed_by'      => array_filter($request->dxi_reviewed_by ?? []),

            // ===== WEEKLY =====
            'dxi_week_date'           => $request->dxi_week_date ?? [],

            'dxi_clean_exterior'      => $request->dxi_clean_exterior ?? [],
            'dxi_clean_primary_probe' => $request->dxi_clean_primary_probe ?? [],
            'dxi_waste_filter'        => $request->dxi_waste_filter ?? [],
            'dxi_system_check'        => $request->dxi_system_check ?? [],
            'dxi_supervisor_sign'     => $request->dxi_supervisor_sign ?? [],
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            $form = BeckmanDxi800MaintenanceForm::create($payload);
        }

        return back()->with('success', 'Beckman DxI800 Maintenance Form saved successfully');
    }

    public function loadDxiMaintenance(Request $request)
    {
        // ❗ month mandatory (same rule everywhere)
        if (!$request->filled('dxi_month_year')) {
            return response()->json(['data' => null]);
        }

        $form = BeckmanDxi800MaintenanceForm::where('dxi_month_year', $request->dxi_month_year)
            ->when(
                $request->filled('dxi_location'),
                fn($q) => $q->where('dxi_location', $request->dxi_location)
            )
            ->when(
                $request->filled('dxi_department'),
                fn($q) => $q->where('dxi_department', $request->dxi_department)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }


    protected function storeSt200Maintenance(Request $request)
    {
        // ❗ Month is mandatory (same rule everywhere)
        $request->validate([
            'st200_month_year' => 'required|string|max:7',
        ]);

        // ✅ FILTER FIELDS
        $filters = [
            'st200_month_year'   => $request->st200_month_year,
            'st200_instrument_id' => $request->st200_instrument_id,
        ];

        // ✅ FIND EXISTING FORM (INLINE / UPDATE)
        $form = St200MaintenanceForm::where('st200_month_year', $request->st200_month_year)
            ->when(
                $request->filled('st200_instrument_id'),
                fn($q) => $q->where('st200_instrument_id', $request->st200_instrument_id)
            )
            ->first();

        // ✅ PAYLOAD (CLEAN JSON ARRAYS)
        $payload = array_merge($filters, [

            'st200_clean_instrument'        => array_filter($request->st200_clean_instrument ?? []),
            'st200_empty_waste'             => array_filter($request->st200_empty_waste ?? []),
            'st200_printer_status'          => array_filter($request->st200_printer_status ?? []),
            'st200_daily_cleaning_solution' => array_filter($request->st200_daily_cleaning_solution ?? []),
            'st200_calibration'             => array_filter($request->st200_calibration ?? []),
            'st200_shutdown'                => array_filter($request->st200_shutdown ?? []),
            'st200_lab_staff_sign'           => array_filter($request->st200_lab_staff_sign ?? []),
            'st200_lab_supervisor_sign'      => array_filter($request->st200_lab_supervisor_sign ?? []),
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            $form = St200MaintenanceForm::create($payload);
        }

        // ✅ SAME RESPONSE STYLE AS OTHERS
        return back()->with('success', 'ST-200 Maintenance Form saved successfully');
    }

    protected function loadSt200(Request $request)
    {
        $request->validate([
            'st200_month_year' => 'required|string|max:7',
        ]);

        $form = St200MaintenanceForm::where('st200_month_year', $request->st200_month_year)
            ->when(
                $request->filled('st200_instrument_id'),
                fn($q) => $q->where('st200_instrument_id', $request->st200_instrument_id)
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeDxh560Maintenance(Request $request)
    {

        // ❗ Month-Year mandatory (same rule everywhere)
        $request->validate([
            'dxh560_month_year' => 'required|string|max:7',
        ]);

        // ✅ FILTERS
        $filters = [
            'dxh560_month_year'        => $request->dxh560_month_year,
            'dxh560_instrument_serial' => $request->dxh560_instrument_serial,
        ];

        // ✅ FIND EXISTING (INLINE EDIT)
        $form = BeckmanDxh560MaintenanceForm::where('dxh560_month_year', $request->dxh560_month_year)
            ->when(
                $request->filled('dxh560_instrument_serial'),
                fn($q) => $q->where(
                    'dxh560_instrument_serial',
                    $request->dxh560_instrument_serial
                )
            )
            ->first();

        // ✅ PAYLOAD (JSON CLEANED)
        $payload = array_merge($filters, [

            // DAILY
            'dxh560_daily' => array_filter(
                $request->dxh560_daily ?? [],
                fn($row) => array_filter($row)
            ),

            // WEEKLY
            'dxh560_weekly' => array_filter(
                $request->dxh560_weekly ?? [],
                fn($row) => array_filter($row)
            ),

            // MONTHLY
            'dxh560_monthly' => array_filter(
                $request->dxh560_monthly ?? [],
                fn($row) => array_filter($row)
            ),

            // TECHNICIAN
            'dxh560_technician' => array_filter(
                $request->dxh560_technician ?? []
            ),
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            $form = BeckmanDxh560MaintenanceForm::create($payload);
        }

        // ✅ SAME RESPONSE STYLE
        return back()->with('success', 'Beckman Dxh560 Maintenance Form Register successfully');
    }

    protected function storeH550Maintenance(Request $request)
    {
        // ❗ Month-Year mandatory (same rule everywhere)
        $request->validate([
            'h550_month_year' => 'required|string|max:7',
        ]);

        // ✅ COMMON FILTERS
        $filters = [
            'h550_month_year'        => $request->h550_month_year,
            'h550_instrument_serial' => $request->h550_instrument_serial,
        ];

        // ✅ FIND EXISTING FORM (INLINE EDIT / UPDATE)
        $form = HoribaH550MaintenanceForm::where('h550_month_year', $request->h550_month_year)
            ->when(
                $request->filled('h550_instrument_serial'),
                fn($q) =>
                $q->where('h550_instrument_serial', $request->h550_instrument_serial)
            )
            ->first();

        // ✅ PAYLOAD (JSON CLEANED)
        $payload = array_merge($filters, [

            // DAILY JSON
            'h550_daily' => array_filter($request->h550_daily ?? []),
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            $form = HoribaH550MaintenanceForm::create($payload);
        }

        // ✅ RESPONSE (INLINE + NORMAL SUBMIT)
        return back()->with('success', 'HORIBA Yumizen H550 Maintenance Form saved successfully');
    }

    public function loadH550(Request $request)
    {

        // ✅ SAME VALIDATION RULE (controller consistency)
        $request->validate([
            'h550_month_year' => 'required|string|max:7',
        ]);

        // ✅ SIMPLE STRING MATCH (SAME PATTERN)
        $form = HoribaH550MaintenanceForm::where('h550_month_year', $request->h550_month_year)
            ->when($request->h550_instrument_serial, function ($q) use ($request) {
                $q->where('h550_instrument_serial', $request->h550_instrument_serial);
            })
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }

    protected function storeD10Maintenance(Request $request)
    {
        // ❗ Month-Year mandatory (same rule everywhere)
        $request->validate([
            'd10_month_year' => 'required|string|max:7',
        ]);

        // ✅ COMMON FILTERS (ADD MISSING FIELDS)
        $filters = [
            'd10_month_year'                => $request->d10_month_year,
            'd10_year'                      => $request->d10_year,
            'd10_location'                  => $request->d10_location,
            'd10_department'                => $request->d10_department,
            'd10_instrument_serial'         => $request->d10_instrument_serial,
            'd10_monthly_instrument_serial' => $request->d10_monthly_instrument_serial,
        ];

        // ✅ FIND EXISTING FORM (INLINE EDIT / UPDATE)
        $form = BioRadD10MaintenanceForm::where('d10_month_year', $request->d10_month_year)
            ->when(
                $request->filled('d10_instrument_serial'),
                fn($q) => $q->where(
                    'd10_instrument_serial',
                    $request->d10_instrument_serial
                )
            )
            ->first();

        // ✅ PAYLOAD (JSON CLEANED – SAME AS OTHERS)
        $payload = array_merge($filters, [

            // DAILY JSON
            'd10_daily' => array_filter(
                $request->d10_daily ?? [],
                fn($row) => array_filter($row)
            ),

            // MONTHLY JSON
            'd10_monthly' => array_filter(
                $request->d10_monthly ?? [],
                fn($row) => array_filter($row)
            ),
        ]);

        /**
         * ======================================
         * UPDATE (INLINE / FULL SUBMIT)
         * ======================================
         */
        if ($request->filled('d10_form_id')) {

            BioRadD10MaintenanceForm::where('id', $request->d10_form_id)
                ->update($payload);

            return back()->with(
                'success',
                'Bio-Rad D10 Maintenance Form updated successfully'
            );
        }

        /**
         * ======================================
         * CREATE (FIRST TIME)
         * ======================================
         */
        BioRadD10MaintenanceForm::create($payload);

        return back()->with(
            'success',
            'Bio-Rad D10 Maintenance Form saved successfully'
        );
    }

    public function loadD10(Request $request)
    {
        // ❗ SAME VALIDATION STYLE
        if (!$request->filled('d10_month_year')) {
            return response()->json(['data' => null]);
        }

        $form = BioRadD10MaintenanceForm::where(
            'd10_month_year',
            $request->d10_month_year
        )
            ->when(
                $request->filled('d10_instrument_serial'),
                fn($q) => $q->where(
                    'd10_instrument_serial',
                    $request->d10_instrument_serial
                )
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }
    protected function storeAutomaticTissueProcessorMaintenance(Request $request)
    {
        // ✅ SAME RULE AS ALL FORMS
        $request->validate([
            'atp_month_year' => 'required|string|max:7', // YYYY-MM
        ]);

        // ✅ COMMON FILTERS (MATCH BLADE)
        $filters = [
            'month_year'    => $request->atp_month_year,
            'instrument_id' => $request->atp_instrument_id,
        ];

        // ✅ FIND EXISTING FORM (INLINE EDIT SUPPORT)
        $form = AutomaticTissueProcessorMaintenanceForm::where(
            'month_year',
            $request->atp_month_year
        )
            ->when(
                $request->filled('atp_instrument_id'),
                fn($q) => $q->where(
                    'instrument_id',
                    $request->atp_instrument_id
                )
            )
            ->first();

        // ✅ PAYLOAD (JSON CLEANED – SAME STYLE AS OTHERS)
        $payload = array_merge($filters, [

            // DAILY JSON (31 days)
            'daily' => array_filter(
                $request->atp_daily ?? [],
                fn($row) => array_filter($row)
            ),
        ]);

        // ✅ CREATE OR UPDATE (SAME METHOD)
        if ($form) {
            $form->update($payload);
        } else {
            AutomaticTissueProcessorMaintenanceForm::create($payload);
        }

        // ✅ SAME RESPONSE STYLE
        return back()->with(
            'success',
            'Automatic Tissue Processor Maintenance Form saved successfully'
        );
    }

    public function loadAutomaticTissueProcessor(Request $request)
    {
        // ❗ SAME RULE AS ALL FORMS
        if (!$request->filled('atp_month_year')) {
            return response()->json(['data' => null]);
        }

        $form = AutomaticTissueProcessorMaintenanceForm::where(
            'month_year',
            $request->atp_month_year
        )
            ->when(
                $request->filled('atp_instrument_id'),
                fn($q) => $q->where(
                    'instrument_id',
                    $request->atp_instrument_id
                )
            )
            ->first();

        return response()->json([
            'data' => $form
        ]);
    }
}
