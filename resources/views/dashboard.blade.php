<x-app-layout>


  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{asset('img/logos/DIGI.png')}}" width="180" height="150"alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/files" aria-expanded="false">
                <span>
                  <i class="ti ti-album"></i>
                </span>
                <span class="hide-menu">Stored Documents</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/upload-file" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Upload Documents</span>
              </a>

              
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" aria-expanded="false" href="{{ route('userverified-files') }}">
                <span>
                  <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">View Your Verified Files</span>
              </a>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">My Profile</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/profile" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>

                <span class="hide-menu">Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/logout" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
           

          
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
 
         @yield('content')
       
    </div>    
  <script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/sidebarmenu.js')}}"></script>
  <script src="{{asset('js/app.min.js')}}"></script>

  <script src="{{asset('libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('js/dashboard.j')}}s"></script>




</x-app-layout>
