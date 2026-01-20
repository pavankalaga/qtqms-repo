@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EQAS Planner</title>
        <!-- FullCalendar CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>
    <style>
        .multi-select-container {
            width: 300px;
            position: relative;
            font-size: 14px;
        }

        .multi-select-dropdown {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            background: #f9f9f9;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .multi-select-dropdown span {
            margin: 5px;
            background-color: #007BFF;
            color: white;
            padding: 5px;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
        }

        .multi-select-dropdown span button {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 12px;
            margin-left: 5px;
        }

        .multi-select-dropdown::after {
            content: '▼';
            margin-left: auto;
            color: #666;
        }

        .dropdown-options {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1000;
        }

        .dropdown-options label {
            display: block;
            padding: 8px;
            cursor: pointer;
            user-select: none;
        }

        .dropdown-options label:hover {
            background: #007BFF;
            color: white;
        }

        .multi-select-container.active .dropdown-options {
            display: block;
        }

        .form-section-unique {
            margin-bottom: 20px;
        }

        .parameter-table-unique {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .parameter-table-unique,
        .parameter-table-unique th,
        .parameter-table-unique td {
            border: 1px solid #ddd;
        }

        .parameter-table-unique th,
        .parameter-table-unique td {
            padding: 10px;
            text-align: left;
        }

        .parameter-table-unique select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-row-btn-unique {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        .add-row-btn-unique:hover {
            background-color: #0056b3;
        }

        .eqas-container {

            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .eqas-title {
            text-align: center;
            color: #333;
        }

        .eqas-filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .eqas-filter-section select,
        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .eqas-table {
            width: 100%;
            border-collapse: collapse;
        }

        .eqas-table th,
        .eqas-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .eqas-table th {
            background-color: #f4f4f4;
            color: #333;
        }

        .eqas-add-new {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .eqas-add-new button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .eqas-add-new button:hover {
            background-color: #0056b3;
        }

        .frequency-checkbox {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            justify-content: center;
        }

        .frequency-checkbox label {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* From Uiverse.io by vishnupprajapat */
        .checkbox-wrapper-46 input[type="checkbox"] {
            display: none;
            visibility: hidden;
        }

        .checkbox-wrapper-46 .cbx {
            margin: auto;
            -webkit-user-select: none;
            user-select: none;
            cursor: pointer;
        }

        .checkbox-wrapper-46 .cbx span {
            display: inline-block;
            vertical-align: middle;
            transform: translate3d(0, 0, 0);
        }

        .checkbox-wrapper-46 .cbx span:first-child {
            position: relative;
            width: 18px;
            height: 18px;
            border-radius: 3px;
            transform: scale(1);
            vertical-align: middle;
            border: 1px solid #9098a9;
            transition: all 0.2s ease;
        }

        .checkbox-wrapper-46 .cbx span:first-child svg {
            position: absolute;
            top: 3px;
            left: 2px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 16px;
            stroke-dashoffset: 16px;
            transition: all 0.3s ease;
            transition-delay: 0.1s;
            transform: translate3d(0, 0, 0);
        }

        .checkbox-wrapper-46 .cbx span:first-child:before {
            content: "";
            width: 100%;
            height: 100%;
            background: #506eec;
            display: block;
            transform: scale(0);
            opacity: 1;
            border-radius: 50%;
        }

        .checkbox-wrapper-46 .cbx span:last-child {
            padding-left: 8px;
        }

        .checkbox-wrapper-46 .cbx:hover span:first-child {
            border-color: #506eec;
        }

        .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child {
            background: #506eec;
            border-color: #506eec;
            animation: wave-46 0.4s ease;
        }

        .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child svg {
            stroke-dashoffset: 0;
        }

        .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child:before {
            transform: scale(3.5);
            opacity: 0;
            transition: all 0.6s ease;
        }

        @keyframes wave-46 {
            50% {
                transform: scale(0.9);
            }
        }

        .panel1 {

            overflow: auto;
            top: 50px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: calc(100% - 120px);
            height: 90%;
            background: #f8f9fa;
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
            padding: 0 20px;
            transition: 0.5s ease;
        }

        .panel1.open {
            right: 0;
            bottom: 0;
            margin: 20px;
            z-index: 1000;
        }

        .closeBtn1 {
            /* overflow: auto; */
            top: 52px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: 30px;
            height: 30px;
            background: #ff2222;
            padding: 5px;
            transition: 0.5s ease;
            border-radius: 50% 0 0 50%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            color: #f8f9fa;
            font-weight: 700;
            cursor: pointer;
        }

        .closeBtn1.opened {
            right: calc(100% - 100px);
            top: 100px;
            z-index: 1000;
        }

        .eqas-modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: calc(100vh);
            background-color: rgba(0, 0, 0, 0.4);
            overflow: auto;
        }

        .eqas-modal-content {
            background-color: #fefefe;
            margin: 8% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            overflow: auto;
        }

        .eqas-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .eqas-close:hover,
        .eqas-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .eqas-selected-items {
            margin-top: 10px;
        }



        .form-container-sub {
            margin-top: 1rem;
            /* background: #fff; */
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
            width: 99%;

        }

        .form-container-sub h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-container-sub form {
            display: flex;
            /* flex-direction: column; */
        }

        .form-container-sub label {
            margin-bottom: 5px;
            /* color: #555; */
            font-weight: 700;
            width: 100%;
            font-size: 14px;
        }

        .form-container-sub input,
        .form-container-sub select,
        .form-container-sub textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-container-sub input:focus,
        .form-container-sub select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container-sub button {
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            margin: 1rem 0;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container-sub button:hover {
            background-color: #0056b3;
        }

        .form-container-sub input[type="file"] {
            padding: 5px;
            width: 100%;
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">ILC Planner</div>
                <div style="font-size: 20px;display:flex;gap: 10px;">
                    @if(auth()->user()->role == 1)
                        <select id="labDropdown" name="lab" class="form-select" style="width: 200px;" onchange="fetchILCData()">
                            <option value="">-- Select Labs --</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}" }}>
                                    {{ $lab->location }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" value="{{ auth()->user()->lab->location ?? 'My Lab' }}" disabled class="form-control"
                            style="width: 200px;">
                        <input type="hidden" id="labDropdown" name="lab" value="{{ auth()->user()->lab_id }}">
                    @endif
                    <!-- <button type="button" class="btn btn-warning">Submit</button> -->
                </div>
            </div>

            <form id="eqas-form">
                <div class="table-responsive">
                    <div class="eqas-container">
                        <div class="eqas-filter-section">
                            <!--  <div>
                                                                    <label for="eqas-department">Select Dept:</label>
                                                                    <select id="eqas-department" name="department" required>
                                                                        <option value="" disabled selected>-- Select Department --</option>
                                                                        @foreach ($departs as $department)
                                                                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div> -->
                            <div>
                                <label for="eqas-year">Select Year:</label>
                                <input type="number" id="eqas-year" name="year" min="1900" max="2100" placeholder="YYYY"
                                    value="2025" required>
                            </div>
                        </div>

                        <!-- <table class="eqas-table" id="eqas-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2">S. No</th>
                                                                        <th rowspan="2">EQAS Provider</th>
                                                                        <th rowspan="2">EQAS Name</th>
                                                                        <th colspan="12">Frequency (Months)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Jan</th>
                                                                        <th>Feb</th>
                                                                        <th>Mar</th>
                                                                        <th>Apr</th>
                                                                        <th>May</th>
                                                                        <th>Jun</th>
                                                                        <th>Jul</th>
                                                                        <th>Aug</th>
                                                                        <th>Sep</th>
                                                                        <th>Oct</th>
                                                                        <th>Nov</th>
                                                                        <th>Dec</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td><input type="text" name="eqas[0][provider]" required></td>
                                                                        <td><input type="text" name="eqas[0][name]" required></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Jan"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Feb"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Mar"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Apr"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="May"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Jun"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Jul"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Aug"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Sep"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Oct"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Nov"></td>
                                                                        <td><input type="checkbox" name="eqas[0][months][]" value="Dec"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> -->

                        <table class="eqas-table" id="eqas-table">
                            <thead>
                                <tr>
                                    <th rowspan="2">S. No</th>
                                    <th rowspan="2">ILC Provider</th>
                                    <th rowspan="2">ILC Name</th>
                                    <th rowspan="2">Department</th>
                                    <th colspan="12">Frequency (Months)</th>
                                </tr>
                                <tr>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Aug</th>
                                    <th>Sep</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dec</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="eqas[0][provider]" required></td>
                                                <td><input type="text" name="eqas[0][name]" required></td>
                                                <td><input type="text" name="eqas[0][department]" required></td>


                                                <td><input type="text" class="month-datepicker" data-month="0" name="eqas[0][dates][Jan]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="1" name="eqas[0][dates][Feb]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="2" name="eqas[0][dates][Mar]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="3" name="eqas[0][dates][Apr]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="4" name="eqas[0][dates][May]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="5" name="eqas[0][dates][Jun]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="6" name="eqas[0][dates][Jul]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="7" name="eqas[0][dates][Aug]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="8" name="eqas[0][dates][Sep]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="9" name="eqas[0][dates][Oct]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="10" name="eqas[0][dates][Nov]"></td>
                                                <td><input type="text" class="month-datepicker" data-month="11" name="eqas[0][dates][Dec]"></td>
                                            </tr>
                                        </tbody> -->

                            <tbody>
                                <tr>
                                    <td colspan="16" class="text-center text-muted">Select a lab</td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="eqas-add-new">
                            <button type="button" id="add-row-button">Add New ILC</button>
                        </div>

                        <div class="eqas-submit">
                            <button type="submit" class="btn btn-warning" id="submit-button">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </body>

    <script>
        const departments = @json($departs);
    </script>

    <script>
        let eqasOptions = {
            providers: [],
            names: []
        };

        fetch('/ilc-options')
            .then(res => res.json())
            .then(data => {
                eqasOptions = data;
            });


        $(document).ready(function () {
            $(".month-datepicker").each(function () {
                const input = $(this);
                const allowedMonth = parseInt(input.data("month")); // 0 for Jan, 11 for Dec

                input.datepicker({
                    dateFormat: 'dd-mm-yy',
                    beforeShowDay: function (date) {
                        return [date.getMonth() === allowedMonth, ""];
                    },
                    changeMonth: false,
                    changeYear: true,
                });
            });
        });
    </script>


    <script>
        function callmodel() {
            // Get all modal triggers
            const openModalBtns = document.querySelectorAll('.open-modal-btn');
            const modals = document.querySelectorAll('.eqas-modal');
            // const closeBtns = document.querySelectorAll('.close');
            const confirmBtns = document.querySelectorAll('.confirm-selection');
            const modalOptions = document.querySelectorAll('.eqas-modal-option');

            // Open modal for each button
            openModalBtns.forEach((button, index) => {
                const modal = modals[index];
                const selectionDiv = button.nextElementSibling;
                const confirmBtn = confirmBtns[index];

                button.addEventListener('click', () => {
                    modal.style.display = 'block';
                });

                // Close the modal
                // closeBtns[index].addEventListener('click', () => {
                //     modal.style.display = 'none';
                // });

                // Handle confirm selection
                confirmBtn.addEventListener('click', () => {
                    const selectedOptions = [];

                    // Gather all selected options
                    modal.querySelectorAll('.eqas-modal-option:checked').forEach(option => {
                        selectedOptions.push(option.dataset.option);
                    });

                    // Show selected options below the button
                    if (selectedOptions.length > 0) {
                        selectionDiv.innerHTML = `Selected: ${selectedOptions.join(', ')}`;
                    } else {
                        selectionDiv.innerHTML = 'No options selected.';
                    }

                    // Close the modal
                    modal.style.display = 'none';
                });
            });

            // Close modal if clicked outside
            window.addEventListener('click', (e) => {
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });
        }
        callmodel()
    </script>
    <script>
        function openDocument1() {

            document.getElementById('documentClose1').classList.add('opened');
            document.getElementById('documentOpen1').classList.add('open');
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');

        }

        // document.getElementById('add-row-button').addEventListener('click', function () {
        //     const table = document.getElementById('eqas-table').getElementsByTagName('tbody')[0];
        //     const rowCount = table.rows.length + 1;

        //     const newRow = document.createElement('tr');
        //     newRow.innerHTML = `
        //             <td>${rowCount}</td>
        //             <td><input type="text" placeholder="Enter Provider"></td>
        //             <td><input type="text" placeholder="Enter Test Name"></td>
        //             <td><div class="checkbox-wrapper-46">
        //                     <input type="checkbox" id="cbx-${rowCount}-Jan" class="inp-cbx" />
        //                     <label for="cbx-${rowCount}-Jan" class="cbx"
        //                         ><span>
        //                         <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                             <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                         >
        //                     </label>
        //             </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Feb" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Feb" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Mar" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Mar" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Apr" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Apr" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-May" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-May" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //             <input type="checkbox" id="cbx-${rowCount}-Jun" class="inp-cbx" />
        //             <label for="cbx-${rowCount}-Jun" class="cbx"
        //                 ><span>
        //                 <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                     <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                 >
        //             </label>
        //             </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //             <input type="checkbox" id="cbx-${rowCount}-Jul" class="inp-cbx" />
        //             <label for="cbx-${rowCount}-Jul" class="cbx"
        //                 ><span>
        //                 <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                     <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                 >
        //             </label>
        //             </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Aug" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Aug" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Sep" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Sep" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //                 <input type="checkbox" id="cbx-${rowCount}-Oct" class="inp-cbx" />
        //                 <label for="cbx-${rowCount}-Oct" class="cbx"
        //                     ><span>
        //                     <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                         <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                     >
        //                 </label>
        //                 </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //             <input type="checkbox" id="cbx-${rowCount}-Nov" class="inp-cbx" />
        //             <label for="cbx-${rowCount}-Nov" class="cbx"
        //                 ><span>
        //                 <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                     <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                 >
        //             </label>
        //             </div></td>
        //             <td><div class="checkbox-wrapper-46">
        //             <input type="checkbox" id="cbx-${rowCount}-Dec" class="inp-cbx" />
        //             <label for="cbx-${rowCount}-Dec" class="cbx"
        //                 ><span>
        //                 <svg viewBox="0 0 12 10" height="10px" width="12px">
        //                     <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
        //                 >
        //             </label>
        //             </div></td>

        //             `;
        //     // <td> <input type="reset" value="Remove" class="m-10"></td>

        //     table.appendChild(newRow);
        // });


        function fetchILCData() {
            const labId = document.getElementById('labDropdown').value;
            // const department = document.getElementById('eqas-department').value;
            const year = document.getElementById('eqas-year').value;

            if (!labId) {
                clearTable();
                return;
            }

            fetch(`/fetch-ilc-data`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    lab_id: labId,
                    // department: department,
                    year: year
                })
            })
                .then(response => response.json())
                .then(data => {

                    console.log(data, 'data fetch equas')
                    populateTable(data);
                })
                .catch(error => {
                    console.error('Error fetching EQAS data:', error);
                    clearTable();
                });





        }

        // function populateTable(data) {
        //     const tableBody = document.querySelector('#eqas-table tbody');
        //     tableBody.innerHTML = ''; // Clear existing rows

        //     if (data.length === 0) {
        //         addNewRow(0);
        //         return;
        //     }

        //     console.log(data,'dataaaaaa')

        //     data.forEach((item, index) => {
        //         const row = document.createElement('tr');
        //         row.innerHTML = `
        //             <td>${index + 1}</td>
        //             <td><input type="text" name="eqas[${index}][provider]" class="form-control" value="${item.provider || ''}" required></td>
        //             <td><input type="text" name="eqas[${index}][name]" class="form-control" value="${item.eqas_name || ''}" required></td>
        //             ${generateMonthDatePickers(index, item.months_selected || {})}
        //         `;
        //         tableBody.appendChild(row);
        //     });

        //     initializeAllMonthDatePickers();
        // }

        function populateTable(data) {
            const tableBody = document.querySelector('#eqas-table tbody');
            tableBody.innerHTML = ''; // Clear existing rows

            if (!data || data.length === 0) {
                addNewRow(0);
                return;
            }

            data.forEach((item, index) => {
                // Parse the months_selected
                let monthsData = {};
                if (item.months_selected) {
                    try {
                        const parsedMonths = typeof item.months_selected === 'string'
                            ? JSON.parse(item.months_selected)
                            : item.months_selected;

                        if (Array.isArray(parsedMonths)) {
                            const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                            parsedMonths.forEach((date, i) => {
                                if (date) monthsData[monthNames[i]] = date;
                            });
                        }
                    } catch (e) {
                        console.error('Error parsing months data:', e);
                    }
                }

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    ${generateProviderDropdown(index, item.provider)}
                    ${generateNameDropdown(index, item.ilc_name)}
                    ${generateDepartmentDropdown(index, item.department)}
                    ${generateMonthDateInputs(index, monthsData)}
                `;
                tableBody.appendChild(row);
            });

            // Add one empty row for new entries
            addNewRow(data.length);

            initializeAllMonthDatePickers();
        }
        function generateDepartmentDropdown(index, selectedDepartmentId) {
            let options = '<option value="">Select Department</option>';
            departments.forEach(department => {
                console.log(department.id, selectedDepartmentId, 'selectedDepartmentId')
                const selected = department.name == selectedDepartmentId ? 'selected' : '';
                options += `<option value="${department.name}" ${selected}>${department.name}</option>`;
            });

            return `
                                            <td>
                                                <select name="eqas[${index}][department]" class="form-control" required>
                                                    ${options}
                                                </select>
                                            </td>
                                        `;
        }

        function generateMonthDatePickers(rowIndex, selectedDates = {}) {
            const months = [
                { name: 'Jan', index: 0 },
                { name: 'Feb', index: 1 },
                { name: 'Mar', index: 2 },
                { name: 'Apr', index: 3 },
                { name: 'May', index: 4 },
                { name: 'Jun', index: 5 },
                { name: 'Jul', index: 6 },
                { name: 'Aug', index: 7 },
                { name: 'Sep', index: 8 },
                { name: 'Oct', index: 9 },
                { name: 'Nov', index: 10 },
                { name: 'Dec', index: 11 },
            ];

            return months.map(month => `
                                            <td>
                                                <input 
                                                    type="text" 
                                                    class="month-datepicker form-control" 
                                                    name="eqas[${rowIndex}][dates][${month.name}]" 
                                                    data-month="${month.index}" 
                                                    value="${selectedDates[month.name] || ''}" 
                                                    readonly
                                                >
                                            </td>
                                        `).join('');
        }

        function clearTable() {
            const tableBody = document.querySelector('#eqas-table tbody');
            tableBody.innerHTML = '';
            addNewRow(0);
        }

        // function addNewRow(rowCount) {
        //     const tableBody = document.querySelector('#eqas-table tbody');
        //     const newRow = document.createElement('tr');
        //     newRow.innerHTML = `
        //         <td>${rowCount + 1}</td>
        //         <td><input type="text" name="eqas[${rowCount}][provider]" class="form-control" required></td>
        //         <td><input type="text" name="eqas[${rowCount}][name]" class="form-control" required></td>
        //         ${generateMonthDatePickers(rowCount, {})}
        //     `;
        //     tableBody.appendChild(newRow);

        //     initializeAllMonthDatePickers();
        // }

        function addNewRow(rowCount) {
            const tableBody = document.querySelector('#eqas-table tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                                            <td>${rowCount + 1}</td>
                                            ${generateProviderDropdown(rowCount, '')}
                                            ${generateNameDropdown(rowCount, '')}
                                            ${generateDepartmentDropdown(rowCount, '')}
                                            ${generateMonthDateInputs(rowCount, {})}
                                        `;
            tableBody.appendChild(newRow);
            initializeAllMonthDatePickers();
        }


        function generateProviderDropdown(rowIndex, selectedValue = '') {
            const options = eqasOptions.providers.map(provider =>
                `<option value="${provider}" ${provider === selectedValue ? 'selected' : ''}>${provider}</option>`
            ).join('');

            return `<td>
                                            <select name="eqas[${rowIndex}][provider]" class="form-control" style="width:170px" required>
                                                <option value="">Select Provider</option>${options}
                                            </select>
                                        </td>`;
        }

        function generateNameDropdown(rowIndex, selectedValue = '') {

            console.log(eqasOptions, 'eqasOptions')
            const options = eqasOptions.eqas_names.map(name =>
                `<option value="${name}" ${name === selectedValue ? 'selected' : ''}>${name}</option>`
            ).join('');

            return `<td>
                                            <select name="eqas[${rowIndex}][name]" class="form-control"  style="width:170px" required>
                                                <option value="">Select Name</option>${options}
                                            </select>
                                        </td>`;
        }

        function generateMonthDateInputs(rowIndex, selectedDates = {}) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            return months.map((month, i) => `
                    <td>
                        <input type="text" 
                               class="month-datepicker form-control" 
                               data-month="${i}" 
                               name="eqas[${rowIndex}][dates][${month}]" 
                               value="${selectedDates[month] || ''}"
                               placeholder="DD-MM-YYYY"
                               readonly>
                    </td>
                `).join('');
        }

        // Initialize all month-specific datepickers
        function initializeAllMonthDatePickers() {
            $(".month-datepicker").each(function () {
                const input = $(this);
                if (!input.hasClass('ui-datepicker-initialized')) {
                    const allowedMonth = parseInt(input.data("month"));
                    input.datepicker({
                        dateFormat: 'dd-mm-yy',
                        beforeShowDay: function (date) {
                            return [date.getMonth() === allowedMonth, ""];
                        },
                        changeMonth: false,
                        changeYear: true
                    }).addClass('ui-datepicker-initialized');
                }
            });
        }


        //        document.getElementById('add-row-button').addEventListener('click', function () {
        //     const table = document.getElementById('eqas-table').getElementsByTagName('tbody')[0];
        //     const rowCount = table.rows.length;
        //     const newRow = document.createElement('tr');

        //     // Month names and their corresponding indices (0 = Jan, 11 = Dec)
        //     const months = [
        //         { name: "Jan", index: 0 },
        //         { name: "Feb", index: 1 },
        //         { name: "Mar", index: 2 },
        //         { name: "Apr", index: 3 },
        //         { name: "May", index: 4 },
        //         { name: "Jun", index: 5 },
        //         { name: "Jul", index: 6 },
        //         { name: "Aug", index: 7 },
        //         { name: "Sep", index: 8 },
        //         { name: "Oct", index: 9 },
        //         { name: "Nov", index: 10 },
        //         { name: "Dec", index: 11 },
        //     ];

        //     let inputsHtml = '';
        //     months.forEach(month => {
        //         inputsHtml += `<td><input type="text" class="month-datepicker" data-month="${month.index}" name="eqas[${rowCount}][dates][${month.name}]" readonly></td>`;
        //     });

        //     newRow.innerHTML = `
        //         <td>${rowCount + 1}</td>
        //         <td><input type="text" name="eqas[${rowCount}][provider]" required></td>
        //         <td><input type="text" name="eqas[${rowCount}][name]" required></td>
        //         ${inputsHtml}
        //     `;

        //     table.appendChild(newRow);

        //     // Reinitialize datepickers for new inputs
        //     $(".month-datepicker").each(function () {
        //         const input = $(this);
        //         if (!input.hasClass('ui-datepicker-initialized')) {
        //             const allowedMonth = parseInt(input.data("month"));
        //             input.datepicker({
        //                 dateFormat: 'dd-mm-yy',
        //                 beforeShowDay: function (date) {
        //                     return [date.getMonth() === allowedMonth, ""];
        //                 },
        //                 changeMonth: false,
        //                 changeYear: true
        //             }).addClass('ui-datepicker-initialized');
        //         }
        //     });
        // });




        document.getElementById('add-row-button').addEventListener('click', function () {
            const table = document.getElementById('eqas-table').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const newRow = document.createElement('tr');
            const departmentOptions = `{!! collect($departs)->map(function ($department) {
        return "<option value='" . e($department->name) . "'>" . e($department->name) . "</option>";
    })->implode('') !!}`;

            const months = [
                { name: "Jan", index: 0 }, { name: "Feb", index: 1 }, { name: "Mar", index: 2 },
                { name: "Apr", index: 3 }, { name: "May", index: 4 }, { name: "Jun", index: 5 },
                { name: "Jul", index: 6 }, { name: "Aug", index: 7 }, { name: "Sep", index: 8 },
                { name: "Oct", index: 9 }, { name: "Nov", index: 10 }, { name: "Dec", index: 11 }
            ];

            // Generate select options from eqasOptions
            const providerOptions = eqasOptions.providers.map(p => `<option value="${p}">${p}</option>`).join('');
            const nameOptions = eqasOptions.eqas_names.map(n => `<option value="${n}">${n}</option>`).join('');

            let inputsHtml = '';
            months.forEach(month => {
                inputsHtml += `<td><input type="text" class="month-datepicker" data-month="${month.index}" name="eqas[${rowCount}][dates][${month.name}]" readonly></td>`;
            });
            const newRowHtml = `
                                        <select name="eqas[${rowCount}][department]"  class="form-control" style="width:170px" required>
                                            <option value="">Select Department</option>
                                            ${departmentOptions}
                                        </select>
                                    `;

            newRow.innerHTML = `
                                            <td>${rowCount + 1}</td>
                                            <td>
                                                <select name="eqas[${rowCount}][provider]" class="form-control"  required style="width:170px">
                                                    <option value="">Select Provider</option>
                                                    ${providerOptions}
                                                </select>
                                            </td>
                                            <td>
                                                <select name="eqas[${rowCount}][name]" class="form-control" style="width:170px"  required>
                                                    <option value="">Select EQAS Name</option>
                                                    ${nameOptions}
                                                </select>
                                            </td>
                                            <td>
                                                ${newRowHtml}
                                            </td>
                                            ${inputsHtml}
                                        `;

            table.appendChild(newRow);

            // Reinitialize datepickers for new inputs
            $(".month-datepicker").each(function () {
                const input = $(this);
                if (!input.hasClass('ui-datepicker-initialized')) {
                    const allowedMonth = parseInt(input.data("month"));
                    input.datepicker({
                        dateFormat: 'dd-mm-yy',
                        beforeShowDay: function (date) {
                            return [date.getMonth() === allowedMonth, ""];
                        },
                        changeMonth: false,
                        changeYear: true
                    }).addClass('ui-datepicker-initialized');
                }
            });
        });

        document.getElementById('eqas-form').addEventListener('submit', function (event) {
            event.preventDefault();

            // Disable submit button to prevent double submission
            const submitBtn = event.target.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Saving...';

            // Collect form data
            const formData = new FormData(this);
            const labValue = document.getElementById('labDropdown').value;
            const yearValue = document.getElementById('eqas-year').value;
            formData.append('lab', labValue);
            formData.append('year', yearValue);

            // Clear empty rows before submission
            const rows = document.querySelectorAll('#eqas-table tbody tr');
            let emptyRowCount = 0;

            rows.forEach((row, index) => {
                const provider = row.querySelector('[name^="eqas["][name$="][provider]"]').value;
                const name = row.querySelector('[name^="eqas["][name$="][name]"]').value;
                const department = row.querySelector('[name^="eqas["][name$="][department]"]').value;

                // Count empty rows (where all required fields are empty)
                if (!provider && !name && !department) {
                    emptyRowCount++;
                }
            });

            // If all rows are empty, don't submit
            if (emptyRowCount === rows.length) {
                alert('Please add at least one valid entry before submitting.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit';
                return;
            }

            fetch('{{ route("ILCplnr.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => Promise.reject(err));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Form submitted successfully!');
                        location.reload();
                    } else {
                        throw new Error(data.message || 'Unknown error occurred');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit';
                });
        });

    </script>

    </html>

@endsection