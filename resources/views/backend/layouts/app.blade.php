<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.head')
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.includes.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Header Start -->
                @include('backend.includes.header')
                <!-- Header End -->

                <!-- content -->

                    {{-- {{{{{{{{{Isi Kontent}}}}}}}}}} --}}
                    @yield('content')

            </div>
            <!-- content -->
            <!-- Footer Start -->
            @include('backend.includes.footer')
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @yield('scripts')
    @include('backend.includes.script')
</body>
</html>