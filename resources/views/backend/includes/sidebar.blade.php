<div class="leftside-menu">

<!-- LOGO -->

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Dashboard</li>

            <li class="side-nav-item">
                <a href="{{ route('backend') }}" class="side-nav-link">
                    <i class="dripicons-home"></i>
                    <span> Home </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="{{ route('configuration.index') }}" class="side-nav-link">
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
                    <i class="dripicons-photo-group"></i>
                    <span> Slider </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('events.index') }}" class="side-nav-link">
                    <i class="uil-calendar-alt"></i>
                    <span> Events </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('teams.index') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Team </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#article" aria-expanded="false" aria-controls="sidebarCrm"
                    class="side-nav-link">
                    <i class="uil uil-file-alt"></i>
                    <span> Article </span>
                </a>
                <div class="collapse" id="article">
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
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>