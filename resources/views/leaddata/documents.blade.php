@extends('layouts.base')
@section('content')

    <style>
        .dash-container {
            width: 80%;
        }

        .header {
            background: #069acb !important;
            color: #fff;
            border-radius: 5px;
        }

        .header h5,
        #create-btn {
            margin-inline: 20px;
        }

        .btn1 {
            background-color: #010046;
            color: white;
            border: 2px solid #0caf60;
        }

        .document-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .document-card i {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .notes-textarea {
            width: 100%;
            height: 80px;
            resize: none;
        }

        /* Right-side modal styles */
        .offcanvas{
        margin-top: 70px;
        }
        .file-size{
            font-size:8rem !important;
        }
        .document-container {
           position: relative;
           width: 100%;
           height: auto;
           display: flex;
           justify-content: center;
       }

.document-container .file-size{
    max-width: 100%; 
    height: auto;
    border-radius: 5px;
}
    .notes-textarea {
        resize: vertical; /* Allow vertical resizing */
        overflow: hidden; /* Hide the scrollbar */
        min-height: 80px; /* Minimum height */
        max-height: 400px; /* Maximum height */
    }
    </style>

<div class="modal right fade " id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true"> 
    <div class="modal-dialog document-Details" style="margin-right: 23px;">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="documentModalLabel">Document Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body document-body">
                <div class="container dash-container mt-">
                    <div class="container">
                        <h2 class="header">Documents</h2>       
                        <div class="d-flex mb-4 ms-auto">
                            <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#tableOffcanvas" aria-controls="tableOffcanvas">
                                Create
                            </button>
                        </div>
        <!-- Document Cards -->
        <div class="row g-3 document-container">
            <div class="col-md-4">
               <div class="document-card">
                  <!-- Document Display Section (Dummy Document) -->
                  <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                        <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                            <!-- View icon to open document -->
                            <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                            <!-- Download icon to download document -->
                            <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                             <i class="fa-solid fa-download text-primary"></i>
                            </a>
                        </div>
                    </div>
        
                  <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="document-card">
                    <!-- Document Display Section (Dummy Document) -->
                  <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                        <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                            <!-- View icon to open document -->
                            <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                            <!-- Download icon to download document -->
                            <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                             <i class="fa-solid fa-download text-primary"></i>
                            </a>
                        </div>
                    </div>
        
                  <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="document-card">
                   <!-- Document Display Section (Dummy Document) -->
                  <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                        <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                            <!-- View icon to open document -->
                            <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                            <!-- Download icon to download document -->
                            <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                             <i class="fa-solid fa-download text-primary"></i>
                            </a>
                        </div>
                    </div>
        
                  <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Create Section as Right-Side Modal -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="tableOffcanvas" aria-labelledby="tableOffcanvasLabel">
    <div class="offcanvas-header">
       <h5 id="tableOffcanvasLabel">Documents</h5>
       <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
      <div class="offcanvas-body">
        <form>
            <div class="mb-3">
                <label for="choose-file" class="form-label">Choose File:</label>
                <input type="file" class="form-control" id="choose-file">
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes:</label>
                <textarea id="notes" class="form-control" placeholder="Enter notes..."></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary me-2 btn1" id="cancel-btn">Cancel</button>
                <button class="btn btn-primary btn1">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>   
<style>
    #documentModal .document-Details {
    max-width: 100%;
    width:80% 
  }
  #documentModal .document-body {
    width: 100%; 
    display: flex;
    left: -85px;
  }
  .document-container{
    left: 0px;
    width: 100%;
  }
  /* Custom CSS to slide modal in from the right */
.modal.right .modal-dialog {
  position: fixed;
  top: 0;
  right: -100%; /* Initially off-screen to the right */
  height: 100%;
  /* width: 400px; Set the width of the modal */
  transition: right 0.5s ease-in-out; /* Smooth slide animation */
}

.modal.right.show .modal-dialog {
  right: 0; /* Slide in from the right */
}

.modal-dialog {
  margin: 0; /* Ensure no margin when sliding */
  height: 100%;
}

.modal-body {
  padding: 20px;
  /* Add any styling you need for modal content */
}
  </style>
@endsection
