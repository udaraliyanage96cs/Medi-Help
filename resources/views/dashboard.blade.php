<!--
=========================================================
* Water Project - v1.0.0
=========================================================

* Product Page: https://www.brainx.ml/
* Copyright 2021 Udara Liyanage (http://www.cudara.tk)
* Licensed under MIT (http://www.cudara.tk/license)
* Coded by Udara Liyanage

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="{{ asset('./assets/img/favicon.png') }}" rel="apple-touch-icon" sizes="76x76">
  <link href="{{ asset('./assets/img/apple-icon.png') }}" rel="icon" type="image/png">

  <title>
    Material Dashboard 2 by Creative Tim
  </title>



  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('./assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('./assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <link href="{{ asset('./assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet">
  <link href="{{ asset('./assets/css/dashboard.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/dashboard ">
        <img src="{{ asset('./assets/img/logo-ct.jpeg') }} " class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Medi Help</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <!-- Dashboard Side Bar Section -->
      <x-dashboard.navigation.sidebar page="{{$page}}" />
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="/signout" type="button">Sign Out</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3" style="padding-left:0 !important">
        <nav aria-label="breadcrumb">
          <x-dashboard.navigation.breadcrumbs-view page="{{$page}}" type="{{$type ?? ''}}"
            channelID="{{$channelID ?? ''}}" reciptID="{{$reciptID ?? '' }}" ticketID="{{$ticketID ?? '' }}"
            patientId="{{$patientID ?? '' }}" />
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/signout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign Out</span>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Dashboard Screens -->
    <div class="sub_container">
      @if(isset($page))
      @if($page == "Home")
      <x-dashboard.home />
      @elseif($page == "Patient")
      <x-dashboard.users.patients />
      @elseif($page == "Staff")
      <x-dashboard.users.staff />
      @elseif($page == "patientAddView" || $page == "patientEditView")
      <x-dashboard.users.patient-add type="{{$type}}" patientId="{{$patientId}}" />
      @elseif($page == "patientProfileView")
      <x-dashboard.users.PatientProfile patientId="{{$patient_id}}" />
      @elseif($page == "staffAddView" || $page == "staffEditView")
      <x-dashboard.users.staff-add type="{{$type}}" userId="{{$userId}}" />
      @elseif($page == "Accessdenide")
      <x-dashboard.errors.accessdenide />
      @elseif($page == "Ticket")
      <x-dashboard.ticket.tickets />
      @elseif($page == "Channels")
      <x-dashboard.channel.channeling />
      @elseif($page == "channelAddView" || $page == "channelEditView" )
      <x-dashboard.channel.channel-add channelID="{{$channelID}}" type="{{$type}}" />
      @elseif($page == "channelSingleView")
      <x-dashboard.channel.channel-view channelID="{{$channelID}}" />
      @elseif($page == "reciptsAddView" || $page == "reciptsEditView")
      <x-dashboard.recipts.recipts-add ticketID="{{$ticketID}}" type="{{$type}}" />
      @elseif($page == "Recipts")
      <x-dashboard.recipts.recipts />
      @elseif($page == "reciptsView")
      <x-dashboard.recipts.recipts-view channelID="{{$channelID}}" />
      @elseif($page == "reciptsStaff")
      <x-dashboard.recipts.recipts-staff reciptID="{{$reciptID}}" />
      @elseif($page == "reportsAddView")
      <x-dashboard.reports.reports-add patientID="{{$patientID}}" />


      @endif
      @endif
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Medi Help Dashboard</h5>
          <p>Caring for your life.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary"
              onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    let dm = {{ Cookie:: get('darkmode')}};
    console.log("aaaaa", dm);
    if (dm == 1) {
      $('#dark-version').prop('checked', true);
      darkMode(document.getElementById("dark-version"));
    }
    function darkMode(el) {
      const body = document.getElementsByTagName('body')[0];
      const hr = document.querySelectorAll('div:not(.sidenav) > hr');
      const hr_card = document.querySelectorAll('div:not(.bg-gradient-dark) hr');
      const text_btn = document.querySelectorAll('button:not(.btn) > .text-dark');
      const text_span = document.querySelectorAll('span.text-dark, .breadcrumb .text-dark');
      const text_span_white = document.querySelectorAll('span.text-white, .breadcrumb .text-white');
      const text_strong = document.querySelectorAll('strong.text-dark');
      const text_strong_white = document.querySelectorAll('strong.text-white');
      const text_nav_link = document.querySelectorAll('a.nav-link.text-dark');
      const text_nav_link_white = document.querySelectorAll('a.nav-link.text-white');
      const secondary = document.querySelectorAll('.text-secondary');
      const bg_gray_100 = document.querySelectorAll('.bg-gray-100');
      const bg_gray_600 = document.querySelectorAll('.bg-gray-600');
      const btn_text_dark = document.querySelectorAll('.btn.btn-link.text-dark, .material-icons.text-dark');
      const btn_text_white = document.querySelectorAll('.btn.btn-link.text-white, .material-icons.text-white');
      const card_border = document.querySelectorAll('.card.border');
      const card_border_dark = document.querySelectorAll('.card.border.border-dark');
      const breadcrumb  = document.querySelectorAll('.breadcrumb');

      const svg = document.querySelectorAll('g');


      if (!el.getAttribute("checked")) {
        $.ajax({
          type: "get",
          url: "/darkmode/1",
          success: function (res) {
            console.log(res);
          }
        });
        body.classList.add('dark-version');
        for (var i = 0; i < breadcrumb.length; i++) {
            breadcrumb[i].classList.add('dark-version');
        }
       
        for (var i = 0; i < hr.length; i++) {
          if (hr[i].classList.contains('dark')) {
            hr[i].classList.remove('dark');
            hr[i].classList.add('light');
          }
        }

        for (var i = 0; i < hr_card.length; i++) {
          if (hr_card[i].classList.contains('dark')) {
            hr_card[i].classList.remove('dark');
            hr_card[i].classList.add('light');
          }
        }
        for (var i = 0; i < text_btn.length; i++) {
          if (text_btn[i].classList.contains('text-dark')) {
            text_btn[i].classList.remove('text-dark');
            text_btn[i].classList.add('text-white');
          }
        }
        for (var i = 0; i < text_span.length; i++) {
          if (text_span[i].classList.contains('text-dark')) {
            text_span[i].classList.remove('text-dark');
            text_span[i].classList.add('text-white');
          }
        }
        for (var i = 0; i < text_strong.length; i++) {
          if (text_strong[i].classList.contains('text-dark')) {
            text_strong[i].classList.remove('text-dark');
            text_strong[i].classList.add('text-white');
          }
        }
        for (var i = 0; i < text_nav_link.length; i++) {
          if (text_nav_link[i].classList.contains('text-dark')) {
            text_nav_link[i].classList.remove('text-dark');
            text_nav_link[i].classList.add('text-white');
          }
        }
        for (var i = 0; i < secondary.length; i++) {
          if (secondary[i].classList.contains('text-secondary')) {
            secondary[i].classList.remove('text-secondary');
            secondary[i].classList.add('text-white');
            secondary[i].classList.add('opacity-8');
          }
        }
        for (var i = 0; i < bg_gray_100.length; i++) {
          if (bg_gray_100[i].classList.contains('bg-gray-100')) {
            bg_gray_100[i].classList.remove('bg-gray-100');
            bg_gray_100[i].classList.add('bg-gray-600');
          }
        }
        for (var i = 0; i < btn_text_dark.length; i++) {
          btn_text_dark[i].classList.remove('text-dark');
          btn_text_dark[i].classList.add('text-white');
        }
        for (var i = 0; i < svg.length; i++) {
          if (svg[i].hasAttribute('fill')) {
            svg[i].setAttribute('fill', '#fff');
          }
        }
        for (var i = 0; i < card_border.length; i++) {
          card_border[i].classList.add('border-dark');
        }
        el.setAttribute("checked", "true");
      } else {
        $.ajax({
          type: "get",
          url: "/darkmode/0",
          success: function (res) {
            console.log(res);
          }
        });
        body.classList.remove('dark-version');
        for (var i = 0; i < breadcrumb.length; i++) {
            breadcrumb[i].classList.remove('dark-version');
        }
        for (var i = 0; i < hr.length; i++) {
          if (hr[i].classList.contains('light')) {
            hr[i].classList.add('dark');
            hr[i].classList.remove('light');
          }
        }
        for (var i = 0; i < hr_card.length; i++) {
          if (hr_card[i].classList.contains('light')) {
            hr_card[i].classList.add('dark');
            hr_card[i].classList.remove('light');
          }
        }
        for (var i = 0; i < text_btn.length; i++) {
          if (text_btn[i].classList.contains('text-white')) {
            text_btn[i].classList.remove('text-white');
            text_btn[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < text_span_white.length; i++) {
          if (text_span_white[i].classList.contains('text-white') && !text_span_white[i].closest('.sidenav') && !text_span_white[i].closest('.card.bg-gradient-dark')) {
            text_span_white[i].classList.remove('text-white');
            text_span_white[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < text_strong_white.length; i++) {
          if (text_strong_white[i].classList.contains('text-white')) {
            text_strong_white[i].classList.remove('text-white');
            text_strong_white[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < text_nav_link_white.length; i++) {
          if (text_nav_link_white[i].classList.contains('text-white') && !text_nav_link_white[i].closest('.sidenav')) {
            text_nav_link_white[i].classList.remove('text-white');
            text_nav_link_white[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < secondary.length; i++) {
          if (secondary[i].classList.contains('text-white')) {
            secondary[i].classList.remove('text-white');
            secondary[i].classList.remove('opacity-8');
            secondary[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < bg_gray_600.length; i++) {
          if (bg_gray_600[i].classList.contains('bg-gray-600')) {
            bg_gray_600[i].classList.remove('bg-gray-600');
            bg_gray_600[i].classList.add('bg-gray-100');
          }
        }
        for (var i = 0; i < svg.length; i++) {
          if (svg[i].hasAttribute('fill')) {
            svg[i].setAttribute('fill', '#252f40');
          }
        }
        for (var i = 0; i < btn_text_white.length; i++) {
          if (!btn_text_white[i].closest('.card.bg-gradient-dark')) {
            btn_text_white[i].classList.remove('text-white');
            btn_text_white[i].classList.add('text-dark');
          }
        }
        for (var i = 0; i < card_border_dark.length; i++) {
          card_border_dark[i].classList.remove('border-dark');
        }
        el.removeAttribute("checked");
      }
    };
  </script>
  
  <!--   Core JS Files   -->
  <script src="{{ asset('./assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('./assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('./assets/js/plugins/chartjs.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('./assets/js/material-dashboard.js') }} "></script>
  


</body>

</html>