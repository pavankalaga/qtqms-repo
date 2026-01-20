@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM</title>
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
            <div style="font-size: 20px; ">SM </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/SE/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">SerologyWork Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Incoming Material Inspection Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Supplier Corrective Action Request & Report</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Expired Reagent and Consumable Supplies Tracking Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent & Consumable Supplies Borrowing Tracking Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent-Consumable Recall Tracking Form</span>
                </div>

            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/SE/REG-001"
        docNo="TDPL/SE/REG-001"
        docName="SerologyWork Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-top:10px;">
            <strong>Date:</strong>
            <input type="date" name="form_date" style=" border:1px solid #000; padding:4px;">
        </p>
        <br>
        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <td style="padding:6px;"><strong>S. No.</strong></td>
                    <td style="padding:6px;"><strong>Barcode</strong></td>
                    <td style="padding:6px;"><strong>Patient Name</strong></td>
                    <td style="padding:6px;"><strong>Age/Gender</strong></td>
                    <td style="padding:6px;"><strong>Investigation</strong></td>

                    <td colspan="2" style="padding:6px; text-align:center;"><strong>Sample Type</strong></td>

                    <td colspan="2" style="padding:6px; text-align:center;">
                        <strong>Sample Received<br>Date/Time</strong>
                    </td>

                    <td style="padding:6px;"><strong>Sample Received by</strong></td>

                    <td style="padding:6px;">
                        <strong>Sample Processing<br>Date/Time</strong>
                    </td>

                    <td colspan="2" style="padding:6px; text-align:center;"><strong>Sample Processed by</strong></td>

                    <td colspan="2" style="padding:6px; text-align:center;"><strong>Observations</strong></td>

                    <td style="padding:6px;"><strong>HoD Signature</strong></td>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,3) as $i)
                <tr>
                    <!-- S.No -->
                    <td style="padding:6px;"><strong>{{ $i }}</strong></td>

                    <!-- Barcode -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][barcode]" style="width:100%; border:none;">
                    </td>

                    <!-- Patient Name -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][patient_name]" style="width:100%; border:none;">
                    </td>

                    <!-- Age / Gender -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][age_gender]" style="width:100%; border:none;">
                    </td>

                    <!-- Investigation -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][investigation]" style="width:100%; border:none;">
                    </td>

                    <!-- Sample Type -->
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sample_type]" style="width:100%; border:none;">
                    </td>

                    <!-- Sample Received Date / Time -->
                    <td colspan="2" style="padding:6px;">
                        <input type="datetime-local" name="rows[{{ $i }}][sample_received]" style="width:100%; border:none;">
                    </td>

                    <!-- Sample Received By -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sample_received_by]" style="width:100%; border:none;">
                    </td>

                    <!-- Sample Processing Date/Time -->
                    <td style="padding:6px;">
                        <input type="datetime-local" name="rows[{{ $i }}][processing_datetime]" style="width:100%; border:none;">
                    </td>

                    <!-- Sample Processed By -->
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][processed_by]" style="width:100%; border:none;">
                    </td>

                    <!-- Observations -->
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][observations]" style="width:100%; border:none;">
                    </td>

                    <!-- HoD Signature -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][hod_signature]" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>


    </x-formTemplete>


    <x-formTemplete
        id="TDPL/SM/FOM-001"
        docNo="TDPL/SM/FOM-001"
        docName="Incoming Material Inspection Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style=" padding: 10px; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); ">

            <!-- Header Section -->
            <div style="text-align: center; margin-bottom: 40px; padding-bottom: 30px; border-bottom: 3px solid #2c3e50;">
                <h1 style="color: #2c3e50; margin: 0 0 10px 0; font-size: 28px;">RAW MATERIAL INCOMING INSPECTION CHECKLIST</h1>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">Quality Assurance & Control</p>
            </div>

            <!-- Basic Information -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Supplier Name</label>
                    <input type="text" name="supplier_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">P.O. #</label>
                    <input type="text" name="po_number" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspector Name</label>
                    <input type="text" name="inspector_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">P.O. Date</label>
                    <input type="date" name="po_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspection Date</label>
                    <input type="date" name="inspection_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Invoice #</label>
                    <input type="text" name="invoice_number" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
            </div>

            <!-- Instructions -->
            <div style="background: #ecf0f1; padding: 20px; border-radius: 8px; margin-bottom: 30px; border-left: 4px solid #3498db;">
                <h3 style="margin: 0 0 10px 0; color: #2c3e50; font-size: 16px;">INSTRUCTIONS</h3>
                <p style="margin: 0; color: #34495e; font-size: 14px; line-height: 1.6;">
                    This checklist is designed to conduct an incoming inspection of purchased raw materials to validate their quality based on set acceptance criteria. Carefully review each item and mark the corresponding checkbox to indicate compliance or note any observations and non-conformities. Use the "Notes/Observations" section to provide additional details, corrective actions and any required follow-up.
                </p>
            </div>

            <!-- Section 1: Product Identification -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">1. PRODUCT IDENTIFICATION AND DOCUMENTATION</h2>

                @foreach([
                'Product name and description match the purchase order and packing slip',
                'Product specifications and documentation are provided by the supplier',
                'Material certification or test reports are included as required',
                'Batch/Lot numbers and expiration dates are clearly labeled (if applicable)'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section1_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 2: Quantity Verification -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">2. QUANTITY VERIFICATION</h2>

                @foreach([
                'The quantity received matches the quantity stated on the packing slip/purchase order',
                'Overages or shortages are documented and communicated to the Purchase Dept.',
                'Quantity discrepancies are investigated and resolved'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section2_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 3: Packaging and Labeling -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">3. PACKAGING AND LABELING</h2>

                @foreach([
                'Packaging is intact, clean and free from damage',
                'All labels and markings are clear, legible and accurate',
                'Packaging materials are suitable for transportation and storage of the raw material',
                'Special handling instructions, if any, are followed'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section3_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 4: Visual Inspection -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">4. VISUAL INSPECTION</h2>

                @foreach([
                'The raw material appears free from physical defects, contamination or foreign objects',
                'Color, texture and appearance meet the specified requirements',
                'No visible signs of spoilage or degradation are observed'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section4_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 5: Arrival Temperature -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">5. ARRIVAL TEMPERATURE</h2>

                @foreach([
                'Measured temperature of the received goods is between 2–8°C',
                'Measured temperature of the received goods is below –20°C',
                'Measured temperature of the received goods is at room temperature'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section5_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 6: Functional and Performance Testing -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">6. FUNCTIONAL AND PERFORMANCE TESTING</h2>

                @foreach([
                'Functional tests are conducted to ensure the raw material meets its intended purpose',
                'Performance testing is performed according to the specified requirements',
                'Test results meet the acceptance criteria for the raw material'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section6_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 7: Non-Conformance and Disposition -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">7. NON-CONFORMANCE AND DISPOSITION</h2>

                @foreach([
                'Non-conforming raw materials are identified and segregated',
                'Disposition of non-conforming materials is determined and documented',
                'Actions taken to address non-conformities are recorded'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section7_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Additional Notes -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">ADDITIONAL NOTES/OBSERVATIONS</h2>
                <textarea name="additional_notes" rows="5" placeholder="Insert any additional notes or incoming inspection observations made during the inspection" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
            </div>

            <!-- Statement of Compliance -->
            <div style="background: #e8f5e9; border: 2px solid #4caf50; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">STATEMENT OF COMPLIANCE</h2>
                <p style="color: #34495e; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    I certify that I have conducted the above incoming material inspection and that the inspected raw materials meet the set acceptance criteria and are in compliance with the specified requirements of TRUSTlab.
                </p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspector's Name</label>
                        <input type="text" name="compliance_inspector_name" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature</label>
                        <input type="text" name="compliance_signature" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspection Date</label>
                        <input type="date" name="compliance_inspection_date" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>

            <!-- Approved By -->
            <div style="background: #fff3e0; border: 2px solid #ff9800; border-radius: 8px; padding: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">APPROVED BY</h2>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Name</label>
                        <input type="text" name="approver_name" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature</label>
                        <input type="text" name="approver_signature" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date</label>
                        <input type="date" name="approver_date" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>


        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-004"
        docNo="TDPL/SM/FOM-004"
        docName="Supplier Corrective Action Request & Report"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style=" padding: 10px; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); ">

            <!-- Header -->
            <div style="text-align: center; margin-bottom: 40px; padding-bottom: 30px; border-bottom: 3px solid #e74c3c;">
                <h1 style="color: #2c3e50; margin: 0; font-size: 28px;">Supplier Corrective Action Request (SCAR)</h1>
            </div>

            <!-- Supplier Information Section -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Supplier:</label>
                        <input type="text" name="supplier_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Attention:</label>
                        <input type="text" name="attention" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Phone #:</label>
                        <input type="text" name="phone" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Email:</label>
                        <input type="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>
            </div>

            <!-- Description of Nonconformance and Product Details -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Description of Nonconformance:</label>
                    <textarea name="nonconformance_description" rows="5" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>

                <div style="background: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #7f8c8d; font-style: italic; font-size: 13px;">If the nonconformance is product-related, complete the following:</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    @foreach([
                    ['label' => 'Our PO #:', 'name' => 'po_number', 'type' => 'text'],
                    ['label' => 'Product Number:', 'name' => 'product_number', 'type' => 'text'],
                    ['label' => 'Product Name:', 'name' => 'product_name', 'type' => 'text'],
                    ['label' => 'Quantity Affected:', 'name' => 'quantity_affected', 'type' => 'text']
                    ] as $field)
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">{{ $field['label'] }}</label>
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Date and Employee Information -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date Sent to Supplier:</label>
                        <input type="date" name="date_sent" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Sent by (TDPL Employee Name):</label>
                        <input type="text" name="sent_by" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>
            </div>

            <!-- Important Notice -->
            <div style="background: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; padding: 20px; margin-bottom: 30px; text-align: center;">
                <p style="margin: 0 0 8px 0; color: #856404; font-style: italic; font-size: 14px; font-weight: 600;">
                    RESPONSE TO THIS ISSUE MUST BE RECEIVED WITHIN <span style="text-decoration: underline;">7 WORKING DAYS</span> OF RECEIPT:
                </p>
                <p style="margin: 0; color: #856404; font-style: italic; font-size: 13px;">
                    FAILURE TO DO SO MAY RESULT IN REMOVAL OF YOUR COMPANY FROM FUTURE PURCHASING CONSIDERATION
                </p>
            </div>

            <!-- Supplier Response Section -->
            <div style="background: #e3f2fd; border: 2px solid #2196f3; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="background: #2196f3; color: white; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                    <h3 style="margin: 0; font-size: 16px; font-style: italic;">This section to be completed by Supplier</h3>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Root Cause of Nonconformance:</label>
                    <textarea name="root_cause" rows="4" style="width: 100%; padding: 12px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical; background: white;"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Corrective Action Taken or Planned:</label>
                    <textarea name="corrective_action" rows="4" style="width: 100%; padding: 12px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical; background: white;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature of responsible manager:</label>
                        <input type="text" name="supplier_manager_signature" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date:</label>
                        <input type="date" name="supplier_signature_date" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Print Name and Title:</label>
                    <input type="text" name="supplier_name_title" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                </div>
            </div>

            <!-- TRUSTlab Review Section -->
            <div style="background: #f3e5f5; border: 2px solid #9c27b0; border-radius: 8px; padding: 25px;">
                <div style="background: #9c27b0; color: white; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                    <h3 style="margin: 0; font-size: 16px; font-style: italic;">This section to be completed by TRUSTlab</h3>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 10px; color: #34495e; font-weight: 600; font-size: 14px;">Response Accepted?</label>
                    <div style="display: flex; gap: 20px;">
                        @foreach(['Yes', 'No'] as $option)
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="response_accepted" value="{{ strtolower($option) }}" style="margin-right: 8px;">
                            <span style="font-size: 14px; color: #34495e;">{{ $option }}</span>
                        </label>
                        @endforeach
                    </div>
                    <p style="margin: 10px 0 0 0; color: #7f8c8d; font-size: 13px; font-style: italic;">If not, attach additional sheets with explanation and follow-up.</p>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Purchasing Signature:</label>
                        <input type="text" name="purchasing_signature" style="width: 100%; padding: 10px; border: 1px solid #9c27b0; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date:</label>
                        <input type="date" name="purchasing_date" style="width: 100%; padding: 10px; border: 1px solid #9c27b0; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>


        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-008"
        docNo="TDPL/SM/FOM-008"
        docName="Expired Reagent and Consumable Supplies Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="font-size:14px;">
            <strong>Month:</strong>
            <input type="text" name="month" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Year:</strong>
            <input type="text" name="year" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Reagent<br>or Material/Supply</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date Manufactured</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiration Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Unit of Measurement</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Removal Date</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">{{ $i }}</td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][name]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][manufactured]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][unit]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" name="rows[{{ $i }}][quantity]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][removal]"
                            style="width:100%; border:none; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <br>

        <p style="font-size:14px;">
            <strong>Reported by:</strong>
            <input type="text" name="reported_by" style="border:none; border-bottom:1px solid #000; width:200px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" name="reported_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" name="reported_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <p style="font-size:14px;">
            <strong>Approved by:</strong>
            <input type="text" name="approved_by" style="border:none; border-bottom:1px solid #000; width:200px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" name="approved_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" name="approved_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-009"
        docNo="TDPL/SM/FOM-009"
        docName="Reagent & Consumable Supplies Borrowing Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="font-size:14px;">
            <strong>Month:</strong>
            <input type="text" name="month"
                style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Year:</strong>
            <input type="text" name="year"
                style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Reagent<br>or Material</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Borrowed From</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date Manufactured</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiration Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity & Unit of Measurement</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">LIMS Ticket Number</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][name]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][borrowed_from]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][manufactured]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][quantity_unit]"
                            style="border:none; width:100%; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lims_ticket]"
                            style="border:none; width:100%; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <br>

        <p style="font-size:14px;">
            <strong>Reported by:</strong>
            <input type="text" name="reported_by"
                style="border:none; border-bottom:1px solid #000; width:250px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" name="reported_sign"
                style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" name="reported_date"
                style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <p style="font-size:14px;">
            <strong>Approved by:</strong>
            <input type="text" name="approved_by"
                style="border:none; border-bottom:1px solid #000; width:250px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" name="approved_sign"
                style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" name="approved_date"
                style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-010"
        docNo="TDPL/SM/FOM-010"
        docName="Reagent-Consumable Recall Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="font-size:18px; font-weight:bold;">REAGENT/CONSUMABLE RECALL TRACKING FORM</p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">DESCRIPTION</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">DETAILS</th>
                </tr>
            </thead>

            <tbody>


                @foreach([
                'Product Category',
                'Product Name',
                'Manufacturer',
                'Supplier',
                'Lot Number',
                'Batch Number',
                'Date of Manufacture',
                'Expiry Date',
                'Quantity available on Hand',
                ] as $index => $label)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <strong>{{ $index + 1 }}</strong>
                    </td>
                    <td style="padding:6px;">{{ $label }}</td>
                    <td style="padding:6px;">
                        @if($label === 'Date of Manufacture' || $label === 'Expiry Date')
                        <input type="date"
                            name="details[{{ $index + 1 }}]"
                            style="border:none; width:100%; outline:none;">
                        @else
                        <input type="text"
                            name="details[{{ $index + 1 }}]"
                            style="border:none; width:100%; outline:none;">
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>

        <table style="width:100%;">
            <tbody>
                <tr>
                    <td><strong>Reason For Recall:</strong></td>
                </tr>

                <tr>
                    <td style="padding:8px;">
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="reason[]" value="Patient Complaint">
                            Patient Complaint
                        </label>

                        <label style="margin-right:40px;">
                            <input type="checkbox" name="reason[]" value="Supplier Recall">
                            Supplier Recall
                        </label>

                        <label>
                            <input type="checkbox" name="reason[]" value="Self Inspection">
                            Self Inspection
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>Additional Notes: (Provide & Attach Supplier Recall Notice details)</span><br>
                        <textarea name="additional_notes"
                            style="width:100%; height:80px; border:1px solid #ccc;"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <td colspan="6" style="padding:6px;">
                        <strong>Disposal Plan:</strong>
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;">
                        <label>
                            <input type="checkbox" name="disposal[]" value="Return to Supplier/Manufacturer">
                            Return to Supplier/Manufacturer
                        </label>
                    </td>

                    <td></td>

                    <td style="padding:6px;">
                        <label>
                            <input type="checkbox" name="disposal[]" value="Destroy & Dispose">
                            Destroy & Dispose
                        </label>
                    </td>

                    <td></td>

                    <td style="padding:6px;">
                        <label>
                            <input type="checkbox" name="disposal[]" value="Autoclave and Send to Biomedical Waste">
                            Autoclave and Send to Biomedical Waste
                        </label>
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:6px;">
                        Details of disposal method:
                        <textarea name="disposal_details"
                            style="width:100%; height:80px; border:1px solid #ccc;"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <p><strong>Quantities available in different locations.</strong></p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of the Stores/Department</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity & UOM</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Action Taken</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Signature of Dept In-charge</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 1; $i <= 12; $i++)
                    <tr>
                    <td style="padding:6px;">
                        <input type="text"
                            name="locations[{{ $i }}][department]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="locations[{{ $i }}][quantity]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="locations[{{ $i }}][action]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="locations[{{ $i }}][signature]"
                            style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <br><br>

        <p>
            I declare that the above quantities were received at the Central Stores and the disposal method mentioned above was followed to dispose the recalled product.
        </p>

        <br>

        <p><strong>Name of the Store Executive/Manager:</strong><br>
            <input type="text" name="store_manager"
                style="border:none; border-bottom:1px solid #000; width:60%;">
        </p>

        <p><strong>Designation:</strong><br>
            <input type="text" name="designation"
                style="border:none; border-bottom:1px solid #000; width:60%;">
        </p>

        <p><strong>Date:</strong><br>
            <input type="date" name="store_date"
                style="border:none; border-bottom:1px solid #000; width:30%;">
        </p>

        <p><strong>Signature:</strong><br>
            <input type="text" name="store_signature"
                style="border:none; border-bottom:1px solid #000; width:40%;">
        </p>

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
</script>


</html>


@endsection