
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
                                    <table id="buttons-datatables" class="table buttons nowrap align-middle text-center" style="width:100%">
                                      <thead>
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>النوع</th>
                                            <th>المكان</th>
                                            <th>العدد</th>
                                            <th>عدد التيشرتات</th>
                                            <th>الايراد</th>
                                            <th>المصاريف</th>
                                            <th>تاريخ التوريد</th>
                                            <th>صورة الايصال</th>
                                            <th>الصورة الجماعية</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($events)>0)
                                            @foreach ($events as $event)
                                            <tr>
                                                <td>{{$event->date}}</td>
                                                <td>{{$event->maared_type ?? ''}}</td>
                                                <td>{{$event->place->name ?? ''}}</td>
                                                <td>{{$event->volunteers->count() ?? ''}}</td>
                                                <td>{{$event->tshirt ?? ''}}</td>
                                                <td>{{$event->amount ?? ''}}</td>
                                                <td>{{$event->expenses ?? ''}}</td>
                                                <td>{{$event->pay_date ?? ''}}</td>
                                                <td>
                                                @if($event->getMedia('event_reseats')->first() !== null)
                                                <a href="{{$event->getMedia('event_reseats')->first()->getUrl()}}" download>
                                                    <img  alt="profile" height="75" width="75" class="object-fit-cover text-center my-3" src="
                                                    
                                                    
                                                        {{$event->getMedia('event_reseats')->first()->getUrl()}}
                                                        ">
                                                    </a>
                                                @endif
                                                </td>
                                                <td>
                                                    @if($event->getMedia('event_screns')->first() !== null)
                                                        <a href="{{$event->getMedia('event_screns')->first()->getUrl()}}" download>
                                                        <img  alt="profile" height="75" width="125" class="object-fit-cover text-center my-3" src="
                                                            {{$event->getMedia('event_screns')->first()->getUrl()}}
                                                        ">
                                                        </a>
                                                    @endif
                                                </td>
                                                
                                        
                                                
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
