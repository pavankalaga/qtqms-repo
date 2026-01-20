@extends('layouts.base')
@section('content')
    
    <div class="modal right fade " id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true"> 
        <div class="modal-dialog notes-Details" style="margin-right: 23px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notesModalLabel">Notes Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body notes-body">
                <div class="dash-container container my-4">
        <!-- Notes Table -->
        <h2 class="mb-2 text-center">Notes</h2>
        <div class="table-responsive">
            <table class="table  text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Create Date</th>
                        <th>Created By</th>
                        <th>Title</th>
                        <th>Attachments</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-11-25</td>
                        <td>subani</td>
                        <td>Meeting Notes</td>
                        <td><a href="#" class="btn btn-link btn-sm">View</a></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-muted">No additional notes available.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Create Notes Button -->
        <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#createNotePopup">
            Create Notes
        </button>

        <!-- Side Popup for Create Note -->
        <div class="offcanvas offcanvas-end" id="createNotePopup" tabindex="-1">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Create Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form>
                <h2 class="mb-2 text-center"> Create Notes</h2>
                    <div class="mb-3">
                        <label for="noteTitle" class="mb-2 text-center">Note Title</label>
                        <input type="text" id="noteTitle" class="form-control" placeholder="Enter title" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="noteDate" class="form-label">Date</label>
                            <input type="date" id="noteDate" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="noteTime" class="form-label">Time</label>
                            <input type="time" id="noteTime" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="createdBy" class="form-label">Created By</label>
                        <input type="text" id="createdBy" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="noteContent" class="form-label">Write Note</label>
                        <textarea id="noteContent" class="form-control" rows="5" placeholder="Write your note here..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="uploadFile" class="form-label">Upload Attachments</label>
                        <input type="file" id="uploadFile" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
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
        .offcanvas-end {
            width: 100%;
            max-width: 500px;
            margin-right:50px;
        }
        .offcanvas{
            width: 50% !important;
        }

        .offcanvas-header {
            background-color: green;
            border-bottom: 5px solid #dee2e6;
        }

        .btn-create {
            width: 95%;
            justify-content:center;
            matgin-left:65px;
        }
        .note-header{
           color:red !important;
        }

        textarea {
            resize: none;
        }
   #notesModal .notes-Details {
    max-width: 100%;
    width:80% 
  }
  #notesModal .notes-body {
    width: 100%; 
  }
  .notes-container{
    left: -226px;
    width: 100%;
  }
   /* Custom CSS to slide modal in from the right */
.modal.right .modal-dialog {
  position: fixed;
  top: 0;
  right: -100%; 
  height: 100%;
  width: 400px; 
  transition: right 0.5s ease-in-out; 
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