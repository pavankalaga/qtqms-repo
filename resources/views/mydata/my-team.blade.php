@extends('layouts.base')
@section('content')


<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">My Team</div>
</div>
<div class="dash-container   mt-2 p-10" style="padding-right: 3.35rem; padding-left: 2rem;">
  <!-- <h1>My Team</h1> -->

  <!-- Team Table -->


  <div class="row mb-4">
    <div class="col-md-3">
      <!-- <label for="account-code" class="form-label">Account Code</label> -->
      <input type="text" id="employee-name" class="form-control" placeholder="Employee Name">
    </div>

  </div>
  <div class="pivot-container">
    <div class="pivot-tabs">
      <button class="pivot-tab active" data-target="tab1">My Team</button>
      <button class="pivot-tab" data-target="tab2">My Hierarchy </button>

    </div>
    <div class="pivot-content">
      <div class="pivot-panel active" id="tab1">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
              <tr>
                <th>S.No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Employee ID</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row 1 -->
              <tr>
                <td>1</td>
                <td><img src="https://via.placeholder.com/50" alt="Team Member" class="rounded-circle"></td>
                <td>Name -1</td>
                <td>

                </td>
                <td>Software Engineer</td>
                <td>Development</td>
                <td>New York</td>
                <td><a href="tel:+1234567890">+1 234 567 890</a></td>

                <td><a href="mailto:example1@example.com">example1@example.com</a></td>
              </tr>
              <!-- Example Row 2 -->
              <tr>
                <td>2</td>
                <td><img src="https://via.placeholder.com/50" alt="Team Member" class="rounded-circle"></td>
                <td>Name -1</td>
                <td>
                </td>
                <td>Project Manager</td>
                <td>Operations</td>
                <td>San Francisco</td>
                <td><a href="tel:+1234567891">+1 234 567 891</a></td>

                <td><a href="mailto:example2@example.com">example2@example.com</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="pivot-panel" id="tab2">
        <div class="single-flow-chart">
          <div class="node">
            <img src="	https://cdn-icons-png.flaticon.com/512/64/64572.png" alt="John Doe" class="profile-pic">
            <div class="details">
              <p class="name">John Doe</p>
              <p class="email">CMD</p>
              <p class="email">john.doe@company.com</p>
              <p class="email">+11223365</p>
            </div>
          </div>
          <div class="connector"></div>
          <div class="node">
            <img src="	https://cdn-icons-png.flaticon.com/512/64/64572.png" alt="Jane Smith" class="profile-pic">
            <div class="details">
              <p class="name">Jane Smith</p>
              <p class="email">BH</p>
              <p class="email">jane.smith@company.com</p>
              <p class="email">+11223365</p>
            </div>
          </div>
          <div class="connector"></div>
          <div class="node">
            <img src="	https://cdn-icons-png.flaticon.com/512/64/64572.png" alt="Alex Brown" class="profile-pic">
            <div class="details">
              <p class="name">Alex Brown</p>
              <p class="email">RSM</p>
              <p class="email">alex.brown@company.com</p>
              <p class="email">+11223365</p>
            </div>
          </div>
          <div class="connector"></div>
          <div class="node">
            <img src="	https://cdn-icons-png.flaticon.com/512/64/64572.png" alt="Lisa White" class="profile-pic">
            <div class="details">
              <p class="name">Lisa White</p>
              <p class="email">ASM</p>
              <p class="email">lisa.white@company.com</p>
              <p class="email">+11223365</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<style>
  .my-activity-title {
    background: #010046;
    color: white;
    height: 56px;
    border-radius: 4px;
    font-size: 32px;
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 1rem;
  }

  /* fOR PIVOT */
  .pivot-container {
    width: 100%;
    /* max-width: 600px;
      margin: 50px auto; */
    background-color: white;
    border-radius: 8px;
    /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
    /* overflow: hidden; */
  }

  .pivot-tabs {
    display: flex;
    background-color: #0078d4;
  }

  .pivot-tab {
    flex: 1;
    padding: 10px 20px;
    color: white;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
  }

  .pivot-tab.active {
    background-color: #005a9e;
    font-weight: bold;
  }

  .pivot-content {
    padding: 20px 0;
  }

  .pivot-panel {
    display: none;
  }

  .pivot-panel.active {
    display: block;
  }



  .single-flow-chart {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .node {
    display: flex;
    align-items: center;
    background: #3b5168;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    width: 300px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 10px 0;
    text-align: left;
    transition: background 0.3s ease;
  }

  .node:hover {
    background: #232b32;
  }

  .profile-pic {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
  }

  .details {
    flex: 1;
  }

  .details .name {
    font-size: 18px;
    margin: 0;
    font-weight: bold;
  }

  .details .email {
    font-size: 14px;
    margin: 5px 0 0;
    font-weight: normal;
  }

  .connector {
    width: 2px;
    height: 30px;
    background: #ccc;
  }

  @media (max-width: 768px) {
    .node {
      flex-direction: column;
      align-items: center;
      text-align: center;
      width: 250px;
    }

    .profile-pic {
      margin-right: 0;
      margin-bottom: 10px;
    }
  }

  input {
    border-color: #0CAF60;
    box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
  }
</style>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".pivot-tab");
    const panels = document.querySelectorAll(".pivot-panel");

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        // Remove active class from all tabs and panels
        tabs.forEach((t) => t.classList.remove("active"));
        panels.forEach((p) => p.classList.remove("active"));

        // Add active class to the clicked tab and corresponding panel
        tab.classList.add("active");
        const target = document.getElementById(tab.dataset.target);
        target.classList.add("active");
      });
    });
  });
</script>
@endsection