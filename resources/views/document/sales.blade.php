@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales</title>
        <style>
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

            .breadcrumb {
                padding: 10px;
                font-size: 14px;
                background: #e9ecef;
                display: flex;
                gap: 5px;
                align-items: center;
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

            .context-menu {
                position: absolute;
                background: #f8f9fa;
                border-radius: 8px;
                border: 1px solid #e1e4e8;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                display: none;
                z-index: 1000;
                min-width: 180px;
                animation: fadeIn 0.3s ease-out;
            }

            .context-menu ul {
                list-style: none;
                margin: 0;
                padding: 10px 0;
            }

            .context-menu ul li {
                padding: 12px 20px;
                cursor: pointer;
                font-size: 15px;
                color: #495057;
                transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
            }

            .context-menu ul li:hover {
                background: #007bff;
                color: #fff;
                border-radius: 4px;
                transform: translateY(-5px);
            }

            .context-menu ul li:active {
                background: #0056b3;
                transform: translateX(2px);
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .pc-setting-icon {
                color: transparent;
                position: absolute;
                top: 45px;
                right: 32px;
                border-radius: 4px;
                padding: 3px;
                transition: color 0.5s ease;

            }

            .pc-setting-icon {}

            .pc-folder:hover>.pc-setting-icon {
                background-color: #ffffff;
                color: #17446d !important;
            }

            .locked-folder {
                opacity: 0.6;
                pointer-events: none;
                /* Disable clicks on locked folders */
            }

            .locked-folder .pc-folder-icon {
                color: #ff0000;
                /* Red color for locked folders */
            }

            /* .no-folders {
                                                                                                                                                                                                                                                text-align: center;
                                                                                                                                                                                                                                                padding: 20px;
                                                                                                                                                                                                                                                font-size: 16px;
                                                                                                                                                                                                                                                color: #666;
                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                            .no-folders p {
                                                                                                                                                                                                                                                margin-bottom: 10px;
                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                            .btn-warning {
                                                                                                                                                                                                                                                background-color: #ffc107;
                                                                                                                                                                                                                                                color: #000;
                                                                                                                                                                                                                                                border: none;
                                                                                                                                                                                                                                                padding: 10px 20px;
                                                                                                                                                                                                                                                cursor: pointer;
                                                                                                                                                                                                                                                border-radius: 5px;
                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                            .btn-warning:hover {
                                                                                                                                                                                                                                                background-color: #e0a800;
                                                                                                                                                                                                                                            } */


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
    </head>

    <body>
        <div class="main">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div id="folder-title" style="font-size: 20px;">Documents Manager</div>
                <div id="headerbuttons"></div>
            </div>

        </div>
        <div class="breadcrumb" id="breadcrumb" style="color: #666; font-size: 14px; text-align: center;">
            Drop the file on folder to upload!!
        </div>

        <!-- Folder Container -->
        <div class="pc-content" id="folderContainer" oncontextmenu="showContextMenu(event, null)"
            ondragover="allowDrop(event)" ondrop="dropFile(event)">
            @foreach ($folders as $folder)
                    <div class="pc-folder {{ $folder->is_locked ? 'locked-folder' : '' }}" id="folder-{{ $folder->id }}"
                        @if($folder->can_read) onclick="openFolder({{ $folder }})" @endif>
                        <i class="fa-solid fa-folder pc-folder-icon"></i>
                        <span class="pc-folder-label">{{ $folder->name }}</span>
                        <i class="fa-solid fa-gear pc-setting-icon" onclick="showContextMenu(event, {{ json_encode([
                    'id' => $folder->id,
                    'can_read' => $folder->can_read,
                    'can_edit' => $folder->can_edit,
                    'can_delete' => $folder->can_delete,
                    'can_lock' => $folder->can_lock,
                    'can_full' => $folder->can_full,
                    'is_locked' => $folder->is_locked,
                    'is_locked_for_user' => $folder->is_locked_for_user
                ]) }})"></i>
                    </div>
            @endforeach
        </div>

        <!-- Context Menu -->
        <div class="context-menu" id="contextMenu">
            <ul id="contextMenuOptions"></ul>
        </div>

        <!-- Create Document Popup -->
        <div class="create-pop-blur-bg" id="createPop" style="display: none;">
            <div class="create-pop">
                <div class="form-container">
                    <h1>New Document</h1>
                    <form id="documentForm" enctype="multipart/form-data">
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
        </div>
        <script>
            let currentPath = {
                id: null,
                name: "Documents Manager", // Default name for the root folder
                children: []
            };

            function openFolder(folderId) {
                console.log("Opening folder with ID:", folderId);
                fetch(`/api/folders/${folderId.id}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Received data:", data);

                        if (data.error) {
                            alert(data.error);
                            return;
                        }

                        if (data.hasFiles) {
                            window.location.href = `/documents/files/${folderId.id}`;
                        } else {
                            const folder = data.folders.find(f => f.id === folderId.id);
                            if (folder) {
                                if (folder.is_locked_for_user) {
                                    alert("This folder is locked and cannot be accessed.");
                                    return;
                                }
                                if (!folder.can_read) {
                                    alert("You do not have permission to access this folder.");
                                    return;
                                }
                            }

                            // Update the current path with the new folder
                            currentPath = {
                                id: folderId.id,
                                name: folderId ? folderId.name : "Documents Manager", // Update the folder name
                                children: data.folders,
                                parent: currentPath
                            };
                            debugger

                            updateBreadcrumb(); // ✅ Ensure the title updates here
                            renderFolders(data.folders);
                        }
                    })
                    .catch(error => console.error('Error fetching folder data:', error));
            }


            // Fetch folders
            function fetchFolders(parentId = null) {
                console.log("Fetching folders for parent ID:", parentId);
                fetch(`/api/folders/${parentId || ''}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Received data:", data);
                        if (data.error) {
                            alert(data.error);
                            return;
                        }

                        currentPath = {
                            id: parentId,
                            name: parentId === null ? "Documents Manager" : currentPath.name,
                            children: data.folders,
                            parent: parentId === null ? null : currentPath
                        };
                        debugger

                        updateBreadcrumb();
                        renderFolders(data.folders);
                    })
                    .catch(error => console.error('Error fetching folders:', error));
            }

            function renderFolders(folders) {
                const folderContainer = document.getElementById("folderContainer");
                const addnewdoc = document.getElementById("headerbuttons");
                folderContainer.innerHTML = ""; // Clear existing content

                if (!folders || folders.length === 0) {
                    // Display "No folders found" message and "Add New Doc." button
                    addnewdoc.innerHTML = `<div class="no-folders" style="display: flex;">
                                                                                                        <button class="btn btn-warning" onclick="createDoc()">Add New Doc.</button>
                                                                                                      </div>`;
                    return;
                }

                // Render folders
                folders.forEach(folder => {
                    const itemElement = document.createElement("div");
                    itemElement.className = "pc-folder" + (folder.is_locked_for_user ? " locked-folder" : "");
                    itemElement.id = "folder-" + folder.id;

                    if (folder.can_read) {
                        itemElement.onclick = () => openFolder(folder);
                    }

                    const icon = document.createElement("i");
                    icon.className = "fa-solid fa-folder pc-folder-icon";

                    const label = document.createElement("span");
                    label.className = "pc-folder-label";
                    label.textContent = folder.name;

                    const settingsIcon = document.createElement("i");
                    settingsIcon.className = "fa-solid fa-gear pc-setting-icon";
                    settingsIcon.onclick = (e) => {
                        e.stopPropagation();
                        showContextMenu(e, folder);
                    };

                    itemElement.appendChild(icon);
                    itemElement.appendChild(label);
                    itemElement.appendChild(settingsIcon);
                    folderContainer.appendChild(itemElement);
                });
            }

            function createDoc() {
                document.getElementById('createPop').style.display = "block";
            }

            // Close the popup when clicking outside
            document.getElementById("createPop").addEventListener("click", function (event) {
                if (event.target === this) {
                    this.style.display = "none";
                }
            });

            // Handle form submission - simplified version
            const form = document.getElementById('documentForm');
            let submitButton; // Declare at higher scope

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                console.log('Form submit event triggered');

                submitButton = document.querySelector('#documentForm button[type="submit"]');
                submitButton.disabled = true;

                if (!currentPath || !currentPath.id) {
                    alert('Folder ID is missing. Please try again.');
                    submitButton.disabled = false;
                    return;
                }

                const folderId = currentPath.id;
                const fileInput = document.getElementById('upload-doc');
                const file = fileInput.files[0];

                if (!file) {
                    alert('Please select a file to upload.');
                    submitButton.disabled = false;
                    return;
                }

                uploadFiles(file, folderId);
            });

            // Upload files function
            let isUploading = false;

            function uploadFiles(file, folderId) {
                if (isUploading) {
                    console.log('Upload already in progress. Skipping duplicate call.');
                    return;
                }

                isUploading = true;
                console.log('Uploading file...');

                const formData = new FormData(document.getElementById('documentForm'));
                formData.append('files', file);
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').content); // Add CSRF token
                formData.append('request_id', Date.now());

                fetch(`/api/upload-files/${folderId}`, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(errMsg => { throw new Error(errMsg); });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response data:', data);
                        if (data.success) {
                            alert('File uploaded successfully!');
                            location.reload();// Hide the popup

                            if (typeof fetchFolders === 'function') {
                                fetchFolders(currentPath.id);
                            }

                            document.getElementById('createPop').style.display = 'none';
                            form.reset(); // Reset the form
                        } else {
                            alert('Failed to upload file! ' + (data.message || 'Unknown error.'));
                        }
                    })
                    .catch(error => {
                        console.error('Error uploading file:', error);
                        alert('Error: ' + error.message);
                    })
                    .finally(() => {
                        isUploading = false;
                        if (submitButton) submitButton.disabled = false;
                    });
            }
            function updateBreadcrumb() {
                const breadcrumb = document.getElementById("breadcrumb");
                const headerTitle = document.querySelector(".tr-second-nav div"); // Selects the header title div
                breadcrumb.innerHTML = ""; // Clear existing breadcrumb

                // Build the breadcrumb path
                let temp = currentPath;
                const pathArray = [];

                while (temp) {
                    pathArray.unshift(temp);
                    temp = temp.parent || null;
                }
                debugger
                // Update the header title with the last folder name in the breadcrumb
                const lastFolder = pathArray[pathArray.length - 1];
                if (lastFolder) {
                    headerTitle.textContent = lastFolder.name;
                }

                // Add breadcrumb items
                pathArray.forEach((folder, index) => {
                    const isLast = index === pathArray.length - 1;
                    const breadcrumbItem = document.createElement("span");
                    breadcrumbItem.textContent = folder.name;

                    if (!isLast) {
                        breadcrumbItem.style.cursor = "pointer";
                        breadcrumbItem.style.color = "#007bff";
                        breadcrumbItem.onclick = () => navigateToFolder(folder);
                    }

                    breadcrumb.appendChild(breadcrumbItem);

                    if (!isLast) {
                        const separator = document.createElement("span");
                        separator.textContent = " > ";
                        breadcrumb.appendChild(separator);
                    }
                });

                // Add "Drop the file on folder to upload!!" message
                const dropMessage = document.createElement("span");
                dropMessage.textContent = " - Drop the file on folder to upload!!";
                dropMessage.style.color = "#666";
                dropMessage.style.fontSize = "14px";
                dropMessage.style.marginLeft = "10px";
                breadcrumb.appendChild(dropMessage);
            }


            function handleDrop(event, folderId) {
                event.preventDefault();
                const files = event.dataTransfer.files;

                // Check if files were dropped
                if (files.length > 0) {
                    uploadFiles2(files, folderId); // Pass the folderId for the upload
                }
            }

            function uploadFiles2(files, folderId) {
                const formData = new FormData();

                // Append all files to the form data
                Array.from(files).forEach(file => {
                    formData.append('files[]', file);
                });

                // Make a POST request to upload the files to the specific folder
                fetch(`/api/upload-files2/${folderId}`, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Files uploaded successfully!');
                            fetchFolders(currentPath.id); // Refresh folder list
                        } else {
                            alert('Failed to upload files!');
                        }
                    })
                    .catch(error => console.error('Error uploading files:', error));
            }

            function dragStart(event, fileId) {
                event.dataTransfer.setData("fileId", fileId);
            }

            function handleFileDrop(event, folderId) {
                event.preventDefault();
                const fileId = event.dataTransfer.getData("fileId");

                fetch(`/api/move-file/${fileId}/${folderId}`, {
                    method: 'POST',
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('File moved successfully!');
                            fetchFolders(currentPath.id); // Refresh folder list
                        } else {
                            alert('Failed to move file!');
                        }
                    })
                    .catch(error => console.error('Error moving file:', error));
            }

            // Function to handle file click
            function openFile(file) {
                // Implement file opening logic (e.g., download or preview)
                console.log("Opening file:", file);
            }

            function navigateToFolder(folder) {
                currentPath = folder;
                fetchFolders(folder.id);
                document.getElementById("folder-title").textContent = folder.name; // Update the heading
                updateBreadcrumb();
            }


            function showContextMenu(event, folder) {
                event.preventDefault();
                event.stopPropagation();

                const contextMenu = document.getElementById("contextMenu");
                const menuOptions = document.getElementById("contextMenuOptions");
                menuOptions.innerHTML = "";

                if (folder) {
                    let options = [];

                    if (folder.noControl) {
                        options.push("<li class='disabled'>No Access</li>");
                    } else {
                        if (folder.can_read) options.push(`<li onclick="openFolder(${folder})">Open</li>`);
                        if (folder.can_edit) options.push(`<li onclick="editFolder(${folder.id})">Rename</li>`);
                        if (folder.can_delete) options.push(`<li onclick="deleteFolder(${folder.id})">Delete</li>`);
                        if (folder.can_lock) {
                            if (folder.is_locked) {
                                options.push(`<li onclick="unlockFolder(${folder.id})">Unlock</li>`);
                            } else {
                                options.push(`<li onclick="lockFolder(${folder.id})">Lock</li>`);
                            }
                        }
                    }

                    menuOptions.innerHTML = options.join("");
                } else {
                    menuOptions.innerHTML = `<li onclick="addNewFolder()">New Folder</li>`;
                }

                contextMenu.style.top = `${event.clientY}px`;
                contextMenu.style.left = `${event.clientX}px`;
                contextMenu.style.display = "block";

                document.addEventListener("click", hideContextMenu);
            }

            function hideContextMenu() {
                const contextMenu = document.getElementById("contextMenu");
                contextMenu.style.display = "none";
                document.removeEventListener("click", hideContextMenu);
            }

            // // Hide context menu
            // function hideContextMenu() {
            //     const contextMenu = document.getElementById("contextMenu");
            //     contextMenu.style.display = "none";
            //     document.removeEventListener("click", hideContextMenu);
            // }

            // // Open folder
            // function openFolder(folderId) {
            //     fetchFolders(folderId);
            // }

            // Rename folder
            function editFolder(folderId) {
                const newName = prompt("Enter the new folder name:");
                if (newName) {
                    fetch(`/api/folders/${folderId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            name: newName
                        })
                    })
                        .then(response => response.json())
                        .then(() => fetchFolders(currentPath.id)) // Refresh after renaming
                        .catch(error => console.error('Error renaming folder:', error));
                }
            }

            // Delete folder
            function deleteFolder(folderId) {
                const confirmDelete = confirm("Are you sure you want to delete this folder?");
                if (confirmDelete) {
                    fetch(`/api/folders/${folderId}`, {
                        method: 'DELETE',
                    })
                        .then(() => fetchFolders(currentPath.id)) // Refresh after deletion
                        .catch(error => console.error('Error deleting folder:', error));
                }
            }
            function addNewFolder() {
                const folderName = prompt("Enter the new folder name:");
                if (folderName) {
                    fetch(`/api/folders`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',  // Important to prevent 419 error
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // If CSRF is required
                        },
                        body: JSON.stringify({
                            name: folderName,
                            parent_id: currentPath.id,
                        }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            fetchFolders(currentPath.id); // Refresh the folder list
                        })
                        .catch(error => console.error('Error creating folder:', error));
                }
            }

            function dropFile(event) {
                event.preventDefault();

                // Find the folder element closest to the drop target
                const folderElement = event.target.closest('.pc-folder');

                if (folderElement) {
                    const folderId = folderElement.id.split('-')[1]; // Extract the folder ID

                    const files = event.dataTransfer.files; // Get the files that were dropped

                    if (files.length > 0) {
                        uploadFiles2(files, folderId); // Pass the files and the folder ID to the upload function
                    }
                } else {
                    console.error("Folder element not found for drop.");
                }
            }

            function moveFile(fileId, folderId) {
                fetch(`/api/move-file/${fileId}/${folderId}`, {
                    method: 'POST',
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('File moved successfully!');
                            fetchFolders(currentPath.id); // Refresh folder list
                        } else {
                            alert('Failed to move file! ' + data.message);
                        }
                    })
                    .catch(error => console.error('Error moving file:', error));
            }

            function lockFolder(folderId) {
                alert("Are you sure ...!!?");
                fetch(`/api/folders/${folderId}/lock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ locked: true })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Folder locked successfully!');
                            window.location.reload();
                        } else {
                            alert('Failed to lock folder.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            function unlockFolder(folderId) {
                fetch(`/api/folders/${folderId}/lock`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ locked: false })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Folder unlocked successfully!');
                            window.location.reload();
                        } else {
                            alert('Failed to unlock folder.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
            function allowDrop(event) {
                event.preventDefault(); // Allow dropping
            }






            fetchFolders();
        </script>

    </html>
@endsection