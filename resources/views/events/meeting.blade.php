
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">
<title>الاجتماعات</title>
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
                          <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الاجتماعات</h4>
                            </div>
                            <div class="card-body">
                                <div >
                                    <table id="buttons-datatables" class="table buttons nowrap align-middle text-center" style="width:100%">
                                      <thead>
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>اللجنة</th>
                                            <th>هيد الاجتماع</th>
                                            <th>دور هيد الاجتماع</th>
                                            <th>عدد الحاضرين</th>
                                            <th>الهدف من الاجتماع</th>
                                            <th>مكان الاجتماع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($events)>0)
                                            @foreach ($events as $event)
                                            <tr>
                                                <td>{{$event->date}}</td>
                                                <td>{{$event->category->name ?? ''}}</td>
                                                <td>{{$event->meeting_head ?? ''}}</td>
                                                <td>{{$event->meeting_position ?? ''}}</td>
                                                <td>{{$event->volunteers->count() ?? ''}}</td>
                                                <td>{{$event->meeting_goals ?? ''}}</td>
                                                <td>{{$event->type}}</td>
                                                
                                        
                                                
                                            </tr>
                                            
                                            @endforeach
                                            @endif
                                    </tbody>
                                        
                                    </table>
                                </div>
                            </div><!-- end card-body -->
                          </div><!-- end card -->
                        </div>
                    
                    </div>
                </div>
            </div>
            @include('main.footer')
        </div>
    </div>
    @include('main.scripts')
</body>
</html>
