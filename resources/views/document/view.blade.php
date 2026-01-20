@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View</title>
        <style>
            .container1 {
                border-right: 1px solid lightgrey;
                padding: 0 20px 20px 20px;
                width: 80%;
            }

            .container2 {

                padding: 0 20px;
                width: 20%;

            }



            .actions {
                display: flex;
                flex-direction: column;
            }

            .actions button {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 5px;
                font-size: 12px;
                margin: 5px 0;
                cursor: pointer;
                border-radius: 5px;
            }

            .actions button:hover {
                background-color: #0056b3;
            }



            .document-details {
                font-family: Arial, sans-serif;
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 16px 16px 16px 16px;
                max-width: 600px;
                max-height: calc(100vh - 296px);
                overflow: auto;
                background-color: #f9f9f9;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .document-details__row {
                margin-bottom: 8px;
                border-bottom: 1px solid lightgray;
            }

            .document-details__label {
                font-weight: 600;
                font-size: 14px;
                color: #333;

            }

            .document-details__value {
                font-size: 12px;
                color: #555;

            }

            .document-details__row:last-child {
                margin-bottom: 0;
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

            .panel2 {

                overflow: auto;
                top: 50px;
                position: fixed;
                /* top: 0; */
                right: -100%;
                width: calc(100% - 160px);
                height: 90%;
                background: #f8f9fa;
                box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
                padding: 0 20px;
                transition: 0.5s ease;
                z-index: 1001;
            }

            .panel2.open {
                right: 0;
                bottom: 0;
                margin: 20px;

            }

            .closeBtn2 {
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
                z-index: 1001;
            }

            .closeBtn2.opened {
                right: calc(100% - 140px);
                top: 100px;

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

            .main a {
                cursor: pointer !important;
                color: black !important;
                text-decoration: none !important;
            }

            .main a:hover {
                color: #36C !important;
                text-decoration: underline !important;
            }

            .drop-area {
                height: 100px;
                border: 2px dashed #ccc;
                text-align: center;
                line-height: 100px;
                font-size: 18px;
                color: #999;
                margin-top: 20px;
                cursor: pointer;
                /* Makes the drop area clickable */
            }

            .file-list {
                margin-top: 20px;
            }

            .file-item {
                padding: 5px;
                border: 1px solid #ddd;
                margin: 5px 0;
                font-size: 14px;
            }

            .tooltip-wrapper {
                position: relative;
                display: inline-block;
                cursor: pointer;
            }

            .tooltip {
                visibility: hidden;
                background-color: #ffffff;
                color: #000000;
                font-weight: 900;
                text-align: center;
                border-radius: 5px;
                padding: 5px;
                position: absolute;
                z-index: 10000000;
                bottom: 80%;
                left: 50%;
                transform: translateX(-50%);
                opacity: 0;
                transition: opacity 0.2s;
                white-space: nowrap;
            }

            .tooltip-wrapper:hover .tooltip {
                visibility: visible;
                opacity: 1;
            }

            <style>

            /* Add your custom styles here */
            .file-preview {
                margin: 20px;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #f9f9f9;
            }

            .file-preview h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .file-preview iframe,
            .file-preview img,
            .file-preview pre {
                width: 100%;
                height: 80vh;
                border: none;
                background-color: #fff;
            }

            .file-preview pre {
                white-space: pre-wrap;
                word-wrap: break-word;
                font-family: monospace;
                font-size: 14px;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .create-pop-blur-bg {
                position: fixed;
                background: #80808078;
                width: 100vw;
                top: 0;
                height: 100vh;
                left: 0;
                z-index: 10000;
            }

            .create-pop {
                height: 90%;
                display: flex;
                background: white;
                position: fixed;
                flex-direction: column;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 20px;
                overflow: auto;
            }

            .form-container {
                background: #ffffff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                width: 600px;

            }

            .form-container h1 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
                letter-spacing: 1px;
            }

            .form-container label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
                color: #555;
            }

            .form-container input,
            .form-container textarea,
            .form-container select {
                width: 100%;
                padding: 12px 15px;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
                transition: border-color 0.3s ease;
            }

            .form-container input:focus,
            .form-container select:focus,
            .form-container textarea:focus {
                border-color: #4facfe;
                outline: none;
            }

            .form-container textarea {
                resize: none;
            }

            .form-container button {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, #4facfe, #00f2fe);
                border: none;
                border-radius: 5px;
                color: #ffffff;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s ease;
            }

            .form-container button:hover {
                background: linear-gradient(135deg, #00f2fe, #4facfe);
            }

            .form-container .footer-text {
                text-align: center;
                margin-top: 10px;
                font-size: 14px;
                color: #666;
            }

            .form-container .footer-text a {
                color: #4facfe;
                text-decoration: none;
            }

            .form-container .footer-text a:hover {
                text-decoration: underline;
            }
        </style>
        </style>
    </head>

    <body>

        <div class="main">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Current Version</div>
                <div class="d-flex" style="gap: 24px; align-items: center; position: relative;">
                    @if($file->noControl == 1)
                        {{-- Disable All Actions --}}
                        <div class="tooltip-wrapper disabled">
                            <i class="fa-regular fa-trash-can"></i>
                            <span class="tooltip">Delete (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="50px" viewBox="0 0 16 16" width="50px">
                                <g fill="white">
                                    <path
                                        d="m3 5.49887v4.50113c0 .5523.44772 1 1 1h1.02242c.03095.3434.09346.6777.18461 1h-1.20703c-1.10457 0-2-.8954-2-2v-6c0-1.10457.89543-2 2-2h1.75482c.11386 0 .22431.03886.31308.11016l1.10802.88984h4.82188c1.1046 0 2 .89543 2 2v1.25537c-.3071-.25339-.6422-.47409-1-.65677v-.5986c0-.55228-.4477-1-1-1h-4.76301l-1.09523 1.31936c-.09504.11449-.23613.1807-.38492.18064zm2.5789-2.49887h-1.5789c-.55228 0-1 .44772-1 1v.49887l2.52015.00103.77056-.92825z">
                                    </path>
                                    <path
                                        d="m6.02746 11c.03833.3467.11606.6816.2286 1 .61775 1.7478 2.28461 3 4.24394 3 2.4853 0 4.5-2.0147 4.5-4.5 0-1.07289-.3755-2.05808-1.0022-2.83134-.2852-.35191-.6224-.65992-1-.91234-.7146-.47775-1.5737-.75632-2.4978-.75632-2.48528 0-4.5 2.01472-4.5 4.5 0 .169.00932.3358.02746.5zm4.82614 1.8536c-.1953.1952-.5119.1952-.7072 0-.19522-.1953-.19522-.5119 0-.7072l1.1465-1.1464h-2.7929c-.27614 0-.5-.2239-.5-.5s.22386-.5.5-.5h2.7929l-1.1465-1.14645c-.19522-.19526-.19522-.51184 0-.7071.1953-.19527.5119-.19527.7072 0l2 1.99995c.0479.048.0841.1032.1085.1622.024.0581.0375.1217.0379.1884v.003.003c-.0004.0667-.0139.1303-.0379.1884-.0241.0581-.0595.1126-.1064.16l-.0025.0026z">
                                    </path>
                                </g>
                            </svg>
                            <span class="tooltip">Move (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span class="tooltip">Modify (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <i class="fa-solid fa-lock"></i>
                            <span class="tooltip">Lock (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="tooltip">Reminder (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <i class="fa-solid fa-share-from-square"></i>
                            <span class="tooltip">Share (Disabled)</span>
                        </div>

                        <div class="tooltip-wrapper disabled">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span class="tooltip">Upload New Version (Disabled)</span>
                        </div>
                    @else
                        {{-- Enable actions based on permissions --}}
                        <div class="tooltip-wrapper {{ ($file->can_delete) ? '' : 'disabled' }}" @if($file->can_delete)
                        onclick="deleteFile({{ $file->id }})" @endif>
                            <i class="fa-regular fa-trash-can"></i>
                            <span class="tooltip">Delete</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_move) ? '' : 'disabled' }}" @if($file->can_move)
                        onclick="moveFile({{ $file->id }})" @endif>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="50px" viewBox="0 0 16 16" width="50px">
                                <g fill="white">
                                    <path
                                        d="m3 5.49887v4.50113c0 .5523.44772 1 1 1h1.02242c.03095.3434.09346.6777.18461 1h-1.20703c-1.10457 0-2-.8954-2-2v-6c0-1.10457.89543-2 2-2h1.75482c.11386 0 .22431.03886.31308.11016l1.10802.88984h4.82188c1.1046 0 2 .89543 2 2v1.25537c-.3071-.25339-.6422-.47409-1-.65677v-.5986c0-.55228-.4477-1-1-1h-4.76301l-1.09523 1.31936c-.09504.11449-.23613.1807-.38492.18064zm2.5789-2.49887h-1.5789c-.55228 0-1 .44772-1 1v.49887l2.52015.00103.77056-.92825z">
                                    </path>
                                    <path
                                        d="m6.02746 11c.03833.3467.11606.6816.2286 1 .61775 1.7478 2.28461 3 4.24394 3 2.4853 0 4.5-2.0147 4.5-4.5 0-1.07289-.3755-2.05808-1.0022-2.83134-.2852-.35191-.6224-.65992-1-.91234-.7146-.47775-1.5737-.75632-2.4978-.75632-2.48528 0-4.5 2.01472-4.5 4.5 0 .169.00932.3358.02746.5zm4.82614 1.8536c-.1953.1952-.5119.1952-.7072 0-.19522-.1953-.19522-.5119 0-.7072l1.1465-1.1464h-2.7929c-.27614 0-.5-.2239-.5-.5s.22386-.5.5-.5h2.7929l-1.1465-1.14645c-.19522-.19526-.19522-.51184 0-.7071.1953-.19527.5119-.19527.7072 0l2 1.99995c.0479.048.0841.1032.1085.1622.024.0581.0375.1217.0379.1884v.003.003c-.0004.0667-.0139.1303-.0379.1884-.0241.0581-.0595.1126-.1064.16l-.0025.0026z">
                                    </path>
                                </g>
                            </svg>
                            <span class="tooltip">Move</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_edit) ? '' : 'disabled' }}" @if($file->can_edit)
                        onclick="modifyFile({{ $file->id }})" @endif>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span class="tooltip">Modify</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_lock) ? '' : 'disabled' }}" @if($file->can_lock)
                        onclick="lockFile({{ $file->id }})" @endif>
                            <i class="fa-solid fa-lock"></i>
                            <span class="tooltip">Lock</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_edit) ? '' : 'disabled' }}" @if($file->can_edit)
                        onclick="setReminder({{ $file->id }})" @endif>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="tooltip">Reminder</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_share) ? '' : 'disabled' }}" @if($file->can_share)
                        onclick="shareFile({{ $file->id }})" @endif>
                            <i class="fa-solid fa-share-from-square"></i>
                            <span class="tooltip">Share</span>
                        </div>

                        <div class="tooltip-wrapper {{ ($file->can_upload) ? '' : 'disabled' }}" @if($file->can_upload)
                        onclick="createDoc({{ $file->id }})" @endif>
                            <i class="fa-solid fa-file-circle-plus"></i>
                            <span class="tooltip">Upload New Version</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="create-pop-blur-bg" id="createPop" style="display: none;">
            <div class="create-pop">
                <div class="form-container">
                    <h1>New Document</h1>
                    <form id="documentForm" enctype="multipart/form-data">
                        <!-- Hidden input for existing file ID -->
                        <input type="hidden" name="existing_file_id" id="existingFileId">
                        <!-- Hidden input to store the parent_id of the opened file -->
                        <input type="hidden" id="parentId" name="parent_id" value="{{ $file->parent_id }}">
                        <label for="name">Document Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter document name" required>

                        <label for="document-no">Document No.</label>
                        <input type="text" name="document_no" id="document-no" placeholder="Enter document number" required>

                        <label for="version-no">Version No.</label>
                        <input type="text" name="version_no" id="version-no" placeholder="Enter version number" required>

                        <label for="status">Status</label>
                        <select name="status" id="status" required>
                            <option value="">Select Status</option>
                            <option value="Draft">Draft</option>
                            <option value="Approved">Approved</option>
                        </select>

                        <label for="upload-date">Upload Date</label>
                        <input type="date" name="upload_date" id="upload-date" required>

                        <label for="retention-period">Retention Period</label>
                        <input type="date" name="retention_period" id="retention-period">

                        <label for="tags">Tags</label>
                        <input type="text" name="tags" id="tags" placeholder="Enter tags">

                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5"
                            placeholder="Write your description here..."></textarea>

                        <label for="upload-doc">Upload Document</label>
                        <input type="file" name="files" id="upload-doc" accept=".pdf,.doc,.docx,.txt,.jpg,.png,.xlsx,.xls"
                            required>

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- CSS to disable clicks on disabled actions --}}
        <style>
            .tooltip-wrapper.disabled {
                pointer-events: none;
                opacity: 0.5;
            }
        </style>



        <div class="d-flex">
            <div class="container1">
                <div style="display: none;" id="dropArea" class="drop-area" ondrop="uploadNewVersion({{ $file->id }})"
                    ondragover="allowDrop(event)">
                    Drag and drop your file here or
                </div>
                <input type="file" id="fileInput" multiple style="display: none;"
                    onchange="uploadNewVersion({{ $file->id }})" />

                <div class="file-preview">
                    @php
                        $fileUrl = asset('public/documents/' . $file->doc_file);
                        \Log::info('File URL: ' . $fileUrl);
                    @endphp

                    @if (file_exists(public_path('documents/' . $file->doc_file)))
                        @if (Str::endsWith($file->doc_file, '.pdf'))
                            <!-- PDF Hyperlink -->
                            <!-- <iframe src="{{ $fileUrl }}" width="100%" height="600px" style="border: none;"></iframe> -->
                            <iframe src="{{ $fileUrl }}#toolbar=0" width="100%" height="600px" style="border: none;"></iframe>
                        @elseif (Str::endsWith($file->doc_file, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                            <!-- Image Preview -->
                            <img src="{{ $fileUrl }}" alt="{{ $file->name }}" style="max-width: 100%; height: auto;">
                        @elseif (Str::endsWith($file->doc_file, ['.txt', '.csv', '.log']))
                            <!-- Text Preview -->
                            <pre
                                style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; max-height: 500px; overflow: auto;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ file_get_contents(public_path('documents/' . $file->doc_file)) }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </pre>
                        @elseif (Str::endsWith($file->doc_file, ['.xls', '.xlsx', '.doc', '.docx', '.ppt', '.pptx']))
                            <!-- Office Files Preview (Word & Excel) -->
                            <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode($fileUrl) }}"
                                style="width: 100%; height: 600px;" frameborder="0"></iframe>
                        @elseif (Str::endsWith($file->doc_file, ['.mp4', '.webm', '.ogg']))
                            <!-- Video Preview -->
                            <video width="100%" height="500px" controls>
                                <source src="{{ $fileUrl }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @elseif (Str::endsWith($file->doc_file, ['.mp3', '.wav', '.ogg']))
                            <!-- Audio Preview -->
                            <audio controls>
                                <source src="{{ $fileUrl }}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        @else
                            <!-- Unsupported File -->
                            <p>This file type is not supported for preview.</p>
                            <p><a href="{{ $fileUrl }}" target="_blank">Download File</a></p>
                        @endif
                    @else
                        <p>File not found on the server!</p>
                    @endif
                </div>





                <!-- Hidden file input element -->
                <!-- <div id="dropArea" class="drop-area" ondrop="handleDrop(event)" ondragover="allowDrop(event)">
                                                                                                                                                                                Drag and drop your file here or <button onclick="document.getElementById('fileInput').click()">Browse</button>
                                                                                                                                                                            </div> -->




            </div>


            <div class="container2">
                <div class="document-details">
                    <div class="document-details__row">
                        <label class="document-details__label">Document Name:</label>
                        <p class="document-details__value">{{$file->name}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Document No:</label>
                        <p class="document-details__value">{{$file->document_no}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Tags:</label>
                        <p class="document-details__value">{{$file->tags}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Version No:</label>
                        <p class="document-details__value">{{$file->version_no}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Status:</label>
                        <p class="document-details__value">{{$file->status}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Upload Date:</label>
                        <p class="document-details__value">{{$file->uploaded_at}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Document Owner:</label>
                        <p class="document-details__value">{{$file->uploaded_by}}</p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Retention Period:</label>
                        <p class="document-details__value">
                            {{ $file->retention_period === null ? '∞' : $file->retention_period }}
                        </p>
                    </div>
                    <div class="document-details__row">
                        <label class="document-details__label">Amendments Notes:</label>
                        <p class="document-details__value">{{$file->description}}</p>
                    </div>
                </div>
                <div class="actions">
                    <button onclick="openDocument3('Draft Versions')">Draft Versions</button>
                    <button onclick="openDocument2('Obsolete Files')">Obsolete Files</button>
                    <button onclick="openDocument1('Audit Log')">Audit Log</button>
                </div>

            </div>

        </div>

        <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
            X
        </div>
        <div id="documentOpen1" class="panel1">
            <div style="position: relative; ">
                <div class="mb-4 heading" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;" id='documentPanel1Heading'> Details </div>
                </div>
            </div>

            <div class="table-responsive">

                <table class=" stock-planner-table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>28/12/2024 13:17:28</td>
                            <td>---</td>
                            <td>Added file</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div id="documentClose2" class="closeBtn1" onclick="documentClose2()">
            X
        </div>
        <div id="documentOpen2" class="panel1">
            <div style="position: relative; ">
                <div class="mb-4 heading" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;" id='documentPanel2Heading'> Details </div>
                </div>
            </div>

            <div class="table-responsive">

                <table class=" stock-planner-table">
                    <thead>
                        <tr>
                            <th>Document No</th>
                            <th>Document Name</th>
                            <th>Tags</th>
                            <th>Version No</th>
                            <th>Uploaded Date</th>
                            <th>Document Owner</th>
                            <th>Obsolete Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obsoleteFiles as $item)
                            <tr>
                                <td>{{$item->document_no}}</td>
                                <td><a
                                        onclick="openDocument21('Instructions to prepare development environment to support multiple Node.js versions')">{{$item->name}}</a>
                                </td>
                                <td>{{$item->tags}}</td>
                                <td>{{$item->version_no}}</td>
                                <td>{{$item->uploaded_at}}</td>
                                <td>--</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>



            <div id="documentClose21" class="closeBtn2" onclick="documentClose21()">
                X
            </div>
            <div id="documentOpen21" class="panel2">
                <div style="position: relative; ">
                    <div class="mb-4 heading" style="margin-top: 0.6rem;">
                        <div style="font-size: 20px;" id='documentPanel21Heading'> Details </div>
                        <div class="d-flex" style="gap: 24px;    align-items: center;">
                            <div class="tooltip-wrapper">
                                <i class="fa-regular fa-trash-can"></i>
                                <span class="tooltip">Delete</span>
                            </div>

                            <div class="tooltip-wrapper">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="50px" viewBox="0 0 16 16"
                                    width="50px">
                                    <g fill="white">
                                        <path
                                            d="m3 5.49887v4.50113c0 .5523.44772 1 1 1h1.02242c.03095.3434.09346.6777.18461 1h-1.20703c-1.10457 0-2-.8954-2-2v-6c0-1.10457.89543-2 2-2h1.75482c.11386 0 .22431.03886.31308.11016l1.10802.88984h4.82188c1.1046 0 2 .89543 2 2v1.25537c-.3071-.25339-.6422-.47409-1-.65677v-.5986c0-.55228-.4477-1-1-1h-4.76301l-1.09523 1.31936c-.09504.11449-.23613.1807-.38492.18064zm2.5789-2.49887h-1.5789c-.55228 0-1 .44772-1 1v.49887l2.52015.00103.77056-.92825z" />
                                        <path
                                            d="m6.02746 11c.03833.3467.11606.6816.2286 1 .61775 1.7478 2.28461 3 4.24394 3 2.4853 0 4.5-2.0147 4.5-4.5 0-1.07289-.3755-2.05808-1.0022-2.83134-.2852-.35191-.6224-.65992-1-.91234-.7146-.47775-1.5737-.75632-2.4978-.75632-2.48528 0-4.5 2.01472-4.5 4.5 0 .169.00932.3358.02746.5zm4.82614 1.8536c-.1953.1952-.5119.1952-.7072 0-.19522-.1953-.19522-.5119 0-.7072l1.1465-1.1464h-2.7929c-.27614 0-.5-.2239-.5-.5s.22386-.5.5-.5h2.7929l-1.1465-1.14645c-.19522-.19526-.19522-.51184 0-.7071.1953-.19527.5119-.19527.7072 0l2 1.99995c.0479.048.0841.1032.1085.1622.024.0581.0375.1217.0379.1884v.003.003c-.0004.0667-.0139.1303-.0379.1884-.0241.0581-.0595.1126-.1064.16l-.0025.0026z" />
                                    </g>
                                </svg>
                                <span class="tooltip">Move</span>
                            </div>

                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-share-from-square"></i>
                                <span class="tooltip">Share</span>
                            </div>
                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="tooltip">Modify</span>
                            </div>
                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-lock"></i>
                                <span class="tooltip">Lock</span>
                            </div>

                            <div class="tooltip-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                                <span class="tooltip">Reminder</span>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="container1">


                    </div>


                    <div class="container2">
                        <div class="document-details">
                            <div class="document-details__row">
                                <label class="document-details__label">Document Name:</label>
                                <p class="document-details__value">Instructions to prepare development environment to
                                    support multiple Node.js versions</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Document No:</label>
                                <p class="document-details__value">1212</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Tags:</label>
                                <p class="document-details__value">New</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Version No:</label>
                                <p class="document-details__value">1.15</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Status:</label>
                                <p class="document-details__value">Approved</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Upload Date:</label>
                                <p class="document-details__value">28-12-2024</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Retention Period:</label>
                                <p class="document-details__value">2 Years</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Amendments Notes:</label>
                                <p class="document-details__value">Instructions to prepare development environment to
                                    support multiple Node.js versions</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div id="documentClose3" class="closeBtn1" onclick="documentClose3()">
            X
        </div>
        <div id="documentOpen3" class="panel1">
            <div style="position: relative; ">
                <div class="mb-4 heading" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;" id='documentPanel3Heading'> Details </div>
                </div>
            </div>

            <div class="table-responsive">

                <table class=" stock-planner-table">
                    <thead>
                        <tr>
                            <th>Document No</th>
                            <th>Document Name</th>
                            <th>Tag</th>
                            <th>Draft Version</th>
                            <th>Uploaded Date</th>
                            <th>Document Owner</th>
                            <th>Draft Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1122</td>
                            <td><a
                                    onclick="openDocument31('Instructions to prepare development environment to support multiple Node.js versions')">Instructions
                                    to prepare development environment to support multiple Node.js versions</a></td>
                            <td>New</td>
                            <td>1.10</td>
                            <td>27-12-2024</td>
                            <td>Hemanth</td>
                            <td>28-12-2024</td>
                            <td>Draft</td>
                        </tr>
                    </tbody>
                </table>

            </div>



            <div id="documentClose31" class="closeBtn2" onclick="documentClose31()">
                X
            </div>
            <div id="documentOpen31" class="panel2">
                <div style="position: relative; ">
                    <div class="mb-4 heading" style="margin-top: 0.6rem;">
                        <div style="font-size: 20px;" id='documentPanel31Heading'> Details </div>
                        <div class="d-flex" style="gap: 24px;    align-items: center;">
                            <div class="tooltip-wrapper" title="">
                                <i class="fa-regular fa-trash-can"></i>
                                <span class="tooltip">Delete</span>
                            </div>
                            <div class="tooltip-wrapper" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="50px" viewBox="0 0 16 16"
                                    width="50px">
                                    <g fill="white">
                                        <path
                                            d="m3 5.49887v4.50113c0 .5523.44772 1 1 1h1.02242c.03095.3434.09346.6777.18461 1h-1.20703c-1.10457 0-2-.8954-2-2v-6c0-1.10457.89543-2 2-2h1.75482c.11386 0 .22431.03886.31308.11016l1.10802.88984h4.82188c1.1046 0 2 .89543 2 2v1.25537c-.3071-.25339-.6422-.47409-1-.65677v-.5986c0-.55228-.4477-1-1-1h-4.76301l-1.09523 1.31936c-.09504.11449-.23613.1807-.38492.18064zm2.5789-2.49887h-1.5789c-.55228 0-1 .44772-1 1v.49887l2.52015.00103.77056-.92825z" />
                                        <path
                                            d="m6.02746 11c.03833.3467.11606.6816.2286 1 .61775 1.7478 2.28461 3 4.24394 3 2.4853 0 4.5-2.0147 4.5-4.5 0-1.07289-.3755-2.05808-1.0022-2.83134-.2852-.35191-.6224-.65992-1-.91234-.7146-.47775-1.5737-.75632-2.4978-.75632-2.48528 0-4.5 2.01472-4.5 4.5 0 .169.00932.3358.02746.5zm4.82614 1.8536c-.1953.1952-.5119.1952-.7072 0-.19522-.1953-.19522-.5119 0-.7072l1.1465-1.1464h-2.7929c-.27614 0-.5-.2239-.5-.5s.22386-.5.5-.5h2.7929l-1.1465-1.14645c-.19522-.19526-.19522-.51184 0-.7071.1953-.19527.5119-.19527.7072 0l2 1.99995c.0479.048.0841.1032.1085.1622.024.0581.0375.1217.0379.1884v.003.003c-.0004.0667-.0139.1303-.0379.1884-.0241.0581-.0595.1126-.1064.16l-.0025.0026z" />
                                    </g>
                                </svg>
                                <span class="tooltip">Move</span>
                            </div>

                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-share-from-square"></i>
                                <span class="tooltip">Share</span>
                            </div>
                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="tooltip">Modify</span>
                            </div>
                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-lock"></i>
                                <span class="tooltip">Lock</span>
                            </div>

                            <div class="tooltip-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                                <span class="tooltip">Reminder</span>

                            </div>
                            <div class="tooltip-wrapper">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                <span class="tooltip" style="left: -20px;">Upload New version</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="container1">


                    </div>


                    <div class="container2">
                        <div class="document-details">
                            <div class="document-details__row">
                                <label class="document-details__label">Document Name:</label>
                                <p class="document-details__value">Instructions to prepare development environment to
                                    support multiple Node.js versions</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Document No:</label>
                                <p class="document-details__value">1212</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Tags:</label>
                                <p class="document-details__value">New</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Draft Version:</label>
                                <p class="document-details__value">1.15</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Status:</label>
                                <p class="document-details__value">Daft</p>
                            </div>
                            <div class="document-details__row">
                                <label class="document-details__label">Upload Date:</label>
                                <p class="document-details__value">28-12-2024</p>
                            </div>
                            <div class="document-details__row">

                                <label class="document-details__label">Amendments Notes:</label>
                                <p class="document-details__value">Instructions to prepare development environment to
                                    support multiple Node.js versions</p>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class=" stock-planner-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Suman</td>
                                        <td>Accepted</td>
                                    </tr>
                                    <tr>
                                        <td>Hemanth</td>
                                        <td>Changes Made</td>
                                    </tr>
                                    <tr>
                                        <td>Madfhu</td>
                                        <td>Rejected</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

    </body>

    <script>
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');

        // Prevent default behavior of dragover event
        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.style.backgroundColor = '#f0f0f0'; // Change background when dragging over
        });

        // Revert background color when not over drop area
        dropArea.addEventListener('dragleave', () => {
            dropArea.style.backgroundColor = '#fff';
        });

        // Handle the drop event
        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.style.backgroundColor = '#fff';

            // Get the files from the drop event
            const files = event.dataTransfer.files;
            handleFileUpload(files);  // Call the new unified function
        });

        // Open file input dialog when drop area is clicked
        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Handle file input change (when files are selected through file dialog)
        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            handleFileUpload(files);  // Call the new unified function
        });

        // Function to display file names in the file list
        function displayFiles(files) {
            // fileList.innerHTML = ''; // Clear previous file list
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');
                fileItem.textContent = file.name;
                // fileList.appendChild(fileItem);
            }
        }
        //     function handleDrop(event) {
        //     event.preventDefault();
        //     let files = event.dataTransfer.files;
        //     uploadFiles(files);
        // }
        function openDocument1(name) {
            document.getElementById('documentPanel1Heading').textContent = name
            document.getElementById('documentClose1').classList.add('opened');
            document.getElementById('documentOpen1').classList.add('open');
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');

        }

        function openDocument2(name) {
            document.getElementById('documentPanel2Heading').textContent = name
            document.getElementById('documentClose2').classList.add('opened');
            document.getElementById('documentOpen2').classList.add('open');
        }

        function documentClose2() {
            document.getElementById('documentClose2').classList.remove('opened');
            document.getElementById('documentOpen2').classList.remove('open');

        }

        function openDocument21(name) {
            document.getElementById('documentPanel21Heading').textContent = 'Obsolete Version'
            document.getElementById('documentClose21').classList.add('opened');
            document.getElementById('documentOpen21').classList.add('open');
        }

        function documentClose21() {
            document.getElementById('documentClose21').classList.remove('opened');
            document.getElementById('documentOpen21').classList.remove('open');

        }

        function openDocument3(name) {
            document.getElementById('documentPanel3Heading').textContent = name
            document.getElementById('documentClose3').classList.add('opened');
            document.getElementById('documentOpen3').classList.add('open');
        }

        function documentClose3() {
            document.getElementById('documentClose3').classList.remove('opened');
            document.getElementById('documentOpen3').classList.remove('open');

        }

        function openDocument31(name) {
            document.getElementById('documentPanel31Heading').textContent = "Draft Version"
            document.getElementById('documentClose31').classList.add('opened');
            document.getElementById('documentOpen31').classList.add('open');
        }

        function documentClose31() {
            document.getElementById('documentClose31').classList.remove('opened');
            document.getElementById('documentOpen31').classList.remove('open');

        }



        // Function to open the upload form
        function createDoc(fileId) {
            // Set the existing file ID in a hidden input field
            document.getElementById('existingFileId').value = fileId;
            document.getElementById('createPop').style.display = "block";
        }

        // Close the popup when clicking outside
        document.getElementById("createPop").addEventListener("click", function (event) {
            if (event.target === this) {
                this.style.display = "none"; // Hide the popup when clicking outside
            }
        });

        // Handle form submission
        const form = document.getElementById('documentForm');
        form.removeEventListener('submit', handleFormSubmit); // Remove existing listener
        form.addEventListener('submit', handleFormSubmit); // Add the event listener

        function handleFormSubmit(event) {
            console.log('Form submit event triggered'); // Log the form submission
            event.preventDefault(); // Prevent default form submission

            const submitButton = document.querySelector('#documentForm button[type="submit"]');
            submitButton.disabled = true; // Disable the submit button

            const folderId = window.location.pathname.split('/').pop(); // Extract folder ID from URL
            const existingFileId = document.getElementById('existingFileId').value; // Get the existing file ID

            if (!folderId || !existingFileId) {
                alert('Folder ID or File ID is missing. Please try again.');
                submitButton.disabled = false; // Re-enable the button
                return;
            }

            const fileInput = document.getElementById('upload-doc');
            const file = fileInput.files[0]; // Get the single file

            if (!file) {
                alert('Please select a file to upload.');
                submitButton.disabled = false; // Re-enable the button
                return;
            }

            console.log(file, 'Selected file');

            // Call the uploadFiles function with the existing file ID
            uploadFilesss(file, folderId, existingFileId);
        }

        let isUploading = false;

        function uploadFilesss(file, folderId, existingFileId) {
            console.log('uploadFiles function called'); // Log the function call
            if (isUploading) {
                console.log('Upload already in progress. Skipping duplicate call.');
                return;
            }

            isUploading = true; // Set the flag to true
            console.log('Uploading file...');
            const formData = new FormData();

            // Append the single file to FormData
            formData.append('files', file); // Use 'files' (singular) for single file upload

            // Append form data to FormData
            const form = document.getElementById('documentForm');
            const formInputs = new FormData(form);

            for (const [key, value] of formInputs.entries()) {
                console.log('Appending form data:', key, value);
                formData.append(key, value);
            }

            // Append the existing file ID to FormData
            formData.append('existing_file_id', existingFileId);

            // Add a unique request ID to detect duplicates
            formData.append('request_id', Date.now());

            // Send the request to the server
            fetch(`/api/upload-files-view/${folderId}`, {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    console.log('Response received:', response);
                    if (!response.ok) {
                        return response.text().then(errMsg => { throw new Error(errMsg); });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        alert('File uploaded successfully!');

                        // Redirect to the new file's page
                        window.location.href = `/documents/view/${data.document_id}`;
                    } else {
                        alert('Failed to upload file! ' + (data.message || 'Unknown error.'));
                    }
                })
                .catch(error => {
                    console.error('Error uploading file:', error);
                    alert('Error: ' + error.message);
                })
                .finally(() => {
                    isUploading = false; // Reset the flag after the upload is complete
                    submitButton.disabled = false; // Re-enable the submit button
                });
        }
    </script>
    <script>


        // function handleDrop(event) {
        //     event.preventDefault();
        //     let files = event.dataTransfer.files;
        //     uploadFiles(files);
        // }

        // function handleFileSelect(event) {
        //     let files = event.target.files;
        //     uploadFiles(files);
        // }

        // function uploadFiles(files) {
        //     const parentId = {{ $file->id }}; // Ensure this ID exists
        //     let formData = new FormData();
        //     formData.append('_token', '{{ csrf_token() }}');
        //     formData.append('parent_id', parentId); // Send parent_id

        //     // Check if files are selected
        //     if (files.length === 0) {
        //         alert('No files selected!');
        //         return;
        //     }

        //     // Append each file to FormData
        //     for (let i = 0; i < files.length; i++) {
        //         formData.append('file[]', files[i]); // Ensure using 'file[]'
        //     }

        //     console.log("Uploading files:", formData); // Log FormData contents

        //     fetch("/api/upload-files/new", {
        //         method: "POST",
        //         body: formData,
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             console.log("Upload response:", data); // Log response
        //             if (data.success) {
        //                 alert('Files uploaded successfully!');
        //                 window.location.href = `https://domas.mytrustlab.co.in/documents/view/${data.doc_id}`;
        //             } else {
        //                 alert('File upload failed: ' + data.message);
        //             }
        //         })
        //         .catch(error => console.error('Error:', error));
        // }


        function deleteFile(fileId) {
            if (confirm("Are you sure you want to delete this file?")) {
                fetch(`/api/files/${fileId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('File deleted successfully!');
                            window.history.go(-2);
                            // window.location.reload();// Go back two steps in history
                        } else {
                            alert('Failed to delete file!');
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting file:', error);
                        alert('An error occurred while deleting the file.');
                    });
            }
        }
        function moveFile(fileId) {
            const newFolderId = prompt("Enter the ID of the new folder:");
            if (newFolderId) {
                fetch(`/api/move-file/${fileId}/${newFolderId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('File moved successfully!');
                            window.location.reload(); // Refresh the page
                        } else {
                            alert('Failed to move file!');
                        }
                    })
                    .catch(error => {
                        console.error('Error moving file:', error);
                        alert('An error occurred while moving the file.');
                    });
            }
        }

        function shareFile(fileId) {
            const email = prompt("Enter the email address to share the file with:");
            if (email) {
                fetch(`/api/share-file/${fileId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email }),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('File shared successfully!');
                        } else {
                            alert('Failed to share file!');
                        }
                    })
                    .catch(error => console.error('Error sharing file:', error));
            }
        }

        // Repeat for other functions...
        // Modify File
        function modifyFile(fileId) {
            const newName = prompt("Enter the new name for the file:");
            if (newName) {
                fetch(`/api/files/${fileId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ name: newName }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('File modified successfully!');
                            window.location.reload(); // Refresh the page
                        } else {
                            alert('Failed to modify file!');
                        }
                    })
                    .catch(error => console.error('Error modifying file:', error));
            }
        }
        function lockFile(fileId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/api/lock-file/${fileId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Add CSRF token here
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('File locked successfully!');
                    } else {
                        alert('Failed to lock file!');
                    }
                })
                .catch(error => console.error('Error locking file:', error));
        }


        // Set Reminder for File
        function setReminder(fileId) {
            const reminderDate = prompt("Enter the reminder date (YYYY-MM-DD):");
            if (reminderDate) {
                fetch(`/api/set-reminder/${fileId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ reminder_date: reminderDate }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Reminder set successfully!');
                        } else {
                            alert('Failed to set reminder!');
                        }
                    })
                    .catch(error => console.error('Error setting reminder:', error));
            }
        }

        // function handleFileSelect(event) {
        //     let files = event.target.files;
        //     uploadFiles(files);
        // }

        function uploadFilesDrop(files, file) {
            const fileId = {{ $file->id }}
                let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');

            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }

            fetch(`/api/upload-new-version/${fileId}`, {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('New version uploaded successfully!');
                        window.location.href = `https://domas.mytrustlab.co.in/documents/view/${data.doc_id}`;
                    } else {
                        alert('File upload failed: ' + data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
        //     function uploadFiles(files) {
        //     const parentId = {{ $file->id }};
        //     let formData = new FormData();
        //     formData.append('_token', '{{ csrf_token() }}');
        //     formData.append('parent_id', parentId);

        //     for (let i = 0; i < files.length; i++) {
        //         formData.append('file[]', files[i]); // Ensure using 'file[]'
        //     }

        //     console.log("Uploading files:", formData); // Log formData

        //     fetch("/api/upload-files/new", {
        //         method: "POST",
        //         body: formData,
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log("Upload response:", data); // Log response
        //         if (data.success) {
        //             alert('Files uploaded successfully!');
        //             window.location.href = `https://domas.mytrustlab.co.in/documents/view/${data.doc_id}`;
        //         } else {
        //             alert('File upload failed: ' + data.message);
        //         }
        //     })
        //     .catch(error => console.error('Error:', error));
        // }



        function uploadFile(file) {
            const fileId = {{ $file->id }}; // Assuming you're passing the fileId from Blade
            const formData = new FormData();
            formData.append('file', file);

            // Make an API request to upload the file
            fetch(`/api/upload-new-version/${fileId}`, {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('New version uploaded successfully!'); // Alert on success
                        updateFilePreview(data.file); // Update the preview with the new file

                    } else {
                        alert('Failed to upload new version!'); // Alert on failure
                    }
                })
                .catch(error => console.error('Error uploading new version:', error));
        }

        function uploadNewVersion(fileId) {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.pdf,.doc,.docx,.txt,.jpg,.png,.gif';

            // Get the CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fileInput.onchange = (e) => {
                const file = e.target.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append('file', file);

                    fetch(`/api/upload-new-version/${fileId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken, // Add CSRF token to the request headers
                        },
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('New version uploaded successfully!');
                                window.location.href = `https://domas.mytrustlab.co.in/documents/view/${data.doc_id}`;

                            } else {
                                alert('Failed to upload new version!');
                            }
                        })
                        .catch(error => console.error('Error uploading new version:', error));
                }
            };

            fileInput.click();
        }

        function updateFilePreview(file) {
            const previewSection = document.querySelector('.file-preview');
            previewSection.innerHTML = ''; // Clear existing preview

            if (file.doc_file.endsWith('.pdf')) {
                // PDF Preview
                previewSection.innerHTML = `<iframe src="${file.doc_file}" width="100%" height="600px" style="border: none;"></iframe>`;
            } else if (file.doc_file.match(/\.(jpg|jpeg|png|gif|webp)$/)) {
                // Image Preview
                previewSection.innerHTML = `<img src="${file.doc_file}" alt="${file.name}" style="max-width: 100%; height: auto;">`;
            } else if (file.doc_file.match(/\.(txt|csv|log)$/)) {
                // Text Preview
                fetch(file.doc_file)
                    .then(response => response.text())
                    .then(text => {
                        previewSection.innerHTML = `<pre style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; max-height: 500px; overflow: auto;">${text}</pre>`;
                    })
                    .catch(error => console.error('Error loading text file:', error));
            } else if (file.doc_file.match(/\.(xls|xlsx|doc|docx)$/)) {
                // Office Files Preview
                previewSection.innerHTML = `<iframe src="https://view.officeapps.live.com/op/view.aspx?src=${encodeURIComponent(file.doc_file)}" style="width: 100%; height: 500px;" frameborder="0"></iframe>`;
            } else if (file.doc_file.match(/\.(mp4|webm|ogg)$/)) {
                // Video Preview
                previewSection.innerHTML = `
                                                                                <video width="100%" height="500px" controls>
                                                                                    <source src="${file.doc_file}" type="video/mp4">
                                                                                    Your browser does not support the video tag.
                                                                                </video>
                                                                            `;
            } else if (file.doc_file.match(/\.(mp3|wav|ogg)$/)) {
                // Audio Preview
                previewSection.innerHTML = `
                                                                                <audio controls>
                                                                                    <source src="${file.doc_file}" type="audio/mpeg">
                                                                                    Your browser does not support the audio tag.
                                                                                </audio>
                                                                            `;
            } else {
                // Unsupported File
                previewSection.innerHTML = `
                                                                                <p>This file type is not supported for preview.</p>
                                                                                <p><a href="${file.doc_file}" target="_blank">Download File</a></p>
                                                                            `;
            }
        }
    </script>

    </html>
@endsection