@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agreement</title>
    </head>
    <style>
        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: left !important;
            max-width: 3rem;
        }

        .stock-planner-table th {
            font-size: 12px;
            background-color: #5e0000 !important;
            color: white !important;
        }



        .stock-planner-table tbody tr:hover {
            color: #5e0000;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .stock-planner-table tbody a {
            color: inherit !important;
            text-decoration: none;

        }

        .stock-planner-table tbody a:hover {
            text-decoration: underline;
        }


        .stock-planner-table tbody tr:hover>td a {
            color: #5e0000 !important;

        }

        .stock-planner-table td {
            font-size: 12px;
            border-bottom: 1px solid #adbfc8;
            transition: all 0.3s ease;
        }

        .stock-planner-table tbody tr:hover>td {
            font-weight: 600;
            font-size: 14px;
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .search-style {
            width: 200px;
            font-size: medium;
            height: 40px;
            border-radius: 8px;
            padding: 8px;
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

    <body>
        <div class="main">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">{{ ucfirst($folder->name) }}</div>
                <div>
                    <input class="search-style" placeholder="Search" />
                    <button class="btn btn-warning" onclick="createDoc()">Add New Doc.</button>
                </div>
            </div>

            <div class="slb_leaderboard" id="fileListContainer">
                <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 8px;">Document No.</th>
                                <th style="min-width: 5rem;">Document Name</th>
                                <th>Tags</th>
                                <th>Version No.</th>
                                <th>Upload Date</th>
                                <th>Document Owner</th>
                                <th>Retention Period</th>
                                <th style="border-top-right-radius: 8px;">Status</th>
                            </tr>
                        </thead>
                        <tbody id="filesTableBody">
                            <!-- Files will be dynamically populated here -->
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="create-pop-blur-bg" id="createPop" style="display: none;">
                <div class="create-pop">
                    <div class="form-container">
                        <h1>New Document</h1>
                        <form id="documentForm" enctype="multipart/form-data">
                            <label for="name">Document Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter document name" required>

                            <label for="document-no">Document No.</label>
                            <input type="text" name="document_no" id="document-no" placeholder="Enter document number"
                                required>

                            <label for="version-no">Version No.</label>
                            <input type="text" name="version_no" id="version-no" placeholder="Enter version number"
                                required>

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
                            <input type="file" name="files" id="upload-doc" accept=".pdf,.doc,.docx,.txt,.jpg,.png"
                                required>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        // Function to show the popup
        function createDoc() {
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

            if (!folderId) {
                alert('Folder ID is missing. Please try again.');
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

            // Call the uploadFiles function directly
            uploadFiles(file, folderId);
        }
        let isUploading = false;

        function uploadFiles(file, folderId) {
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

            // Add a unique request ID to detect duplicates
            formData.append('request_id', Date.now());

            // Send the request to the server
            fetch(`/api/upload-files/${folderId}`, {
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
                        fetchFiles(folderId); // Refresh folder list
                        document.getElementById('createPop').style.display = 'none';
                        location.reload();// Hide the popup
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
        function fetchFiles(folderId) {
            console.log("Fetching files for folder ID:", folderId);
            fetch(`/api/files/${folderId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Received response:", data);

                    const files = data.files || []; // Ensure 'files' exists in the response
                    const filesTableBody = document.getElementById("filesTableBody");
                    filesTableBody.innerHTML = ""; // Clear previous data

                    if (files.length === 0) {
                        filesTableBody.innerHTML = `
                                                            <tr>
                                                                <td colspan="8" style="text-align: center;">No files found in this folder.</td>
                                                            </tr>
                                                        `;
                        return;
                    }

                    files.forEach(file => {
                        // Check if the file is readable or locked
                        let fileLink = file.is_readable
                            ? `<a href="/documents/view/${file.id}" target="_blank">${file.name}</a>`
                            : `<span class="text-muted">${file.name} (No Access)</span>`;

                        // Icons
                        const eyeIcon = file.is_readable
                            ? '<i class="fas fa-eye" title="View file" style="color: green; margin-left: 5px;"></i>'
                            : '';
                        const lockIcon = file.is_locked
                            ? '<i class="fas fa-lock" title="Locked file" style="color: red; margin-left: 5px;"></i>'
                            : '';

                        // Create table row
                        const row = document.createElement("tr");
                        row.innerHTML = `
                                                            <td>${file.document_no}</td>
                                                            <td>${fileLink} ${eyeIcon} ${lockIcon}</td>
                                                            <td>${file.tags || "N/A"}</td>
                                                            <td>${file.version_no || "N/A"}</td>
                                                            <td>${file.uploaded_at || "N/A"}</td>
                                                            <td>${file.document_owner || "CMD"}</td>
                                                            <td>${file.retention_period === null ? '<span style="font-size: 28px; font-weight: bold;">∞</span>' : file.retention_period}</td>

                                                            <td>${file.status || "N/A"}</td>
                                                        `;

                        // Prevent access if the file is locked for the user
                        if (file.is_locked_for_user) {
                            const linkElement = row.querySelector("a");
                            if (linkElement) {
                                linkElement.addEventListener("click", function (event) {
                                    event.preventDefault();
                                    alert("This file is locked and cannot be accessed.");
                                });
                            }
                        }

                        filesTableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching files:', error);
                    const filesTableBody = document.getElementById("filesTableBody");
                    filesTableBody.innerHTML = `
                                                        <tr>
                                                            <td colspan="8" style="text-align: center; color: red;">Error: ${error.message}</td>
                                                        </tr>
                                                    `;
                });
        }

        // Fetch files when the page loads
        const folderId = window.location.pathname.split('/').pop(); // Extract folder ID from URL
        fetchFiles(folderId);    </script>

    </html>
@endsection