<?php
    use App\Models\Contribution;

?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">
<title>الاحداث</title>
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
                                <h4 class="card-title">الاحداث</h4>
                            </div>
                            <div class="card-body">
                                <div >
                                    <table id="buttons-datatables" class="table buttons nowrap align-middle text-center w-100" style="width:100%">
                                      <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الرقم</th>
                                            <th>التصنيف</th>
                                            <th>المشاركات</th>
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($volunteers)>0 )
                                            @foreach ($volunteers as $volunteer)
                                           
                                            @php
                                            $contribution = $volunteer->contributions->first();
                                            @endphp
                                            <tr>
                                                <td>{{$volunteer->id}}</td>
                                                <td>{{$volunteer->name}}</td>
                                                <td>{{$volunteer->phone}}</td>
                                                <td>{{$volunteer->status}}</td>
                                                <td class="{{$contribution->total == 0 ? 'table-danger' : '' }}">{{$contribution->total ?? '0'}}</td>
                                                
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
