@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accessioning</title>
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
            gap: 5rem;
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

        .comments-box {
            border: 1px solid lightgrey;
            padding: 2rem;
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Check List </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('section-sample-rejection')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Document Checklist</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('section-sample-volume')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Laboratory Safety Assessment</span>
                    </div>
                    <!-- <div class="pc-folder" onclick="showSection('section-sample-receiving')">
                                                                                                            <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                            <span class="pc-folder-label">Sample Receiving Record</span>
                                                                                                        </div>
                                                                                                        <div class="pc-folder" onclick="showSection('section-outsourcing-samples')">
                                                                                                            <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                            <span class="pc-folder-label">Outsourcing Samples Record</span>
                                                                                                        </div> -->
                    <!-- <div class="pc-folder" onclick="showSection('CompetencyAssessmentForm ')">
                                                                                                            <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                            <span class="pc-folder-label"> Competency Assessment Form </span>
                                                                                                        </div> -->
                    <!-- <div class="pc-folder" onclick="showSection('record-of-specimen-signatures')">
                                                                                                            <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                            <span class="pc-folder-label">Record of Specimen Signatures</span>
                                                                                                        </div> -->
                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="section-sample-rejection" class="main  inactive">


            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Document Checklist</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitForm1()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date" id="month-year">
                </div>
            </div>
            <div class="table-responsive">
                <p><strong>Document Checklist</strong></p>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">To be completed (electronically) and attached to any document that guides
                        practice when submitted to the appropriate committee for approval or ratification.</span></p>
                <p><strong>Title of the document: Policy (document) Author: Executive Director:</strong></p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong>Yes/No/</strong></p>
                                <p><strong>Unsure/NA</strong></p>
                            </td>
                            <td>
                                <p><strong>Comments</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>1.</strong></p>
                            </td>
                            <td>
                                <p><strong>Title</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is the title clear and unambiguous?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is it clear whether the document is a</span></p>
                                <p><span style="font-weight: 400;">guideline, policy, protocol or standard?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2.</strong></p>
                            </td>
                            <td>
                                <p><strong>Scope/Purpose</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is the target population clear and</span></p>
                                <p><span style="font-weight: 400;">unambiguous?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is the purpose of the document clear?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Are the intended outcomes described?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Are the statements clear and unambiguous?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3.</strong></p>
                            </td>
                            <td>
                                <p><strong>Development Process</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is there evidence of engagement with</span></p>
                                <p><span style="font-weight: 400;">stakeholders and users?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Who was engaged in a review of the</span></p>
                                <p><span style="font-weight: 400;">document (list committees/ individuals)?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Has the policy template been followed (i.e. is</span></p>
                                <p><span style="font-weight: 400;">the format correct)?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4.</strong></p>
                            </td>
                            <td>
                                <p><strong>Evidence Base</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is the type of evidence to support the</span></p>
                                <p><span style="font-weight: 400;">document identified explicitly?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Are local/organisational supporting documents
                                        referenced?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5.</strong></p>
                            </td>
                            <td>
                                <p><strong>Approval</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Does the document identify which committee/group will
                                        approve/ratify it?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear"><br /><br /></td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">If appropriate, have the joint human resources/staff side
                                        committee (or</span></p>
                                <p><span style="font-weight: 400;">equivalent) approved the document?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.</strong></p>
                            </td>
                            <td>
                                <p><strong>Dissemination and Implementation</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p><br /><span style="font-weight: 400;"><br /></span></p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong>Yes/No/</strong></p>
                                <p><strong>Unsure/NA</strong></p>
                            </td>
                            <td>
                                <p><strong>Comments</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is there an outline/plan to identify how this</span></p>
                                <p><span style="font-weight: 400;">will be done?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Does the plan include the necessary</span></p>
                                <p><span style="font-weight: 400;">training/support to ensure compliance?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7.</strong></p>
                            </td>
                            <td>
                                <p><strong>Process for Monitoring Compliance</strong></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Are there measurable standards or KPIs to support
                                        monitoring compliance of the</span></p>
                                <p><span style="font-weight: 400;">document?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8.</strong></p>
                            </td>
                            <td>
                                <p><strong>Review Date</strong></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is the review date identified and is this</span></p>
                                <p><span style="font-weight: 400;">acceptable?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9.</strong></p>
                            </td>
                            <td>
                                <p><strong>Overall Responsibility for the Document</strong></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Is it clear who will be responsible for coordinating the
                                        dissemination, implementation and review of the</span></p>
                                <p><span style="font-weight: 400;">documentation?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear"><br /><br /></td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10.</strong></p>
                            </td>
                            <td>
                                <p><strong>Equality Impact Assessment (EIA)</strong></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Has a suitable EIA been completed?</span></p>
                            </td>
                            <td contenteditable="true" data-field="title-clear">&nbsp;</td>
                            <td contenteditable="true" data-field="title-clear-comments">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p><br /><br /></p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td colspan="4">
                                <p><strong>Committee Approval&nbsp;</strong>
                                <div contenteditable="true" data-field="committee-approval">

                                </div>
                                </p>
                            </td>
                        </tr>
                        <!-- <tr>
                                                                                                                <td colspan="4">&nbsp;</td>
                                                                                                            </tr> -->
                        <tr>
                            <td>
                                <p><strong>Name of Chair</strong>
                                <div contenteditable="true" data-field="chair-name">

                                </div>
                                </p>
                            </td>
                            <!-- <td>&nbsp;</td> -->
                            <td>
                                <p><strong>Date</strong><input type="date" data-field="approval-date"></p>
                            </td>
                            <!-- <td>&nbsp;</td> -->
                        </tr>
                        <tr>
                            <td contenteditable="true" colspan="4">
                                <p><strong>Ratification by Management Executive&nbsp;</strong>
                                <div contenteditable="true" data-field="management-ratification">

                                </div>
                                </p>
                            </td>
                        </tr>
                        <!-- <tr>
                                                                                                                <td colspan="4">&nbsp;</td>
                                                                                                            </tr> -->
                        <!-- <tr>
                                                                                                                <td colspan="4">
                                                                                                                    <p><strong>Date: n/a</strong></p>
                                                                                                                </td>
                                                                                                            </tr> -->
                    </tbody>
                </table>
                <p>&nbsp;</p>
            </div>

        </div>


        <div id="section-sample-volume" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sample Volume Check Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>


            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date">
                </div>
            </div>
            <div class="table-responsive">
                <p><span style="font-weight: 400;">Laboratory Safety Assessment</span></p>
                <p><span style="font-weight: 400;">Date: <input type="datetime" name="" id=""> </span></p>
                <p><span style="font-weight: 400;">Assessor: <input type="text"> </span></p>
                <p><span style="font-weight: 400;">Lab Name/Room: <input type="text"> </span></p>
                <p><span style="font-weight: 400;">INFORMATION AND TRAINING <input type="text"> </span></p>
                <!-- <table>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Laboratory has lab safety
                                                                                                                                notebook available and accessible to lab workers.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate, current
                                                                                                                                laboratory safety signage is posted near main laboratory entrance.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate, current
                                                                                                                                emergency information is posted near main laboratory entrance and near
                                                                                                                                phones.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">All laboratory workers
                                                                                                                                have completed applicable safety training.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Laboratory has laboratory
                                                                                                                                specific procedures and applicable workers are trained on them.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Training records are
                                                                                                                                maintained.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Incident reporting forms
                                                                                                                                are available and/or lab users are aware of where to find them
                                                                                                                                online&mdash;&ldquo;Incident/Accident Injury Report&rdquo; and
                                                                                                                                &ldquo;Supervisor&rsquo;s Accident Report (SAR)&rdquo;&nbsp; </span><a
                                                                                                                                href="https://qtqms.mytrustlab.com"><span
                                                                                                                                    style="font-weight: 400;">https://qtqms.mytrustlab.com</span></a><span
                                                                                                                                style="font-weight: 400;">&nbsp;</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Chemical inventory is
                                                                                                                                available, current, and either stored online or stored near main laboratory
                                                                                                                                exit.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Safety Data Sheets (SDS)
                                                                                                                                are available, current and stored near main laboratory exit.&nbsp; Or stored on
                                                                                                                                flash drive near main laboratory exit.&nbsp; (i.e. can be taken to doctor in
                                                                                                                                emergency)</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p><span style="font-weight: 400;">GENERAL</span></p>
                                                                                                    <table>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Sharps properly stored and
                                                                                                                                disposed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Equipment over 4 feet high
                                                                                                                                is seismically braced.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Sinks are posted with
                                                                                                                                &ldquo;Non-potable Water&rdquo; sign.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ul>
                                                                                                                        <li><strong>NO</strong><span style="font-weight: 400;"> evidence of food or drink for
                                                                                                                                human consumption in the lab.</span></li>
                                                                                                                    </ul>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Work surfaces are clean
                                                                                                                                and uncluttered.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Equipment guards in place
                                                                                                                                for protection against mechanical hazards.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p><span style="font-weight: 400;">SAFETY EQUIPMENT</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Eyewash and/or safety
                                                                                                                                shower are available and unobstructed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Eyewash and/or safety
                                                                                                                                shower are tested monthly.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Eyewash is activated
                                                                                                                                weekly and documented.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">First aid kit available,
                                                                                                                                properly stocked, and unobstructed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Fire extinguisher is
                                                                                                                                maintained and unobstructed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Spill kit is available,
                                                                                                                                properly stocked, and easily accessible.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Signage is posted
                                                                                                                                indicating locations of fire extinguishers, eyewash, shower, fire blanket, and
                                                                                                                                spill kit.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p><span style="font-weight: 400;">LOCAL EXHAUST VENTILATION (LEV)</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Fume hood certified
                                                                                                                                annually.&nbsp;</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">LEV is properly
                                                                                                                                used.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Fume hood sash is
                                                                                                                                operational and used at proper height.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Storage of materials is
                                                                                                                                minimized and baffles/exhaust points have adequate clearance.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">LEV alarms are functioning
                                                                                                                                properly.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <p><span style="font-weight: 400;">HAZARDOUS MATERIALS</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Less than 10 gallons of
                                                                                                                                flammable liquids stored outside of flammable cabinet(s).</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Compressed gas cylinders
                                                                                                                                are properly secured, stored, and used.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Mercury containing devices
                                                                                                                                are NOT in use or stored.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Dangerously unstable
                                                                                                                                chemicals (e.g. peroxide formers) are properly dated, stored, and tested or
                                                                                                                                disposed prior to expiration date.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Containers are securely
                                                                                                                                capped/closed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Flammable liquids (all
                                                                                                                                Class I) containers &gt; 1 gallon are safety cans.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Chemical waste accumulated
                                                                                                                                for &lt; 6 months.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Chemical storage
                                                                                                                                areas/cabinets are clearly labeled (SAA, flammable, corrosive, etc).</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Hazardous liquids are
                                                                                                                                stored in secondary containment.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Safety lips installed on
                                                                                                                                chemical storage shelves.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Chemicals are stored
                                                                                                                                properly including storage with compatible chemicals and materials.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Only bleach and compatible
                                                                                                                                cleaning agents are stored near sinks.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Hazardous liquids are
                                                                                                                                stored below eye level.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Flammable materials are
                                                                                                                                not stored in standard refrigerators or freezers.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Carcinogen hazard signage
                                                                                                                                posted on lab door and containers.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">All containers are
                                                                                                                                properly labeled.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p><br /><br /></p>
                                                                                                    <p><span style="font-weight: 400;">PERSONAL PROTECTIVE EQUIPMENT (PPE)</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate gloves are
                                                                                                                                available and in good condition.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">All latex gloves are
                                                                                                                                powder-free.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate eye and face
                                                                                                                                protection is available and in good, sanitary condition.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate PPE is
                                                                                                                                available for liquid nitrogen handling/use.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate lab coats,
                                                                                                                                aprons, or other protective clothing is available and in good condition.</span>
                                                                                                                        </li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Respirators are in
                                                                                                                                use.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Respirator use meets
                                                                                                                                voluntary use.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Respirator users have
                                                                                                                                proper training, medical clearance, and/or fit testing.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Appropriate PPE is used
                                                                                                                                and used properly.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Closed-toed shoes are
                                                                                                                                worn.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p><br /><br /><br /><br /></p>
                                                                                                    <p><span style="font-weight: 400;">FIRE AND LIFE SAFETY</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">No storage within 24
                                                                                                                                inches (unsprinklered) or 18 inches (sprinklered) of ceiling.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Aisles and exits are kept
                                                                                                                                clear with no tripping hazards.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Fire doors are not
                                                                                                                                improperly propped or blocked open.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">All ceiling tiles are in
                                                                                                                                place.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Fire blanket is available
                                                                                                                                and unobstructed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Equipment and cords appear
                                                                                                                                to be in good condition.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Electrical outlets and
                                                                                                                                power strips are in good working condition and properly used.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">NO space heaters are used
                                                                                                                                in lab.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Electrical extension cords
                                                                                                                                are used for only temporary purpose, properly used, and in good
                                                                                                                                condition.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Electrical panels are
                                                                                                                                unobstructed and closed.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <p><span style="font-weight: 400;">MISCELLANEOUS</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><strong>YES</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>NO</strong></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><strong>N/A</strong></p>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Biological work is being
                                                                                                                                conducted or materials stored.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Radiation work is being
                                                                                                                                conducted or materials stored.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p><span style="font-weight: 400;"><input type="checkbox"></span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <ol>
                                                                                                                        <li style="font-weight: 400;"><span style="font-weight: 400;">Noise issues or hearing
                                                                                                                                protection in use.</span></li>
                                                                                                                    </ol>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td contenteditable="true">
                                                                                                                    <p><span style="font-weight: 400;">Comments:</span></p>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr contenteditable="true">
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <p>&nbsp;</p>
                                                                                                    <p><span style="font-weight: 400;">NOTES / ADDITIONAL COMMENTS</span></p>
                                                                                                    <table class="stock-planner-table">
                                                                                                        <tbody>
                                                                                                            <tr >
                                                                                                                <td contenteditable="true">&nbsp;</td>
                                                                                                            </tr>

                                                                                                        </tbody>
                                                                                                    </table> -->
                <div id="checklist-container"></div>
                <p><br /><br /></p>
            </div>

        </div>




        <div id="CompetencyAssessmentForm" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/007</strong></label>
                    <label class="doc-detail">Doc Name: <strong> Competency Assessment Form </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label><input type="text">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date">
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table">

                    <tbody>
                        <tr>
                            <td>
                                <p><strong>Name of assessee/employee</strong><span style="font-weight: 400;"> :</span></p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>Date of assessment</strong><span style="font-weight: 400;"> :</span></p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>Department</strong><span style="font-weight: 400;">&nbsp; :</span></p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>Test name</strong><span style="font-weight: 400;"> :</span></p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>Equipment used &amp; Method</strong><span style="font-weight: 400;"> :</span></p>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Direct Observation</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">&nbsp;</span><strong>Instructions for the Observer</strong></p>
                <p><span style="font-weight: 400;">Observe the above named employee performances for the indicated each step
                        of the procedure as listed in the table below. For each step that conforms to the written procedure
                        place a check mark (&radic;) in the Yes column. If any step of the procedure is performed
                        incorrectly place a check mark (&radic;) in the No column and explain in the comments
                        section.</span></p>
                <p>&nbsp;</p>
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><span style="font-weight: 400;">S. N</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Activities&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Yes&nbsp;&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">No</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">NA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Comment/Observation</span></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; ORGANIZE WORK AREA</strong><strong>&nbsp;</strong>
                                </p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Inspect work
                                            area&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Organize work
                                            area for the day&rsquo;s workload&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Make sure
                                            supplies and reagents are available</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Check the
                                            expiry date of all reagents and supplies</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Ensure all
                                            needed safety equipment and&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;disinfectants
                                        are available</span></p>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Check the
                                            communication log&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;Make sure the
                                            analyzer/equipment is functional&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(following
                                        daily start up procedure)&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SPECIMENS
                                        HANDLING&nbsp;&nbsp;</strong></p>
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crosschecking of
                                            the sample ID with the work</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;list</span></p>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check the specimen
                                            quality for the test ordered&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Store specimens in
                                            proper place and</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;temperature
                                        until testing&nbsp;</span></p>
                                <br /><br />
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MAINTENANCE &amp;
                                        CALIBERATION</strong><strong>&nbsp;</strong></p>
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maintenance</span>
                                    </li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Perform startup/preventive
                                            maintenance (daily, weekly, monthly etc) according to SOP if applicable</span>
                                    </li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Document performed
                                            maintenance activities on maintenance log sheet</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Calibration</span>
                                    </li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Calibrate Equipment
                                            according to calibration procedure if applicable</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Review calibration data
                                            (pass/fail)&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">document&nbsp; calibration
                                            activities on&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;log
                                        sheet</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong> &nbsp; &nbsp; &nbsp; &nbsp; QUALITY CONTROL (QC)</strong><strong>&nbsp;</strong>
                                </p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Check
                                            the quality control (low, Normal and high&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if
                                        applicable) specimens storage condition&nbsp;</span></p>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Check
                                            the control specimens quality</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Check the control specimens
                                            expiry date&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Proper mixing of control
                                            specimens</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Perform quality control
                                            specimens according to&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;the
                                        procedure</span></p>
                                <br /><br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Appropriate interpretation of
                                            control</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;pecimens result</span></p>
                                <br /><br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Record
                                            QC result &amp; Plot Levy Jennings(LJ) chart</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Review LJ
                                            chart for&nbsp; shift/trend ( if any)&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Troubleshoot and document corrective
                                            action&nbsp;&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;(if required)</span></p>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Proper documentation of
                                            control result</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Properly store control
                                            specimens</span></li>
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong> &nbsp; &nbsp; &nbsp; &nbsp; SAMPLE PROCESSING</strong> <strong>&amp;
                                        ANALYSIS</strong></p>
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Crosschecking of the sample ID with
                                            the work list</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Appropriate mixing of
                                            samples</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Run the sample following
                                            testing procedure</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;Observe the displayed result
                                            is completed</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreting flags or
                                            any alert message and</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;taking
                                        proper corrective actions (if any)</span></p>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Troubleshoot (if
                                            required)&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document
                                            corrective action (if required)</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reporting of
                                            result with standard unit</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span
                                            style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Communicate
                                            critical using the procedure (if&nbsp;</span></li>
                                </ol>
                                <p><span
                                        style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;any)</span>
                                </p>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Complete and document on
                                            the logbooks&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Perform shutdown
                                            procedure&nbsp;</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Close the
                                            analyzer&nbsp;</span></li>
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;"> &nbsp; &nbsp; &nbsp; &nbsp; </span><strong>SPECIMEN
                                        RETENTION&nbsp;</strong></p>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(according
                                        to specimen retention policy)&nbsp;</span></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;Post
                                            Storage of&nbsp; specimen (time of storage,</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;recording of stored specimens,
                                        use of</span></p>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;appropriate temp, timely removal
                                        of unstable&nbsp;&nbsp;</span></p>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;specimens)</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><strong> &nbsp; &nbsp; &nbsp; &nbsp; WASTE DISPOSAL&nbsp;</strong></p>
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Ensure that
                                            waste is properly disposed</span></li>
                                </ol>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Ensure that
                                            benches properly disinfected&nbsp;</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;following
                                        disinfection procedure.</span></p>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Ensure proper
                                            spill management practices (if</span></li>
                                </ol>
                                <p><span style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;any
                                        spill)</span></p>
                                <br />
                                <ol>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">&nbsp;&nbsp;Complete and
                                            document safety logbooks&nbsp;</span></li>
                                </ol>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Document &amp; Records Review</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <p><strong>Instructions for the reviewer&nbsp;</strong></p>
                <p><span style="font-weight: 400;">Review the above named employee performances for proper recording and
                        documentation of documents and records, monitor the performance of test result, quality control and
                        proficiency testing, the indicated activities listed in the table below. For each activity that
                        conforms to the requirement place a check mark (&radic;) in the Yes column. If any activity of the
                        requirement is performed incorrectly place a check mark (&radic;) in the No column and if there is
                        no activity on the section mark with Not Applicable (NA) and explain in the comments section.</span>
                </p>
                <p>&nbsp;</p>
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><span style="font-weight: 400;">S.N</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Activities&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Yes&nbsp;&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">No</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">NA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </th>
                            <th>
                                <p><span style="font-weight: 400;">Comment/Observation</span></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Recording and Reporting of Test Results</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Performing of Quality Control&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Recording of Quality Control&nbsp; data</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Interpretation of&nbsp; Quality Control
                                        results</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Recording and documentation of Equipment
                                        Maintenance</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Performance of Proficiency Testing &nbsp; (if
                                        Applicable)&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Recording and Documentation of Environmental
                                        Monitoring Data&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Recording and Documentation of
                                        Corrective/Preventive action taken</span></p>
                                <p><span style="font-weight: 400;">&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Recording and documentation of safety
                                        logbooks&nbsp;</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <p><span style="font-weight: 400;">Proper Documentation of quality documents (Manual, SOP,
                                        Form, etc)</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Blind Sample Analysis&nbsp;</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <p><span
                        style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>Instructions
                        for the Assessor</strong></p>
                <p><span style="font-weight: 400;">Assess the above named employee performances when he/she performs Blinded
                        Samples for the selected test and methods.&nbsp; Record the result of Blinded Samples in the table
                        below and compare the result against the given result.</span></p>
                <p><br /><br /><br /><br /><br /></p>
                <p><span style="font-weight: 400;">Assessment Performance for given test/Blinded Sample:</span></p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">SN</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">Type of Test and Methods</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">Sample ID/Code</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">Result</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">Expected Result</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">Score Pass/Fail</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">1</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">2</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">3</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">5</span></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Written Exam&nbsp;</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>S. No</strong></p>
                            </th>
                            <th>
                                <p><strong>Exam</strong></p>
                            </th>
                            <th>
                                <p><strong>Score</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p><strong>1</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <p><br /><br /></p>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Major Problems identified (if any):</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">__________</span></p>
                <p><span style="font-weight: 400;">________________________</span></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <ul>
                    <li><strong><strong>Recommendation</strong></strong></li>
                </ul>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">_______</span></p>
                <p><span style="font-weight: 400;">________</span></p>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">Employee Name________________________________ Sign________
                        Date________________</span></p>
                <p>&nbsp;</p>
                <p><span style="font-weight: 400;">Evaluator Name________________________________ Sign________
                        Date________________</span></p>
                </table>
            </div>

        </div>




    </body>
    <script>
        // Checklist data object
        const labChecklist = {
            title: "Laboratory Safety Inspection Checklist",
            sections: [
                {
                    title: "DOCUMENTATION",
                    items: [
                        "Safety documentation available and accessible to all personnel",
                        "Appropriate safety signage posted at laboratory entrance",
                        "Emergency information clearly posted in visible locations",
                        "All personnel have completed required safety training",
                        "Training records are properly maintained",
                        "Incident reporting forms available and personnel know how to access them"
                    ]
                },
                {
                    title: "GENERAL LABORATORY CONDITIONS",
                    items: [
                        "Sharps properly stored and disposed",
                        "Tall equipment is properly secured",
                        "Work surfaces clean and uncluttered",
                        "Equipment guards in place for mechanical hazards",
                        "No evidence of food or drink in the lab"
                    ]
                },
                {
                    title: "SAFETY EQUIPMENT",
                    items: [
                        "Eyewash/safety shower available and unobstructed",
                        "Eyewash/safety shower tested regularly",
                        "First aid kit available and properly stocked",
                        "Fire extinguisher maintained and accessible",
                        "Spill kit available and properly stocked"
                    ]
                },
                {
                    title: "VENTILATION SYSTEMS",
                    items: [
                        "Fume hood certified and functioning properly",
                        "Ventilation systems used correctly",
                        "Storage minimized in ventilation areas",
                        "Ventilation alarms functioning properly"
                    ]
                },
                {
                    title: "HAZARDOUS MATERIALS",
                    items: [
                        "Chemical inventory current and accessible",
                        "Safety Data Sheets (SDS) available and current",
                        "Chemical containers properly labeled",
                        "Chemical storage areas properly labeled",
                        "Hazardous liquids stored in secondary containment",
                        "Chemical waste properly managed"
                    ]
                },
                {
                    title: "PERSONAL PROTECTIVE EQUIPMENT (PPE)",
                    items: [
                        "Appropriate gloves available and in good condition",
                        "Eye and face protection available and in good condition",
                        "Lab coats/protective clothing available",
                        "Respirators properly maintained if used",
                        "Closed-toe shoes worn by all personnel"
                    ]
                },
                {
                    title: "FIRE AND LIFE SAFETY",
                    items: [
                        "Proper clearance maintained below ceiling",
                        "Aisles and exits kept clear",
                        "Fire doors not propped open",
                        "Electrical equipment in good condition",
                        "Electrical panels unobstructed"
                    ]
                },
                {
                    title: "MISCELLANEOUS",
                    items: [
                        "Biological materials properly stored if present",
                        "Radiation materials properly stored if present",
                        "Noise protection used where needed"
                    ]
                }
            ]
        };

        function renderChecklist() {
            const container = document.getElementById('checklist-container');

            // Render each section
            labChecklist.sections.forEach((section, sectionIndex) => {
                // Create section title
                const sectionTitle = document.createElement('div');
                sectionTitle.className = 'section-title';
                sectionTitle.textContent = section.title;
                container.appendChild(sectionTitle);

                // Create table
                const table = document.createElement('table');
                table.className = 'stock-planner-table';

                // Create table header
                const thead = document.createElement('thead');
                const headerRow = document.createElement('tr');
                ['YES', 'NO', 'N/A', ''].forEach(text => {
                    const th = document.createElement('th');
                    th.textContent = text;
                    headerRow.appendChild(th);
                });
                thead.appendChild(headerRow);
                table.appendChild(thead);

                // Create table body with items
                const tbody = document.createElement('tbody');
                section.items.forEach((item, itemIndex) => {
                    const row = document.createElement('tr');
                    const groupName = `section-${sectionIndex}-item-${itemIndex}`;

                    // Add radio buttons for YES/NO/N/A
                    ['yes', 'no', 'na'].forEach((value, i) => {
                        const td = document.createElement('td');
                        const radio = document.createElement('input');
                        radio.type = 'radio';
                        radio.name = groupName;
                        radio.value = value;
                        radio.id = `${groupName}-${value}`;
                        td.appendChild(radio);

                        // Add label for accessibility (hidden but available for screen readers)
                        if (i === 0) {
                            const label = document.createElement('label');
                            label.htmlFor = radio.id;
                            label.style.display = 'none';
                            label.textContent = value;
                            td.appendChild(label);
                        }

                        row.appendChild(td);
                    });

                    // Add item text
                    const itemTd = document.createElement('td');
                    const ol = document.createElement('ol');
                    const li = document.createElement('li');
                    li.textContent = item;
                    ol.appendChild(li);
                    itemTd.appendChild(ol);
                    row.appendChild(itemTd);

                    tbody.appendChild(row);
                });
                table.appendChild(tbody);
                container.appendChild(table);

                // Add comments section
                const commentsTitle = document.createElement('span');
                commentsTitle.textContent = 'Comments:';
                container.appendChild(commentsTitle);

                const commentsBox = document.createElement('div');
                commentsBox.className = 'comments-box';
                commentsBox.contentEditable = 'true';
                container.appendChild(commentsBox);

                // Add space between sections
                container.appendChild(document.createElement('br'));
            });

            // Add final notes section
            const notesTitle = document.createElement('div');
            notesTitle.className = 'section-title';
            notesTitle.textContent = 'NOTES / ADDITIONAL COMMENTS';
            container.appendChild(notesTitle);

            const notesBox = document.createElement('div');
            notesBox.className = 'comments-box';
            notesBox.contentEditable = 'true';
            container.appendChild(notesBox);
        }

        // Render the checklist when the page loads
        window.onload = renderChecklist;
    </script>
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

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize form
            const monthYearInput = document.getElementById('month-year');
            if (monthYearInput) {
                monthYearInput.addEventListener('change', fetchDocumentChecklist);
            }

            // Setup submit button
            const submitBtn = document.querySelector('button.btn-warning');
            if (submitBtn) {
                submitBtn.addEventListener('click', submitDocumentChecklist);
            }
        });
        function collectChecklistData() {
            // Helper function to safely get content
            const getContent = (index, field) => {
                const elements = document.querySelectorAll(`[data-field="${field}"]`);
                return elements[index] ? elements[index].textContent.trim() : '';
            };

            return {
                title: {
                    clear: getContent(0, 'title-clear'),
                    clearComments: getContent(0, 'title-clear-comments'),
                    documentType: getContent(1, 'title-clear'),
                    documentTypeComments: getContent(1, 'title-clear-comments')
                },
                scopePurpose: {
                    targetPopulation: getContent(2, 'title-clear'),
                    targetPopulationComments: getContent(2, 'title-clear-comments'),
                    purposeClear: getContent(3, 'title-clear'),
                    purposeComments: getContent(3, 'title-clear-comments'),
                    outcomesDescribed: getContent(4, 'title-clear'),
                    outcomesComments: getContent(4, 'title-clear-comments'),
                    statementsClear: getContent(5, 'title-clear'),
                    statementsComments: getContent(5, 'title-clear-comments')
                },
                developmentProcess: {
                    stakeholderEngagement: getContent(6, 'title-clear'),
                    stakeholderComments: getContent(6, 'title-clear-comments'),
                    reviewers: getContent(7, 'title-clear'),
                    reviewersComments: getContent(7, 'title-clear-comments'),
                    templateFollowed: getContent(8, 'title-clear'),
                    templateComments: getContent(8, 'title-clear-comments')
                },
                evidenceBase: {
                    evidenceType: getContent(9, 'title-clear'),
                    evidenceComments: getContent(9, 'title-clear-comments'),
                    supportingDocs: getContent(10, 'title-clear'),
                    supportingDocsComments: getContent(10, 'title-clear-comments')
                },
                approval: {
                    committeeIdentified: getContent(11, 'title-clear'),
                    committeeComments: getContent(11, 'title-clear-comments'),
                    hrApproval: getContent(12, 'title-clear'),
                    hrComments: getContent(12, 'title-clear-comments')
                },
                dissemination: {
                    planExists: getContent(13, 'title-clear'),
                    planComments: getContent(13, 'title-clear-comments'),
                    trainingIncluded: getContent(14, 'title-clear'),
                    trainingComments: getContent(14, 'title-clear-comments')
                },
                monitoring: {
                    standardsExist: getContent(15, 'title-clear'),
                    standardsComments: getContent(15, 'title-clear-comments')
                },
                reviewDate: {
                    dateIdentified: getContent(16, 'title-clear'),
                    dateComments: getContent(16, 'title-clear-comments')
                },
                responsibility: {
                    clear: getContent(17, 'title-clear'),
                    comments: getContent(17, 'title-clear-comments')
                },
                equalityImpact: {
                    assessmentCompleted: getContent(18, 'title-clear'),
                    assessmentComments: getContent(18, 'title-clear-comments')
                }
            };
        }

        function collectApprovalData() {
            const getContent = (field) => {
                const el = document.querySelector(`[data-field="${field}"]`);
                return el ? (el.textContent || el.value).trim() : '';
            };

            return {
                committeeApproval: getContent('committee-approval'),
                chairName: getContent('chair-name'),
                approvalDate: getContent('approval-date'),
                managementRatification: getContent('management-ratification')
            };
        }



        // Fetch existing checklist data
        function fetchDocumentChecklist() {
            const monthYear = document.getElementById('month-year').value;
            if (!monthYear) return;

            // Show loading state
            const submitBtn = document.querySelector('button.btn-warning');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Loading...';

            fetch(`/document-checklist/${encodeURIComponent(monthYear)}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.data) {
                        populateForm(data.data);
                    } else {
                        console.log('No existing data found for this month/year');
                        clearForm();
                    }
                })
                .catch(error => {
                    console.error('Error fetching document checklist:', error);
                    alert('Error loading data: ' + error.message);
                })
                .finally(() => {
                    // Restore button state
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit';
                });
        }
        function submitDocumentChecklist() {
            try {
                const monthYear = document.getElementById('month-year').value;
                const checklistData = collectChecklistData();
                const approvalData = collectApprovalData();

                fetch('/document-checklist', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        month_year: monthYear,
                        checklist_data: checklistData,
                        approval_data: approvalData
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Document checklist saved successfully!');
                        } else {
                            throw new Error(data.message || 'Failed to save document checklist');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error saving document checklist: ' + error.message);
                    });

            } catch (error) {
                console.error('Submission error:', error);
                alert('An error occurred: ' + error.message);
            }
        }

        function populateForm(data) {
            if (!data) return;

            // Month/Year
            document.getElementById('month-year').value = data.month_year || '';

            // Checklist Data
            const checklist = data.checklist_data || {};

            // Title Section
            if (checklist.title) {
                document.querySelector('[data-field="title-clear"]').textContent = checklist.title.clear || '';
                document.querySelector('[data-field="title-clear-comments"]').textContent = checklist.title.clearComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[1].textContent = checklist.title.documentType || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[1].textContent = checklist.title.documentTypeComments || '';
            }

            // Scope/Purpose Section
            if (checklist.scopePurpose) {
                document.querySelectorAll('[data-field="title-clear"]')[2].textContent = checklist.scopePurpose.targetPopulation || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[2].textContent = checklist.scopePurpose.targetPopulationComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[3].textContent = checklist.scopePurpose.purposeClear || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[3].textContent = checklist.scopePurpose.purposeComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[4].textContent = checklist.scopePurpose.outcomesDescribed || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[4].textContent = checklist.scopePurpose.outcomesComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[5].textContent = checklist.scopePurpose.statementsClear || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[5].textContent = checklist.scopePurpose.statementsComments || '';
            }

            // Development Process Section
            if (checklist.developmentProcess) {
                document.querySelectorAll('[data-field="title-clear"]')[6].textContent = checklist.developmentProcess.stakeholderEngagement || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[6].textContent = checklist.developmentProcess.stakeholderComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[7].textContent = checklist.developmentProcess.reviewers || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[7].textContent = checklist.developmentProcess.reviewersComments || '';
                document.querySelectorAll('[data-field="title-clear"]')[8].textContent = checklist.developmentProcess.templateFollowed || '';
                document.querySelectorAll('[data-field="title-clear-comments"]')[8].textContent = checklist.developmentProcess.templateComments || '';
            }

            // Continue for all other sections following the same pattern...
            // Evidence Base, Approval, Dissemination, Monitoring, Review Date, Responsibility, Equality Impact

            // Approval Data
            const approval = data.approval_data || {};
            document.querySelector('[data-field="committee-approval"]').textContent = approval.committeeApproval || '';
            document.querySelector('[data-field="chair-name"]').textContent = approval.chairName || '';
            document.querySelector('[data-field="approval-date"]').value = approval.approvalDate || '';
            document.querySelector('[data-field="management-ratification"]').textContent = approval.managementRatification || '';
        }


    </script>

    </html>


@endsection