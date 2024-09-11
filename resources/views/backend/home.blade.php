@extends('backend.layouts.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row mb-3">
        <div class="col-12 mt-3">
            <div class="page-title-box">
                <h1 class="h1">Dashboard</h1>
            </div>
        </div>
    </div>
    <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="card shadow-none m-2 flex-fill " style="max-width: 18rem;">
                            <div class="card-body text-center">
                                <i class="dripicons-photo text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $galleries }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Image Galleries</p>
                            </div>
                        </div>

                        <div class="card shadow-none m-2 flex-fill border-start" style="max-width: 18rem;">
                            <div class="card-body text-center">
                                <i class="dripicons-photo-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $sliders }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Sliders</p>
                            </div>
                        </div>

                        <div class="card shadow-none m-2 flex-fill border-start" style="max-width: 18rem;">
                            <div class="card-body text-center">
                                <i class="dripicons-calendar text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $events }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Events</p>
                            </div>
                        </div>

                        <div class="card shadow-none m-2 flex-fill border-start" style="max-width: 18rem;">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $teams }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Teams</p>
                            </div>
                        </div>

                        <div class="card shadow-none m-2 flex-fill border-start" style="max-width: 18rem;">
                            <div class="card-body text-center">
                                <i class="dripicons-document text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $blogs }}</span></h3>
                                <p class="text-muted font-15 mb-0">Total Articles</p>
                            </div>
                        </div>

                    </div> <!-- end flex container -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
</div>
@endsection
