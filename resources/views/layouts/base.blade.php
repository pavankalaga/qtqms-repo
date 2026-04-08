<!DOCTYPE html>
<html lang="en" dir="">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- font css -->
  <link type="text/css" rel="stylesheet" href="/public/demo/tabler-icons.min.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/feather.css">
  <!-- <link type="text/css" rel="stylesheet" href="/demo/fontawesome.css}"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <link type="text/css" rel="stylesheet" href="/public/demo/material.css">
  <!-- vendor css -->
  <link type="text/css" rel="stylesheet" href="/public/demo/style.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/bootstrap-switch-button.min.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/datepicker-bs5.min.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/flatpickr.min.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/customizer.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/custome.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/new-custom.css">
  <style>
    :root {
      --color-customColor: theme-1;
    }

    .quicksand {
      font-family: "Quicksand", sans-serif;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
    }
  </style>
  <link type="text/css" rel="stylesheet" href="/public/demo/custom-color.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/stylecss.css" id="main-style-link">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style></style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="/public/demo/summernote-lite.min.css">
  <link type="text/css" rel="stylesheet" href="/public/demo/dropzone.min.css">
  <script src="/demo/jquery.min.js"></script>
  <link type="text/css" rel="stylesheet" href="/public/demo/nprogress.css">


  <script src="/demo/nprogress.js"></script>
  <link type="text/css" rel="stylesheet" href="/public/demo/responsive.css">
  <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- Include Bootstrap CSS -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include Bootstrap Bundle with Popper -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> -->
</head>

<body class="theme-1 quicksand">

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ auth-signup ] end -->
  <style>
    .login-custom form .left-addon .toggle-password i {
      pointer-events: auto;
    }

    .top-header-section {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 9999;
      height: 70px;
      background: #FFFFFF;
      width: 100%;
      display: flex;
      box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }

    .dropdown .dropdown-menu {
      min-width: 190px;
    }


    .sideNav {
      overflow: hidden;
      width: 60px;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px 0;
      transition: width 0.3s ease;
      font-size: 14px;
      background: #010046;
      margin-top: 70px !important;
      left: 0 !important;
      border-radius: 0 !important;
    }

    .sideNav.active {
      width: 325px;
      overflow: auto;
    }

    .navItem {
      width: 100%;
      display: flex;
      flex-direction: column;
      color: #ecf0f1;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .navItem {
      padding: 10px;
    }

    .navItem1 {
      all: unset;
      align-items: center;
      padding: 5px;
      border-radius: 5px;
    }

    .navItem1:hover {
      background-color: #FFFFFF;
      color: #010046;

    }

    .navItem1.active {
      background-color: #FFFFFF;
      color: #010046;

    }

    .icon {
      font-size: 20px;
      margin-right: 10px;
      width: 40px;
      text-align: center;
    }

    .navItem .arrow {
      width: 0;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .name {
      width: 0;
      opacity: 0;
      transition: opacity 0.3s ease;
      overflow: hidden;
      white-space: nowrap;
      transition-delay: 0.1s;
    }

    .sideNav.active .arrow {
      opacity: 1;
      width: fit-content;
    }

    .sideNav.active .name {
      opacity: 1;
      width: 100%;
    }

    .sideNav:not(.active) .submenu {
      display: none !important;
    }

    .subHeading {
      all: unset;

      height: 0px;
      box-sizing: border-box;
      display: block;
      transition: opacity 0.3s ease;
      overflow: hidden;
      white-space: nowrap;
      transition-delay: 0.1s;
      transition: background-color 0.3s ease;
    }

    .subHeading:hover {
      color: #010046;
      background-color: #FFFFFF;
      border-radius: 5px;
    }

    .navItem:hover .subHeading {
      opacity: 1;
      height: fit-content;
      margin-left: 45px;
      padding: 5px;
      margin-top: 5px;
    }


    .main-div {
      margin-top: 70px;
      width: 100%;
      height: 100%;
      overflow: auto;
    }

    .heading {
      background: #010046;
      color: white;
      height: 56px;
      border-radius: 4px;
      font-size: 32px;
      align-items: center;
      display: flex;
      justify-content: space-between;
      padding: 1rem;
      gap: 1rem;
      /* Standardized gap */
    }



    .main {
      padding: 1rem;
    }



    ::-webkit-scrollbar {
      width: 10px;
      height: 10px;
      /* Default width */
      transition: width 0.3s ease;
      /* Smooth size transition */
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      /* Track background */
      border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb {
      background: #010046;
      /* Thumb color */
      border-radius: 6px;
      transition: width 0.3s ease, background 0.3s ease;
      /* Smooth width and color transition */
    }


    ::-webkit-scrollbar-thumb:hover {
      background: #010046;

      /* Change thumb color on hover */
    }

    .submenu {
      display: none;
      padding-left: 20px;
      font-size: 14px;
      color: #555;
    }

    .submenu a {
      display: block;
      text-decoration: none;
      color: #FFFFFF;
      padding: 5px;
    }

    .navItem .arrow {
      margin-left: auto;
      transition: transform 0.3s ease;
    }

    .navItem .arrow.open {
      transform: rotate(180deg);
    }

    .sideNav hr {
      color: #adadad;
      border: 1px solid;
      opacity: .25;
      margin: 0;
      width: 100%;
    }

    .tableHeader label {
      margin-top: 10px;
      font-weight: bold;

    }

    .tableHeader input {
      padding: 10px;
      margin: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .button {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: rgb(20, 20, 20);
      border: none;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0px 0px 0px 4px rgba(180, 160, 255, 0.253);
      cursor: pointer;
      transition-duration: 0.5s;
      overflow: hidden;
      position: relative;
    }

    .button .svgIcon {
      width: 12px;
      transition-duration: 0.5s;
    }

    .button .svgIcon path {
      fill: white;
    }

    .button:hover {
      width: 110px;
      border-radius: 50px;
      transition-duration: 0.5s;
      background-color: #010046;
      align-items: center;
    }

    .button:hover .svgIcon {

      transition-duration: 0.5s;
      transform: translateX(-700%);
    }

    .button::before {
      position: absolute;
      bottom: -20px;
      content: "Back";
      color: white;
      font-size: 0px;
    }

    .button:hover::before {
      font-size: 16px;
      opacity: 1;
      bottom: unset;
      transition-duration: 0.5s;
    }

    .disabled-link {
      opacity: 0.6;
      pointer-events: none;
    }

    .disabled-link .navItem1 {
      color: #999 !important;
      cursor: not-allowed !important;
    }

    /* If you want to completely hide the submenu for non-admins */
    .disabled-link .submenu {
      display: none !important;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sideNav = document.getElementById('sideNav');
      let isHovered = false;

      // Expand the sideNav when hovered
      sideNav.addEventListener('mouseenter', () => {
        sideNav.classList.add('active');
        isHovered = true;
      });

      // Detect click outside the sideNav
      document.addEventListener('click', (event) => {
        if (!sideNav.contains(event.target) && isHovered) {
          sideNav.classList.remove('active');
          isHovered = false; // Reset hover state
        }
      });
    });

    function newRowToTable(button, clear = true) {
      const table = button.previousElementSibling; // Finds the table before the button
      const tbody = table.querySelector("tbody"); // Gets the tbody
      const firstRow = tbody.querySelector("tr"); // Finds the first row

      if (!firstRow) return; // If there are no rows, do nothing

      const newRow = firstRow.cloneNode(true); // Clone the first row
      if (clear) {
        newRow.querySelectorAll("td").forEach(td => td.innerHTML = ""); // Clear content
      }
      tbody.appendChild(newRow); // Append the new row
    }
    const offers = document.querySelectorAll('.offer-text');
    let currentIndex = 0;

    function showNextOffer() {
      offers[currentIndex].style.display = 'none';
      currentIndex = (currentIndex + 1) % offers.length;
      offers[currentIndex].style.display = 'block';
    }
    offers[currentIndex].style.display = 'block';
    setInterval(showNextOffer, 4000);

    document.addEventListener('DOMContentLoaded', () => {
      const currentPage = window.location.pathname.split('/').pop(); // Get the current page name
      const links = document.querySelectorAll('.dash-link');

      links.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
          link.parentElement.classList.add('active'); // Highlight the current item
          const accordionBody = link.closest('.accordion-collapse');
          if (accordionBody) {
            accordionBody.classList.add('show'); // Keep the dropdown open
          }
        }
      });
    })
  </script>
  @auth

    <div class="top-header-section d-flex align-items-center justify-content-between px-2">
    <img src="/public/assets/img/trust-logo.png" alt="trust-logo" class="tr-trust-logo"
      style="margin-left: 20px;max-width: 120px;">
    <div>
      <img src="/assets/QMS.svg" alt="Description">
    </div>
    <div class="logout-icon d-flex align-items-center gap-3">

      <div class="d-flex align-items-center gap-2">

      <div class="d-flex align-items-center gap-2">
        <img src="/public/assets/img/team/sumanCMD.jpeg" style="width:40px; height:40px; border-radius:50%">
        <div class="dropdown">
        <button class="dropdown-toggle" type="button" id="username-section" onclick="toggleDropdown()"
          aria-expanded="false" style="border:none;background:transparent;font-weight: 600; font-size: 16px;">
          {{ \Auth::user()->first_name ?? 'User' }}
        </button>
        <ul class="dropdown-menu" id="dropdown-menu" aria-labelledby="username-section"
          style="right: 0;margin-top: 1rem;">
          <li>
          <a class="dropdown-item" href="#">
            <form action="{{ route('logoutprofile') }}" method="post" style="display: inline;">
            @csrf
            <button class="d-flex gap-2 align-items-center justify-content-center" type="submit"
              style="border:none;background: none;font-weight: 600;">
              <i class="fa-solid fa-right-from-bracket" style="color:#ff4900"></i> Logout
            </button>
            </form>
          </a>
          </li>
        </ul>
        </div>

        <script>
        function toggleDropdown() {
          document.getElementById("dropdown-menu").classList.toggle("show");
        }

        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
          if (!document.getElementById("username-section").contains(event.target) &&
          !document.getElementById("dropdown-menu").contains(event.target)) {
          document.getElementById("dropdown-menu").classList.remove("show");
          }
        });
        </script>
      </div>
      </div>
    </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success mt-3" style="
      position: fixed;
      z-index: 10000;
      top: 85px;
      left: 50%;
      transform: translateX(-50%);
      ">
    {{ session('success') }}
    </div>
    @endif

    @php
    $role = Auth::user()->role;
    @endphp

    @php $isActive = request()->is('dashboard') ? 'active' : ''; @endphp


    <div class="d-flex" style="height: calc(100vh - 70px);">
    <nav class="sideNav" id="sideNav">

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <a class="d-flex navItem1 {{ request()->is('dashboard') ? 'active' : '' }}"
        href="{{route('quality.dashboard')}}">
        <div class="icon"><i class="fa-solid fa-list-check"></i></div>
        <div class="name">Dashboard</div>
      </a>
      </div>

      <hr>

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('forms/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('DocumentManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Document Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="DocumentManagementSubmenu" class="submenu">
        <hr>
        <a class="d-flex navItem1 {{ request()->is('document-manager/sales') ? 'active' : '' }}"
        href="{{route('document.sales')}}">Documents</a>
        <hr>

      </div>
      </div>
      <hr>
      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('forms/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('RecordManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Daily Record Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="RecordManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('forms/accessioning') ? 'active' : '' }}"
        href="{{route('forms.accessioning')}}">Accessioning</a>
        <a class="d-flex navItem1 {{ request()->is('forms/biochemistry') ? 'active' : '' }}"
        href="{{route('forms.biochemistry')}}">Biochemistry</a>
        <a class="d-flex navItem1 {{ request()->is('forms/clinical_pathology') ? 'active' : '' }}"
        href="{{route('forms.clinical_pathology')}}">Clinical Pathology</a>
        <a class="d-flex navItem1 {{ request()->is('forms/hematology') ? 'active' : '' }}"
        href="{{route('forms.hematology')}}">Hematology</a>
        <a class="d-flex navItem1 {{ request()->is('forms/it') ? 'active' : '' }}" href="{{route('forms.it')}}">IT</a>
        <a class="d-flex navItem1 {{ request()->is('forms/mol_bio') ? 'active' : '' }}"
        href="{{route('forms.mol_bio')}}">Mol-Bio</a>
        <a class="d-flex navItem1 {{ request()->is('forms/microbiology') ? 'active' : '' }}"
        href="{{route('forms.microbiology')}}">Microbiology</a>
        <a class="d-flex navItem1 {{ request()->is('forms/histopathology') ? 'active' : '' }}"
        href="{{route('forms.histopathology')}}">Histopathology</a>
        <a class="d-flex navItem1 {{ request()->is('forms/safety') ? 'active' : '' }}"
        href="{{route('forms.safety')}}">Safety</a>
        <a class="d-flex navItem1 {{ request()->is('forms/general') ? 'active' : '' }}"
        href="{{route('forms.general')}}">General</a>
        <a class="d-flex navItem1 {{ request()->is('forms/checklist') ? 'active' : '' }}"
        href="{{route('forms.checklist')}}">checklist</a>
      </div>
      </div>

      <hr>

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('newforms/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('NewFormsSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">NewForms</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="NewFormsSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_AS') ? 'active' : '' }}"
         href="{{route('forms.newFormsTDPL_AS')}}">TDPL_AS Forms</a>
        <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_BE') ? 'active' : '' }}"
          href="{{route('forms.newFormsTDPL_BE')}}">TDPL_BE Forms</a>
        <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_CG') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_CG')}}">TDPL_CG Forms</a>
        <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_CP') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_CP')}}">TDPL_CP Forms</a>
        <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_CY') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_CY')}}">TDPL_CY/CS Forms</a>
         <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_GE') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_GE')}}">TDPL_GE Forms</a>
          <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_HM') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_HM')}}">TDPL_HM Forms</a>
           <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_HP') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_HP')}}">TDPL_HP Forms</a>
           <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_IT') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_IT')}}">TDPL_IT Forms</a>
            <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_LO') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_LO')}}">TDPL_LO Forms</a>
            <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_MB') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_MB')}}">TDPL_MB Forms</a>
            <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_MG') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_MG')}}">TDPL_MG Forms</a>
             <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_MI') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_MI')}}">TDPL_MI Forms</a>
             <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_PR') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_PR')}}">TDPL_PR Forms</a>
            <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_QA') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_QA')}}">TDPL_QA Forms</a>
            <a class="d-flex navItem1 {{ request()->is('newforms/TDPL_SM') ? 'active' : '' }}"
            href="{{route('forms.newFormsTDPL_SM')}}">TDPL_SM Forms</a>
      </div>
      </div>

      <hr>
      <div class="navItem">
      <div class="d-flex navItem1 {{ request()->is('quality/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('QualityIndicatorSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Quality Indicator</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="QualityIndicatorSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('quality/pre-analytical-daily-report') ? 'active' : '' }}"
        href="{{route('quality.pre_analytical_daily_report')}}">Pre-Examination Daily Report</a>
        <a class="d-flex navItem1 {{ request()->is('quality/analytical-quality-daily-report') ? 'active' : '' }}"
        href="{{route('quality.analytical_quality_daily_report')}}">Examination Quality Daily Report</a>
        <a class="d-flex navItem1 {{ request()->is('quality/post-analytical-daily-report') ? 'active' : '' }}"
        href="{{route('quality.post_analytical_daily_report')}}">Post-Examination Daily Report</a>
        <!-- <a class="d-flex navItem1 {{ request()->is('quality/quality-indicator') ? 'active' : '' }}" href="{{route('quality.quality_indicator')}}">QI Monthly Report</a> -->
        <!-- <a class="d-flex navItem1" href="{{route('quality.quality_indicator_daily')}}">QI Daily Report</a> -->

      </div>
      </div>
      <hr>


      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class=" d-flex navItem1 {{ request()->is('ilc/*') || request()->is('iqc/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('InternalQualityManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Internal Quality Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="InternalQualityManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('ilc/setup') ? 'active' : '' }}"
        href="{{route('ilc.ilc_setup')}}">ILC Submission</a>
        <a class="d-flex navItem1 {{ request()->is('ilc/planner') ? 'active' : '' }}"
        href="{{route('ilc.ilc_planner')}}">ILC Planner</a>
        <a class="d-flex navItem1 {{ request()->is('ilc/table') ? 'active' : '' }}"
        href="{{route('ilc.ilc_table')}}">ILC List</a>
        <a class="d-flex navItem1 {{ request()->is('ilc/calendar') ? 'active' : '' }}"
        href="{{route('ilc.ilc_calendar')}}">ILC Calendar</a>

        <hr>
        <!-- <a class="d-flex navItem1 {{ request()->is('iqc/validation-list') ? 'active' : '' }}"
      href="{{route('iqc.validation_list')}}">Verification List</a>
      <a class="d-flex navItem1 {{ request()->is('iqc/add-validation') ? 'active' : '' }}"
      href="{{route('iqc.add_validation')}}">Add Verification</a> -->
        <hr>
        <a class="d-flex navItem1 {{ request()->is('iqc/calibration-protocol') ? 'active' : '' }}"
        href="{{route('iqc.calibration_protocol')}}">Calibration Protocol</a>
        <a class="d-flex navItem1 {{ request()->is('iqc/calibration-list') ? 'active' : '' }}"
        href="{{route('iqc.calibration_list')}}">Calibration Setup</a>
        <a class="d-flex navItem1 {{ request()->is('iqc/add-calibration') ? 'active' : '' }}"
        href="{{route('iqc.add_calibration')}}">Calibration Usage</a>
        <a class="d-flex navItem1 {{ request()->is('iqc/calibration-planner') ? 'active' : '' }}"
        href="{{route('iqc.calibration_planner')}}">Calibration Calendar</a>
        <hr>
        <a class="d-flex navItem1 {{ request()->is('iqc/control-protocol') ? 'active' : '' }}"
        href="{{route('iqc.control_protocol')}}">Control Protocol</a>
        <a class="d-flex navItem1 {{ request()->is('iqc/control-setup') ? 'active' : '' }}"
        href="{{route('iqc.control_setup')}}">Control Setup</a>
        <!-- <a class="d-flex navItem1" href="{{route('iqc.control_list')}}">Control List</a> -->
        <a class="d-flex navItem1 {{ request()->is('iqc/add-control') ? 'active' : '' }}"
        href="{{route('iqc.add_control')}}">Daily Controls Usage</a>
        <!-- <a class="d-flex navItem1" href="{{route('iqc.control_planner')}}">Control Calendar</a> -->
      </div>
      </div>

      <hr>


      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('eqas/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('ExternalQualityManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">External Quality Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="ExternalQualityManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('eqas/submission') ? 'active' : '' }}"
        href="{{route('eqas.submission')}}">EQAS Submission</a>
        <a class="d-flex navItem1 {{ request()->is('eqas/planner') ? 'active' : '' }}"
        href="{{route('eqas.planner')}}">EQAS Planner</a>
        <a class="d-flex navItem1 {{ request()->is('eqas/list') ? 'active' : '' }}"
        href="{{route('eqas.table')}}">EQAS
        List</a>
        <a class="d-flex navItem1 {{ request()->is('eqas/calendar') ? 'active' : '' }}"
        href="{{route('eqas.calendar')}}">EQAS Calendar</a>
      </div>
      </div>

      <hr>
      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('capa/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('DeviationsManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Deviations Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="DeviationsManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('capa/root-cause-analysis-form') ? 'active' : '' }}"
        href="{{route('capa.root_cause_analysis_form')}}">RCA</a>
        <a class="d-flex navItem1 {{ request()->is('capa/root-cause-analysis-list') ? 'active' : '' }}"
        href="{{route('capa.root_cause_analysis_list')}}">RCA List</a>
      </div>
      </div>
      <hr>

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('training/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('TrainingManagement')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Training Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="TrainingManagement" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('training/create') ? 'active' : '' }} "
        href="{{route('training.create')}}">Create Training Scheduled</a>
        <a class="d-flex navItem1 {{ request()->is('training/training-list') ? 'active' : '' }}"
        href="{{route('training.training_list')}}">Training List</a>
        <a class="d-flex navItem1 {{ request()->is('training/training-library') ? 'active' : '' }}"
        href="{{route('training.training_library')}}">Training Library</a>
        <a class="d-flex navItem1 {{ request()->is('training/calendar') ? 'active' : '' }}"
        href="{{route('training.calendar')}}">Calendar</a>
        <a class="d-flex navItem1 {{ request()->is('training/employee-attendance') ? 'active' : '' }}"
        href="{{route('training.employee_attendance')}}">Training Completion</a>
      </div>
      </div>
      <hr>

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('risk/*') ? 'active' : '' }}"
        onclick="toggleSubmenu('RiskManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Risk Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="RiskManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('risk/risk-guide') ? 'active' : '' }}"
        href="{{route('risk.risk_guide')}}">Risk Management Guide</a>
        <a class="d-flex navItem1 {{ request()->is('risk/risk-log') ? 'active' : '' }}"
        href="{{route('risk.risk_log')}}">Risk Register</a>
        <a class="d-flex navItem1 {{ request()->is('risk/risk-report') ? 'active' : '' }}"
        href="{{route('risk.risk_report')}}">Risk Report </a>

      </div>
      </div>

      <hr>
      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div
        class="d-flex navItem1 {{ request()->is('audit/audit-details') || request()->is('audit/audit-list') ? 'active' : '' }}"
        onclick="toggleSubmenu('AuditManagementSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Audit Management</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="AuditManagementSubmenu" class="submenu">
        <a class="d-flex navItem1 {{ request()->is('audit/audit-details') ? 'active' : '' }}"
        href="{{route('audit.audit_details')}}">Enter Audit Details</a>
        <a class="d-flex navItem1 {{ request()->is('audit/audit-list') ? 'active' : '' }}"
        href="{{route('audit.audit_list')}}">Audit List</a>
        <!-- <a class="d-flex navItem1" href="{{route('audit.management_review')}}">Management Review</a> -->

      </div>
      </div>
      <hr>

      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <div class="d-flex navItem1 {{ request()->is('audit/mrm') || request()->is('audit/mrm-list') ? 'active' : '' }}"
        onclick="toggleSubmenu('ManagementReviewSubmenu')">
        <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
        <div class="name">Management Review</div>
        <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="ManagementReviewSubmenu" class="submenu">

        <a class="d-flex navItem1 {{ request()->is('audit/mrm') ? 'active' : '' }}"
        href="{{route('audit.management_review')}}">MRM</a>
        <a class="d-flex navItem1 {{ request()->is('audit/mrm-list') ? 'active' : '' }}"
        href="{{route('audit.management_review_list')}}">MRM List</a>

      </div>
      </div>
      <hr>
      <div class="navItem {{ $isActive }} {{ $role != 1 ? 'disabled-link' : '' }}">
      <a class="d-flex navItem1 {{ request()->is('settings') ? 'active' : '' }}"
        href="{{route('document.settings')}}">
        <div class="icon"><i class="fa-solid fa-gear"></i></div>
        <div class="name">Settings</div>
      </a>
      </div>
      <hr>
      <!-- <div class="navItem">
      <div class="d-flex navItem1" onclick="toggleSubmenu('FormsSubmenu')">
      <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
      <div class="name">Master Forms</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="FormsSubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('forms.accessioning')}}">Accessioning</a>
      <a class="d-flex navItem1" href="{{route('forms.biochemistry')}}">Biochemistry</a>
      <a class="d-flex navItem1" href="{{route('forms.clinical_pathology')}}">Clinical Pathology</a>
      <a class="d-flex navItem1" href="{{route('forms.hematology')}}">Hematology</a>
      <a class="d-flex navItem1" href="{{route('forms.it')}}">IT</a>
      <a class="d-flex navItem1" href="{{route('forms.mol_bio')}}">Mol-Bio</a>
      <a class="d-flex navItem1" href="{{route('forms.microbiology')}}">Microbiology</a>
      <a class="d-flex navItem1" href="{{route('forms.histopathology')}}">Histopathology</a>
      <a class="d-flex navItem1" href="{{route('forms.safety')}}">Safety</a>
      <a class="d-flex navItem1" href="{{route('forms.general')}}">General</a>
      </div>
      </div>

      <hr>
      <div class="navItem">
      <a class="d-flex navItem1" onclick="toggleSubmenu('TrainingDevelopmentSubmenu')">
      <div class="icon"><i class="fa-solid fa-person-chalkboard"></i></div>
      <div class="name">Training</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </a>
      <div id="TrainingDevelopmentSubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('training.training_list')}}">Training List</a>
      <a class="d-flex navItem1" href="{{route('training.calendar')}}">Calendar</a>
      <a class="d-flex navItem1" href="{{route('training.employee_attendance')}}">Employee Attendance</a>
      </div>
      </div>
      <hr>
      <div class="navItem">
      <div class="d-flex navItem1" onclick="toggleSubmenu('CAPASubmenu')">
      <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
      <div class="name">CAPA</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="CAPASubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('capa.root_cause_analysis_list')}}">RCA List</a>
      <a class="d-flex navItem1" href="{{route('capa.root_cause_analysis_form')}}">RCA</a>
      </div>
      </div>
      <hr>

      <div class="navItem">
      <div class="d-flex navItem1" onclick="toggleSubmenu('EQACSubmenu')">
      <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
      <div class="name">EQAS</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="EQACSubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('eqas.planner')}}">Setup</a>
      <a class="d-flex navItem1" href="{{route('eqas.table')}}">List</a>

      </div>
      </div>
      <hr>

      <div class="navItem">
      <div class="d-flex navItem1" onclick="toggleSubmenu('ILCSubmenu')">
      <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
      <div class="name">ILC</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="ILCSubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('ilc.ilc_setup')}}">Setup</a>
      <a class="d-flex navItem1" href="{{route('ilc.ilc_table')}}">List</a>

      </div>
      </div>
      <hr>
      <div class="navItem">
      <div class="d-flex navItem1" onclick="toggleSubmenu('IQCSubmenu')">
      <div class="icon"><i class="fa-brands fa-wpforms"></i></div>
      <div class="name">IQC</div>
      <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
      </div>
      <div id="IQCSubmenu" class="submenu">
      <a class="d-flex navItem1" href="{{route('iqc.validation_list')}}">Validation List</a>
      <a class="d-flex navItem1" href="{{route('iqc.add_validation')}}">Add Validation</a>
      <a class="d-flex navItem1" href="{{route('iqc.calibration_list')}}">Calibration List</a>
      <a class="d-flex navItem1" href="{{route('iqc.add_calibration')}}">Add Calibration</a>
      <a class="d-flex navItem1" href="{{route('iqc.calibration_planner')}}">Calibration Planner</a>
      <a class="d-flex navItem1" href="{{route('iqc.control_list')}}">Control List</a>
      <a class="d-flex navItem1" href="{{route('iqc.add_control')}}">Add Control</a>
      <a class="d-flex navItem1" href="{{route('iqc.control_planner')}}">Control Planner</a>
      </div>
      </div>
      <hr>
      <div class="navItem">
      <a class="d-flex navItem1" href="{{route('document.settings')}}">
      <div class="icon"><i class="fa-solid fa-gear"></i></div>
      <div class="name">Quality Audits </div>
      </a>
      </div> -->

    </nav>

    <main class="main-div">
  @endauth
      @yield('content')
    </main>
  </div>



  @yield('scripts')

</body>
<script>
  document.querySelectorAll('[data-role-restricted="true"]').forEach(item => {
    item.classList.add('disabled-link');
    item.querySelector('.navItem1').onclick = (e) => e.preventDefault();
  });
</script>
<script>
  function toggleSubmenu(id) {
    const submenu = document.getElementById(id);
    const arrow = submenu.previousElementSibling.querySelector('.arrow');
    if (submenu.style.display === "block") {
      submenu.style.display = "none";
      arrow.classList.remove('open');
    } else {
      submenu.style.display = "block";
      arrow.classList.add('open');
    }
  }
</script>


</html>