@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CP</title>
    </head>
    <style>
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }

        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: left !important;
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
        }

        .table th,
        td {
            border: 1px solid black !important;
            border-collapse: collapse !important;
        }

        .pc-header {
            background-color: #0078d7;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            font-size: 18px;
        }

        .pc-header-icon {
            margin-right: 10px;
        }

        .pc-content {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            gap: 120px;
        }

        .pc-folder {
            text-decoration: none;
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
            text-align: center;
            padding: 6px 12px;
            border-radius: 10px;
            cursor: pointer;
        }

        .pc-folder:hover {
            transform: scale(1.2);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background-color: #b3b3b3;

        }

        .pc-folder-icon {
            font-size: 120px;
            background: linear-gradient(to bottom, #1b3774, #028c4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pc-folder-label {
            display: block;
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }

        .pc-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            height: calc(100vh - 240px);
            padding: 10px;
            position: relative;
        }

        .pc-folder {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 180px;
            height: fit-content;
            padding: 18px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            transition: 0.3s;
        }

        .pc-folder:hover {
            background: #e3f2fd;
        }

        .pc-folder-icon {
            /* font-size: 24px; */
            margin-bottom: 5px;
        }

        .inactive {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .active {
            display: block;
            position: relative;
            pointer-events: auto;
            transition: opacity 0.3s ease-in-out;
        }

        .hidden {
            display: none;
        }

        .animated-button {
            position: relative;
            animation-duration: 1s;
            /* Duration of the animation */
            animation-fill-mode: forwards;
            /* Ensure it stays in the final position */
        }

        @keyframes slide-left {
            0% {
                transform: translateX(0);
                /* Start position */
            }


            50% {
                transform: translateX(600px);
            }



            100% {
                transform: translateX(-200px);
                /* End position */
            }
        }

        .animated-button.animate {
            animation-name: slide-left;
            animation-timing-function: ease-in-out;
            /* Smooth animation */
        }


        /* Heading Container */
        .expandedHeading {
            background: #010046;
            /* Dark blue background */
            color: white;
            border-radius: 8px;
            /* Slightly rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 1rem;
            /* Internal spacing */
            overflow: hidden;
            /* Hide excess content */
            transition: all 1s ease;
            /* Smoother animation */
            display: flex;

        }



        /* Visible Content */
        .expandedHeadingVisible {
            display: flex;
            justify-content: space-between;
            align-items: center;

            width: 100%;
            /* Standard gap for spacing */
        }

        /* Typography */
        .doc-detail {
            font-size: 1rem;
            /* Medium weight for readability */
            margin: 0;
            /* Reset default margin */
            white-space: nowrap;
            /* Prevent wrapping */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .expandedHeading {
                padding: 0.75rem;
                /* Adjust padding for smaller screens */
            }

            .doc-detail {
                font-size: 0.9rem;
                /* Slightly smaller text on smaller screens */
            }
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px; ">CP </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('TDPL/CP/FOM-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Daily Urine QC Form</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('TDPL/CP/REG-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> Manual Method for Clinical Pathology CUE (Once in 6 Months)</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/CP/REG-002')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Stool Examination Result Register</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/CP/REG-003')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Urine Examination Result Register</span>
                    </div>

                </div>
            </div>
        </div>


        <x-formTemplete id="TDPL/CP/FOM-001" docNo="TDPL/CP/FOM-001" docName="Daily Urine QC Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('cp.forms.submit') }}">


            {{-- 🔑 INLINE EDIT ID (ADDED – REQUIRED) --}}
            <input type="hidden" name="urine_qc_form_id" id="urine_qc_form_id">

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 24px;">

                <div>
                    <label style="display: block; font-size: 14px; font-weight: 600;">Month/Year</label>
                    <input type="month" name="month_year" onchange="loadDailyUrineQcForm()"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

                <div>
                    <label style="display: block; font-size: 14px; font-weight: 600;">LOT No.</label>
                    <input type="text" name="lot_no"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

                <div>
                    <label style="display: block; font-size: 14px; font-weight: 600;">Expiry Date</label>
                    <input type="date" name="expiry_date"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

                <div>
                    <label style="display: block; font-size: 14px; font-weight: 600;">Level</label>
                    <input type="text" name="level"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 14px; font-weight: 600;">Instrument Name</label>
                    <input type="text" name="instrument_name"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 14px; font-weight: 600;">Instrument ID / S. No.</label>
                    <input type="text" name="instrument_id"
                        style="margin-top: 4px; display: block; width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" />
                </div>

            </div>


            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border" style="text-align:center">Date</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Blood</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Leucocyte</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Bilirubin</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Urobilinogen</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Ketones</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Glucose</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Proteins</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">pH</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Nitrites</th>
                            <th class="p-2 border" style="text-align:center" colspan="2">Sp. Gravity</th>
                            <th class="p-2 border" style="text-align:center">Performed by</th>
                            <th class="p-2 border" style="text-align:center">Reviewed By</th>
                        </tr>
                        <tr>
                            <th class="p-2 border" style="text-align:center">Ref Range</th>
                            @foreach (['blood', 'leucocyte', 'bilirubin', 'urobilinogen', 'ketones', 'glucose', 'proteins', 'ph', 'nitrites', 'spgravity'] as $param)
                                <th class="p-2 border" style="text-align:center">Value</th>
                                <th class="p-2 border" style="text-align:center">Note</th>
                            @endforeach
                            <th class="p-2 border"></th>
                            <th class="p-2 border"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($day = 1; $day <= 31; $day++)
                            <tr>
                                <td class="p-2 border text-center">{{ $day }}</td>

                                <td class="p-2 border"><input name="data[{{ $day }}][blood_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][blood_note]" type="text"
                                        class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][leucocyte_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][leucocyte_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][bilirubin_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][bilirubin_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][urobilinogen_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][urobilinogen_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][ketones_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][ketones_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][glucose_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][glucose_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][proteins_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][proteins_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][ph_value]" type="text"
                                        class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][ph_note]" type="text"
                                        class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][nitrites_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][nitrites_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][spgravity_value]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][spgravity_note]"
                                        type="text" class="w-full p-1 border rounded" /></td>

                                <td class="p-2 border"><input name="data[{{ $day }}][performed_by]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                                <td class="p-2 border"><input name="data[{{ $day }}][reviewed_by]"
                                        type="text" class="w-full p-1 border rounded" /></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Save</button>
            </div>

        </x-formTemplete>


        <x-formTemplete id="TDPL/CP/REG-001" docNo="TDPL/CP/REG-001"
            docName="Manual Method for Clinical Pathology CUE (Once in 6 Months)" issueNo="2.0" issueDate="01/10/2024"
            buttonText="Submit" action="{{ route('cp.forms.submit') }}">

            {{-- 🔑 INLINE EDIT PRIMARY ID --}}
            <input type="hidden" name="cue_form_id" id="cue_form_id">

            {{-- 🔑 FILTERS (BE STYLE) --}}
            <div style="
    display:flex;
    gap:10px;
    margin-bottom:20px;
    align-items:flex-end;
">

                <div style="width:220px">
                    <label style="font-size:14px;font-weight:600">Month / Year</label>
                    <input type="month" name="month_year" id="cue_month_year" onchange="loadCueForm()"
                        style="
                width:100%;
                border:1px solid #ccc;
                border-radius:4px;
                padding:6px 8px;
            " />
                </div>

                <div style="width:220px">
                    <label style="font-size:14px;font-weight:600">Instrument ID</label>

                    <input type="text" name="instrument_id" id="cue_instrument_id" list="cueInstrumentList"
                        onchange="loadCueForm()"
                        style="
            width:100%;
            border:1px solid #ccc;
            border-radius:4px;
            padding:6px 8px;
        " />

                    <datalist id="cueInstrumentList">
                        <option value="CUE-001">
                        <option value="CUE-002">
                        <option value="CUE-003">
                    </datalist>
                </div>

            </div>




            <table class="w-full border border-black">
                <thead>
                    <tr>
                        <th class="border p-1">S. No.</th>
                        <th class="border p-1">Date</th>
                        <th class="border p-1">SIN No.</th>
                        <th class="border p-1">Analyte Name</th>
                        <th class="border p-1">Results</th>
                        <th class="border p-1">Done By</th>
                        <th class="border p-1">Verified By</th>
                        <th class="border p-1">Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 1; $i <= 30; $i++)
                        <tr>
                            <td class="border p-1">{{ $i }}</td>

                            <td class="border p-1">
                                <input type="date" name="rows[{{ $i }}][date]"
                                    id="cue_rows_{{ $i }}_date" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][sin_no]"
                                    id="cue_rows_{{ $i }}_sin_no" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][analyte]"
                                    id="cue_rows_{{ $i }}_analyte" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][results]"
                                    id="cue_rows_{{ $i }}_results" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][done_by]"
                                    id="cue_rows_{{ $i }}_done_by" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][verified_by]"
                                    id="cue_rows_{{ $i }}_verified_by" class="w-full" />
                            </td>

                            <td class="border p-1">
                                <input type="text" name="rows[{{ $i }}][remarks]"
                                    id="cue_rows_{{ $i }}_remarks" class="w-full" />
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

        </x-formTemplete>



        <x-formTemplete id="TDPL/CP/REG-002" docNo="TDPL/CP/REG-002" docName="Stool Examination Result Register"
            issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('cp.forms.submit') }}">

            {{-- 🔑 INLINE EDIT ID --}}
            <input type="hidden" name="stool_register_id" id="stool_register_id">

            {{-- ================= FILTERS (LOAD ONLY) ================= --}}
            <div style="display:flex;gap:16px;margin-bottom:12px">

                <div>
                    <label style="font-size:14px;font-weight:600">From Date</label>
                    <input type="date" id="stool_from_date" onchange="loadStoolRegister()">
                </div>

                <div>
                    <label style="font-size:14px;font-weight:600">To Date</label>
                    <input type="date" id="stool_to_date" onchange="loadStoolRegister()">
                </div>

                <div>
                    <label style="font-size:14px;font-weight:600">Location</label>
                    <input type="text" name="location" id="stool_location" list="stoolLocationList"
                        onchange="loadStoolRegister()">
                    <datalist id="stoolLocationList">
                        <option value="Lab-1">
                        <option value="Lab-2">
                        <option value="Lab-3">
                    </datalist>
                </div>

            </div>

            {{-- ================= TABLE ================= --}}
            <table class="min-w-full border-collapse border" border="1" cellspacing="0" cellpadding="4"
                style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr class="bg-gray-100">
                        <th>S. No.</th>
                        <th>Date</th>
                        <th>SIN No.</th>
                        <th>Patient name</th>
                        <th>Age/sex</th>
                        <th>Analyte name</th>
                        <th>Colour</th>
                        <th>Consistency</th>
                        <th>Mucus</th>
                        <th>Blood</th>
                        <th>Worms</th>
                        <th>Reducing Substance</th>
                        <th>Reaction</th>
                        <th>Pus cells</th>
                        <th>Epithelial Cells</th>
                        <th>RBC</th>
                        <th>Macrophages</th>
                        <th>Fat Globulins</th>
                        <th>Starch Granules</th>
                        <th>Ova</th>
                        <th>Cyst</th>
                        <th>Larva</th>
                        <th>Undigested food Particles</th>
                        <th>Occult Blood</th>
                        <th>Others</th>
                        <th>Done By</th>
                        <th>Verified By</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- 🔹 ONLY ONE ROW --}}
                    <tr>
                        <td><input type="text" name="sno[]" class="w-full"></td>
                        <td><input type="date" name="date[]" class="w-full"></td>
                        <td><input type="text" name="sin_no[]" class="w-full"></td>
                        <td><input type="text" name="patient_name[]" class="w-full"></td>
                        <td><input type="text" name="age_sex[]" class="w-full"></td>
                        <td><input type="text" name="analyte_name[]" class="w-full"></td>
                        <td><input type="text" name="colour[]" class="w-full"></td>
                        <td><input type="text" name="consistency[]" class="w-full"></td>
                        <td><input type="text" name="mucus[]" class="w-full"></td>
                        <td><input type="text" name="blood[]" class="w-full"></td>
                        <td><input type="text" name="worms[]" class="w-full"></td>
                        <td><input type="text" name="reducing_substance[]" class="w-full"></td>
                        <td><input type="text" name="reaction[]" class="w-full"></td>
                        <td><input type="text" name="pus_cells[]" class="w-full"></td>
                        <td><input type="text" name="epithelial_cells[]" class="w-full"></td>
                        <td><input type="text" name="rbc[]" class="w-full"></td>
                        <td><input type="text" name="macrophages[]" class="w-full"></td>
                        <td><input type="text" name="fat_globulins[]" class="w-full"></td>
                        <td><input type="text" name="starch_granules[]" class="w-full"></td>
                        <td><input type="text" name="ova[]" class="w-full"></td>
                        <td><input type="text" name="cyst[]" class="w-full"></td>
                        <td><input type="text" name="larva[]" class="w-full"></td>
                        <td><input type="text" name="undigested_food[]" class="w-full"></td>
                        <td><input type="text" name="occult_blood[]" class="w-full"></td>
                        <td><input type="text" name="others[]" class="w-full"></td>
                        <td><input type="text" name="done_by[]" class="w-full"></td>
                        <td><input type="text" name="verified_by[]" class="w-full"></td>
                        <td><input type="text" name="remarks[]" class="w-full"></td>
                    </tr>
                </tbody>
            </table>
        </x-formTemplete>

        <x-formTemplete id="TDPL/CP/REG-003" docNo="TDPL/CP/REG-003" docName="Urine Examination Result Register"
            issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('cp.forms.submit') }}">

            {{-- 🔑 INLINE EDIT ID --}}
            <input type="hidden" name="urine_register_id" id="urine_register_id">

            {{-- ================= FILTERS ================= --}}
            <div style="display:flex;gap:16px;margin-bottom:12px">

                <div>
                    <label>From Date</label>
                    <input type="date" id="urine_from_date" onchange="loadUrineRegister()">
                </div>

                <div>
                    <label>To Date</label>
                    <input type="date" id="urine_to_date" onchange="loadUrineRegister()">
                </div>

            </div>

            {{-- ================= TABLE ================= --}}
            <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>SIN No</th>
                        <th>Patient Name</th>
                        <th>Age/Sex</th>
                        <th>Quantity</th>
                        <th>Colour</th>
                        <th>Appearance</th>
                        <th>Blood</th>
                        <th>Bilirubin</th>
                        <th>Urobilinogen</th>
                        <th>Ketone</th>
                        <th>Glucose</th>
                        <th>Protein</th>
                        <th>pH</th>
                        <th>Nitrites</th>
                        <th>Leucocytosis</th>
                        <th>Specific Gravity</th>
                        <th>Pus Cells</th>
                        <th>Epithelial Cells</th>
                        <th>RBCs</th>
                        <th>Others</th>
                        <th>Done By</th>
                        <th>Verified By</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody id="urine_register_body">
                    {{-- 🔹 SINGLE ROW --}}
                    <tr>
                        <td><input name="sno[]" /></td>
                        <td><input type="date" name="date[]" /></td>
                        <td><input name="sin_no[]" /></td>
                        <td><input name="patient_name[]" /></td>
                        <td><input name="age_sex[]" /></td>
                        <td><input name="quantity[]" /></td>
                        <td><input name="colour[]" /></td>
                        <td><input name="appearance[]" /></td>
                        <td><input name="blood[]" /></td>
                        <td><input name="bilirubin[]" /></td>
                        <td><input name="urobilinogen[]" /></td>
                        <td><input name="ketone[]" /></td>
                        <td><input name="glucose[]" /></td>
                        <td><input name="protein[]" /></td>
                        <td><input name="ph[]" /></td>
                        <td><input name="nitrites[]" /></td>
                        <td><input name="leucocytosis[]" /></td>
                        <td><input name="specific_gravity[]" /></td>
                        <td><input name="pus_cells[]" /></td>
                        <td><input name="epithelial_cells[]" /></td>
                        <td><input name="rbcs[]" /></td>
                        <td><input name="others[]" /></td>
                        <td><input name="done_by[]" /></td>
                        <td><input name="verified_by[]" /></td>
                        <td><input name="remarks[]" /></td>
                    </tr>
                </tbody>
            </table>

        </x-formTemplete>



    </body>
    <script>
        function showSection(sectionId) {


            // Add 'inactive' class to all main sections
            const sections = document.querySelectorAll('.main');
            sections.forEach(section => section.classList.add('inactive'));

            // Remove 'inactive' and add 'active' class to the selected section
            const selectedSection = document.getElementById(sectionId);
            selectedSection.classList.remove('inactive');
            selectedSection.classList.add('active');


        }

        function goBack() {
            // Hide all main sections by adding 'inactive' class
            const sections = document.querySelectorAll('.main');
            sections.forEach(section => {
                section.classList.remove('active');
                section.classList.add('inactive');
            });
            // Show the icon view
            document.querySelector('.icon-view').parentElement.classList.remove('inactive');
        }

        // Add new row to tests table
        document.getElementById('addRowBtn1').addEventListener('click', function() {
            const tbody = document.querySelector('#testsTable tbody');
            const newRow = tbody.insertRow();
            const rowCount = tbody.rows.length;

            // Create cells
            ['', '', '', '', '', ''].forEach((content, index) => {
                const cell = newRow.insertCell();
                cell.contentEditable = 'true';
                cell.textContent = index === 0 ? rowCount : content;
            });
        });

        // Submit form data
        document.getElementById('submitBtn1').addEventListener('click', function() {
            // Get analyzer data
            // const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
            // const analyzerData = {
            //     department: analyzerRows[0].cells[1].textContent.trim(),
            //     analyzer_sr_no: analyzerRows[1].cells[1].textContent.trim(),
            //     analyzer_type: analyzerRows[2].cells[1].textContent.trim(),
            //     validation: analyzerRows[3].cells[1].textContent.trim(),
            //     remarks: analyzerRows[5].cells[1].textContent.trim()
            // };

            // Get tests data
            const testRows = document.querySelectorAll('#testsTable tbody tr');
            const testsData = [];

            testRows.forEach(row => {
                const cells = row.cells;
                testsData.push({
                    sr_no: cells[0].textContent.trim(),
                    device: cells[1].textContent.trim(),
                    assay_code: cells[2].textContent.trim(),
                    test_name: cells[3].textContent.trim(),
                    equipment: cells[4].textContent.trim(),
                    lis: cells[5].textContent.trim()
                });
            });

            // Prepare complete data
            const formData = {
                // analyzer: analyzerData,
                tests: testsData
            };

            // Send to server
            fetch('/lis-interface-logs-store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data saved successfully!');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        });

        // Load saved data
        function loadLisData() {
            fetch('/lis-interface-logs')
                .then(response => response.json())
                .then(data => {
                    // if (data.analyzer) {
                    //     // Update analyzer table
                    //     const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
                    //     analyzerRows[1].cells[1].textContent = data.analyzer.analyzer_sr_no || '';
                    //     analyzerRows[2].cells[1].textContent = data.analyzer.analyzer_type || '';
                    //     analyzerRows[5].cells[1].textContent = data.analyzer.remarks || '';
                    // }

                    if (data.tests && data.tests.length > 0) {
                        // Update tests table
                        const tbody = document.querySelector('#testsTable tbody');

                        // Clear existing rows
                        while (tbody.rows.length > 0) {
                            tbody.deleteRow(0);
                        }

                        // Add new rows with data
                        data.tests.forEach((test, index) => {
                            const newRow = tbody.insertRow();
                            newRow.innerHTML = `
                                                                                <td contenteditable="true">${index + 1}</td>
                                                                                <td contenteditable="true">${test.device || ''}</td>
                                                                                <td contenteditable="true">${test.assay_code || ''}</td>
                                                                                <td contenteditable="true">${test.test_name || ''}</td>
                                                                                <td contenteditable="true">${test.equipment || ''}</td>
                                                                                <td contenteditable="true">${test.lis || ''}</td>
                                                                            `;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error loading data:', error);
                });
        }

        // Load data when page loads
        document.addEventListener('DOMContentLoaded', loadLisData);


        // Helper function to safely escape the ID
        function escapeSelector(selector) {
            return selector.replace(/([!\"#$%&'()*+,\-./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
    }

    // Submit form function


    function loadDailyUrineQcForm() {

        const monthYear = document.querySelector('[name="month_year"]').value;
        const instrument = document.querySelector('[name="instrument_id"]').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/cp/urine-qc/load?month_year=${monthYear}&instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearDailyUrineQcForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('urine_qc_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID (MOST IMPORTANT)
                document.getElementById('urine_qc_form_id').value = res.data.id;

                /* =========================
                   HEADER FIELDS
                ========================= */
                [
                    'lot_no',
                    'expiry_date',
                    'level',
                    'instrument_name',
                    'instrument_id'
                ].forEach(field => {

                    const el = document.querySelector(`[name="${field}"]`);
                    if (!el) return;

                    el.value = res.data[field] ?? '';
                });

                /* =========================
                   DAILY JSON (DAY → FIELD)
                ========================= */
                if (!res.data.data) return;

                Object.keys(res.data.data).forEach(day => {

                    Object.keys(res.data.data[day]).forEach(field => {

                        const input = document.querySelector(
                            `input[name="data[${day}][${field}]"]`
                        );

                        if (!input) return;

                        input.value = res.data.data[day][field] ?? '';
                    });
                });
            });
    }

    function clearDailyUrineQcForm() {

        document.querySelectorAll('input').forEach(input => {

            // ❌ DO NOT CLEAR CSRF TOKEN
            if (input.name === '_token') return;

            // ❌ DO NOT CLEAR DOC NO
            if (input.name === 'doc_no') return;

            // ❌ DO NOT CLEAR MONTH FILTER
            if (input.name === 'month_year') return;

            // ❌ DO NOT CLEAR INLINE EDIT ID
            if (input.id === 'urine_qc_form_id') return;

            input.value = '';
        });
    }


    function loadCueForm() {

        const monthYear = document.getElementById('cue_month_year').value;
        const instrument = document.getElementById('cue_instrument_id').value;

        // ❗ GLOBAL RULE – Month mandatory (SAME AS QC)
        if (!monthYear) return;

        fetch(`/cp/manual-cue/load?month_year=${monthYear}&instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                // 🔑 ALWAYS CLEAR FIRST (SAME PATTERN)
                clearCueRows();

                if (!res.data) {
                    document.getElementById('cue_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('cue_form_id').value = res.data.id;

                /* =========================
                   ROW JSON (INDEX → FIELD)
                ========================= */
                if (!res.data.rows) return;

                Object.keys(res.data.rows).forEach(row => {

                    Object.keys(res.data.rows[row]).forEach(field => {

                        const input = document.getElementById(
                            `cue_rows_${row}_${field}`
                        );

                        if (!input) return;

                        input.value = res.data.rows[row][field] ?? '';
                    });
                });
            });
    }

    /* =========================
       CLEAR FUNCTION (SAFE)
    ========================= */
    function clearCueRows() {

        // ❌ DO NOT CLEAR CSRF TOKEN
        if (input.name === '_token') return;

        // ❌ DO NOT CLEAR DOC NO
        if (input.name === 'doc_no') return;


        document.querySelectorAll('[id^="cue_rows_"]').forEach(input => {
            input.value = '';
        });
    }

    function loadStoolRegister() {

        const fromDate = document.getElementById('stool_from_date').value;
        const toDate = document.getElementById('stool_to_date').value;

        if (!fromDate && !toDate) return;

        fetch(`/cp/stool-register/load?from_date=${fromDate}&to_date=${toDate}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(res => {

                const tbody = document.querySelector('#TDPL\\/CP\\/REG-002 tbody');
                tbody.innerHTML = '';

                if (!res.data || res.data.length === 0) return;

                res.data.forEach(row => {

                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                                                                        <td><input name="sno[]" value="${row.sno ?? ''}"></td>
                                                                        <td><input type="date" name="date[]" value="${row.stool_date ?? ''}"></td>
                                                                        <td><input name="sin_no[]" value="${row.sin_no ?? ''}"></td>
                                                                        <td><input name="patient_name[]" value="${row.patient_name ?? ''}"></td>
                                                                        <td><input name="age_sex[]" value="${row.age_sex ?? ''}"></td>
                                                                        <td><input name="analyte_name[]" value="${row.analyte_name ?? ''}"></td>
                                                                        <td><input name="colour[]" value="${row.colour ?? ''}"></td>
                                                                        <td><input name="consistency[]" value="${row.consistency ?? ''}"></td>
                                                                        <td><input name="mucus[]" value="${row.mucus ?? ''}"></td>
                                                                        <td><input name="blood[]" value="${row.blood ?? ''}"></td>
                                                                        <td><input name="worms[]" value="${row.worms ?? ''}"></td>
                                                                        <td><input name="reducing_substance[]" value="${row.reducing_substance ?? ''}"></td>
                                                                        <td><input name="reaction[]" value="${row.reaction ?? ''}"></td>
                                                                        <td><input name="pus_cells[]" value="${row.pus_cells ?? ''}"></td>
                                                                        <td><input name="epithelial_cells[]" value="${row.epithelial_cells ?? ''}"></td>
                                                                        <td><input name="rbc[]" value="${row.rbc ?? ''}"></td>
                                                                        <td><input name="macrophages[]" value="${row.macrophages ?? ''}"></td>
                                                                        <td><input name="fat_globulins[]" value="${row.fat_globulins ?? ''}"></td>
                                                                        <td><input name="starch_granules[]" value="${row.starch_granules ?? ''}"></td>
                                                                        <td><input name="ova[]" value="${row.ova ?? ''}"></td>
                                                                        <td><input name="cyst[]" value="${row.cyst ?? ''}"></td>
                                                                        <td><input name="larva[]" value="${row.larva ?? ''}"></td>
                                                                        <td><input name="undigested_food[]" value="${row.undigested_food ?? ''}"></td>
                                                                        <td><input name="occult_blood[]" value="${row.occult_blood ?? ''}"></td>
                                                                        <td><input name="others[]" value="${row.others ?? ''}"></td>
                                                                        <td><input name="done_by[]" value="${row.done_by ?? ''}"></td>
                                                                        <td><input name="verified_by[]" value="${row.verified_by ?? ''}"></td>
                                                                        <td><input name="remarks[]" value="${row.remarks ?? ''}"></td>
                                                                    `;

                    tbody.appendChild(tr);
                });
            });
    }



    function clearStoolRegisterForm() {
        document.querySelectorAll('#TDPL\\/CP\\/REG-002 input').forEach(input => {

            // ❌ DO NOT CLEAR FILTERS
            if (
                input.id === 'stool_from_date' ||
                input.id === 'stool_to_date' ||
                input.id === 'stool_location'
            ) return;

            // ❌ DO NOT CLEAR CSRF & DOC NO
            if (input.name === '_token') return;
            if (input.name === 'doc_no') return;

            input.value = '';
        });
    }


    function loadUrineRegister() {

        const fromDate = document.getElementById('urine_from_date').value;
        const toDate = document.getElementById('urine_to_date').value;

        // ❗ at least one filter required
        if (!fromDate && !toDate) return;

        fetch(`/cp/urine-register/load?from_date=${fromDate}&to_date=${toDate}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(res => {

                clearUrineRegisterForm();

                const tbody = document.getElementById('urine_register_body');
                if (!tbody || !res.data || res.data.length === 0) return;

                res.data.forEach(row => {

                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                            <td>
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="sno[]" value="${row.sno ?? ''}">
                            </td>
                            <td><input type="date" name="date[]" value="${row.urine_date ?? ''}"></td>
                            <td><input name="sin_no[]" value="${row.sin_no ?? ''}"></td>
                            <td><input name="patient_name[]" value="${row.patient_name ?? ''}"></td>
                            <td><input name="age_sex[]" value="${row.age_sex ?? ''}"></td>
                            <td><input name="quantity[]" value="${row.quantity ?? ''}"></td>
                            <td><input name="colour[]" value="${row.colour ?? ''}"></td>
                            <td><input name="appearance[]" value="${row.appearance ?? ''}"></td>
                            <td><input name="blood[]" value="${row.blood ?? ''}"></td>
                            <td><input name="bilirubin[]" value="${row.bilirubin ?? ''}"></td>
                            <td><input name="urobilinogen[]" value="${row.urobilinogen ?? ''}"></td>
                            <td><input name="ketone[]" value="${row.ketone ?? ''}"></td>
                            <td><input name="glucose[]" value="${row.glucose ?? ''}"></td>
                            <td><input name="protein[]" value="${row.protein ?? ''}"></td>
                            <td><input name="ph[]" value="${row.ph ?? ''}"></td>
                            <td><input name="nitrites[]" value="${row.nitrites ?? ''}"></td>
                            <td><input name="leucocytosis[]" value="${row.leucocytosis ?? ''}"></td>
                            <td><input name="specific_gravity[]" value="${row.specific_gravity ?? ''}"></td>
                            <td><input name="pus_cells[]" value="${row.pus_cells ?? ''}"></td>
                            <td><input name="epithelial_cells[]" value="${row.epithelial_cells ?? ''}"></td>
                            <td><input name="rbcs[]" value="${row.rbcs ?? ''}"></td>
                            <td><input name="others[]" value="${row.others ?? ''}"></td>
                            <td><input name="done_by[]" value="${row.done_by ?? ''}"></td>
                            <td><input name="verified_by[]" value="${row.verified_by ?? ''}"></td>
                            <td><input name="remarks[]" value="${row.remarks ?? ''}"></td>
                        `;

                        tbody.appendChild(tr);
                    });
                });
        }

        function clearUrineRegisterForm() {

            const tbody = document.getElementById('urine_register_body');
            if (tbody) tbody.innerHTML = '';

            const editId = document.getElementById('urine_register_id');
            if (editId) editId.value = '';

            // ❌ DO NOT clear:
            // - from_date
            // - to_date
            // - _token
            // - doc_no
        }
    </script>


    </html>
@endsection
