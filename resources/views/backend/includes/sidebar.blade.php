<div class="leftside-menu">

<!-- LOGO -->
<a href="index.html" class="d-fle justify-content-center">
    <img src="{{asset ('img/logo.png')}}" alt="Logo" height="40" class="me-2">
    <span class="h4 mb-0 mt-1" style="font-family: 'Arial', sans-serif; font-weight: bold; color: #ffffff;">BoRa</span>
</a>


    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Dashboard</li>

            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="dripicons-gear"></i>
                    <span> Home </span>
                </a>
            </li>

            
            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="dripicons-gear"></i>
                    <span> Konfigurasi </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Additional Setting</li>

            <li class="side-nav-item">
                <a href="{{ route('galleries.index') }}" class="side-nav-link">
                    <i class="dripicons-photo"></i>
                    <span> Gallery </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('sliders.index') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Slider </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('events.index') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Events </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('teams.index') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Team </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm"
                    class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span> Article </span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('blogs.index')}}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index')}}">Categories</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm"
                    class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span> CRM </span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="crm-dashboard.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="crm-projects.html">Project</a>
                        </li>
                        <li>
                            <a href="crm-orders-list.html">Orders List</a>
                        </li>
                        <li>
                            <a href="crm-clients.html">Clients</a>
                        </li>
                        <li>
                            <a href="crm-management.html">Management</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Products</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Products Details</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>