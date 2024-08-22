
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">
<title>الرئيسية</title>
<meta content="Minimal Admin & dashboard Template" name="description">
    @include('main.meta')
</head>
<body>
    <div id="layout-wrapper">
        @include('main.topbar')
        @include('main.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                <div class="col">
                                    <div class="card border-bottom border-3 card-animate border-primary">
                                        <div class="card-body">
                                            <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 3.8%</span>
                                            <h4 class="mb-4"><span class="counter-value" data-target="21438">21,438</span></h4>
                            
                                            <p class="text-muted fw-medium text-uppercase mb-0">Total Orders</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col">
                                    <div class="card border-bottom border-3 card-animate card-secondary border-secondary">
                                        <div class="card-body">
                                            <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 20.8%</span>
                                            <h4 class="mb-4 text-reset"><span class="counter-value" data-target="5963">5,963</span></h4>
                            
                                            <p class="text-white text-opacity-50 fw-medium text-uppercase mb-0">New Orders</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col">
                                    <div class="card border-bottom border-3 card-animate border-warning">
                                        <div class="card-body">
                                            <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 12.6%</span>
                                            <h4 class="mb-4"><span class="counter-value" data-target="4620">4,620</span></h4>
                            
                                            <p class="text-muted fw-medium text-uppercase mb-0">Pending Orders</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col">
                                    <div class="card border-bottom border-3 card-animate border-success">
                                        <div class="card-body">
                                            <span class="badge bg-success-subtle text-success float-end"><i class="ph-trend-up align-middle me-1"></i> 18.7%</span>
                                            <h4 class="mb-4"><span class="counter-value" data-target="8541">8,541</span></h4>
                            
                                            <p class="text-muted fw-medium text-uppercase mb-0">Delivered Orders</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col">
                                    <div class="card border-bottom border-3 card-animate border-danger">
                                        <div class="card-body">
                                            <span class="badge bg-danger-subtle text-danger float-end"><i class="ph-trend-down align-middle me-1"></i> 7.1%</span>
                                            <h4 class="mb-4"><span class="counter-value" data-target="2314">2,314</span></h4>
                            
                                            <p class="text-muted fw-medium text-uppercase mb-0">Cancelled Orders</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>                        </div>
                    
                    </div>
                </div>
            </div>
            @include('main.footer')
        </div>
    </div>
    @include('main.scripts')
</body>
</html>
