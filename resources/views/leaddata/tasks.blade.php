@extends('layouts.base') 
@section('content')

<style>
    /* Sidebar */
    .sidebar {
        margin: 20px;
        width: 220px;
        position: fixed;
        background-color: #010046;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 15px;
        color:#ffff;
    }

    .sidebar h4 {
        margin-bottom: 20px;
        color:#ffff;
    }

    .filter-checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        justify-content: space-between;
    }

    .filter-checkbox input {
        margin-right: 10px;
    }

    .list-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .delete-icon, .edit-icon {
        cursor: pointer;
        color: red;
    }

    .edit-icon {
        margin-left: 10px;
        color: #007bff;
    }
    #taskList{
        width: 95%;
    }

    /* Main Content */
    .main-content {
        margin-left: 250px;
        padding: 20px;
    }
     
    .main-content h3{
        color:#fff;
        background-color: #010046;
        padding:5px;
        margin:0px 30px 50px -25px;
        border-radius:5px;
        text-align:center;
    }
    .task-item {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f9f9f9;
        transition: box-shadow 0.2s ease-in-out;
    }

    .task-item.completed {
        text-decoration: line-through;
        color: gray;
        background-color: #e6e6e6;
    }

    .task-item:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .empty-state {
        text-align: center;
        color: gray;
        margin-top: 20px;
    }

    /* Side Popup */
       .popup-completed {
        position: fixed;
        right: 40px;
        top: 40%;
        width: 300px;
        height: auto;
        max-height: 90vh;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        z-index: 1000;
        padding: 15px;
        transform: translateX(100%);
        transition: transform 0.3s ease-out;
    }

    .popup-completed.open {
        transform: translateX(0);
    }

    .popup-completed h5 {
        margin-bottom: 15px;
    }

    .popup-completed ul {
        list-style-type: none;
        padding: 0;
    }

    .popup-completed li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    text-decoration: line-through;
    }

    .popup-completed li .delete-icon {
        cursor: pointer;
        color: red;
    }
    .bw{
        color:#fff;

    }
</style>

<div class="dash-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Task Manager</h4>
        <button class="btn btn-success btn-1 w-100 mb-3" data-bs-toggle="modal" data-bs-target="#createTaskModal">+ Create Task</button>
        <div id="filterContainer">
            <h5 style="color:#fff;">Filter by List</h5>
            <button class="btn btn-success btn-1 w-100 mt-3" data-bs-toggle="modal" data-bs-target="#createListModal">+ Add New List</button>
            <div class="filter-checkbox">
                <input type="checkbox" class="list-filter" value="All Tasks" checked>
                <label>All Tasks</label>
            </div>
            <div id="listContainer"></div>
        </div>
        
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h3>To-Do List</h3>
        <div id="taskList" class="mb-3">
            <p class="empty-state">No tasks available. Add a task to get started!</p>
        </div>
    </div>
</div>

<!-- Create Task Modal -->
<div class="modal fade" id="createTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="taskForm">
                    <input type="text" class="form-control mb-3" id="taskTitle" placeholder="Task Title" required>
                    <textarea class="form-control mb-3" id="taskDescription" placeholder="Task Description"></textarea>
                    <input type="datetime-local" class="form-control mb-3" id="taskDueDate">
                    <select class="form-select mb-3" id="taskListSelect">
                        <option value="My Tasks">My Tasks</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create List Modal -->
<div class="modal fade" id="createListModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create New List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="listForm">
                    <input type="text" class="form-control mb-3" id="listTitle" placeholder="List Name" required>
                    <button type="submit" class="btn btn-primary w-100">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Completed Tasks Popup -->
<div class="popup-completed" id="completedTasksPopup">
    <h5>Completed Tasks</h5>
    <ul id="completedTasksList"></ul>
</div>

<script>
    const taskList = document.getElementById('taskList');
    const taskForm = document.getElementById('taskForm');
    const completedTasksPopup = document.getElementById('completedTasksPopup');
    const completedTasksList = document.getElementById('completedTasksList');
    const listForm = document.getElementById('listForm');
    const filterContainer = document.getElementById('listContainer');

    // Add Task
    taskForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = document.getElementById('taskTitle').value;
        const listName = document.getElementById('taskListSelect').value;
        if (!title.trim()) return;

        const taskItem = document.createElement('div');
        taskItem.className = 'task-item';
        taskItem.dataset.list = listName;
        taskItem.innerHTML = `        
            <div>
                <input type="radio" onclick="markTaskCompleted(this)">
                <strong>${title}</strong> <small class="text-muted">(${listName})</small>
            </div>
        `;

        taskList.appendChild(taskItem);
        taskForm.reset();
        bootstrap.Modal.getInstance(document.getElementById('createTaskModal')).hide();
        handleEmptyState();
    });

    // Mark Task as Completed
    function markTaskCompleted(radioBtn) {
        const taskItem = radioBtn.closest('.task-item');
        taskItem.remove();

        const completedTask = document.createElement('li');
        completedTask.innerHTML = `
            ${taskItem.querySelector('strong').innerHTML}
            <span class="delete-icon" onclick="deleteCompletedTask(this)">🗑</span>
        `;
        completedTasksList.appendChild(completedTask);

        // Show Completed Tasks Popup
        completedTasksPopup.classList.add('open');
        setTimeout(() => completedTasksPopup.classList.remove('open'), 4000);

        handleEmptyState();
    }

    // Delete Completed Task
    function deleteCompletedTask(deleteIcon) {
        deleteIcon.closest('li').remove();
    }

    // Create List
    listForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const listTitle = document.getElementById('listTitle').value.trim();
        if (!listTitle) return;

        const listElement = document.createElement('div');
        listElement.className = 'filter-checkbox';
        listElement.innerHTML = `
            <div>
                <input type="checkbox" class="list-filter" value="${listTitle}">
                <label>${listTitle}</label>
                <span class="edit-icon" onclick="editList(this)">✏</span>
                <span class="delete-icon" onclick="deleteList(this)">🗑</span>
            </div>
        `;
        filterContainer.appendChild(listElement);

        const option = document.createElement('option');
        option.value = listTitle;
        option.textContent = listTitle;
        document.getElementById('taskListSelect').appendChild(option);

        bootstrap.Modal.getInstance(document.getElementById('createListModal')).hide();
    });

    // Edit List
    function editList(editIcon) {
        const listElement = editIcon.closest('.filter-checkbox');
        const listTitle = listElement.querySelector('label').innerText;

        const newListTitle = prompt("Edit List Name", listTitle);
        if (newListTitle && newListTitle.trim() !== '') {
            listElement.querySelector('label').innerText = newListTitle;

            // Update task select option
            const listSelect = document.getElementById('taskListSelect');
            Array.from(listSelect.options).forEach(option => {
                if (option.text === listTitle) {
                    option.textContent = newListTitle;
                }
            });
        }
    }

    // Delete List
    function deleteList(deleteIcon) {
        const listElement = deleteIcon.closest('.filter-checkbox');
        const listTitle = listElement.querySelector('label').innerText;

        // Remove the list from the select dropdown
        const listSelect = document.getElementById('taskListSelect');
        Array.from(listSelect.options).forEach(option => {
            if (option.text === listTitle) {
                option.remove();
            }
        });

        // Remove the list from the filter container
        listElement.remove();
    }

    // Handle Empty State
    function handleEmptyState() {
        const tasks = taskList.querySelectorAll('.task-item');
        const emptyState = taskList.querySelector('.empty-state');
        if (tasks.length === 0) {
            if (!emptyState) {
                const emptyMessage = document.createElement('p');
                emptyMessage.className = 'empty-state';
                emptyMessage.textContent = 'No tasks available. Add a task to get started!';
                taskList.appendChild(emptyMessage);
            }
        } else if (emptyState) {
            emptyState.remove();
        }
    }
</script>

@endsection
