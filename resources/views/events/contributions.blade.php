<?php
    use App\Models\Contribution;

?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">
<title>شيت التابعة الشهري</title>
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
                                <h4 class="card-title">شيت التابعة الشهري</h4>
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
                                            <th>01</th>
                                            <th>02</th>
                                            <th>03</th>
                                            <th>04</th>
                                            <th>05</th>
                                            <th>06</th>
                                            <th>07</th>
                                            <th>08</th>
                                            <th>09</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th>31</th>
                                            <th>اجمالي</th>
                                       
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        @if (count($volunteers)>0 )
                                        @foreach ($volunteers as $volunteer)
                                            @if (count($volunteer->contributions)>0)
                                                @php
                                                $contribution = $volunteer->contributions->first();
                                                @endphp
                                            <tr>
                                                <td>{{$volunteer->id}}</td>
                                                <td>{{$volunteer->name}}</td>
                                                <td>{{$volunteer->phone}}</td>
                                                <td>{{$volunteer->status}}</td>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    @php
                                                        $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                    @endphp
                                                    <td>
                                                        {{ $contribution ? $contribution->$day : '' }}
                                                    </td>
                                                @endfor
                                                
                                                <td>{{ $contribution->total}}</td>
                                                
                                                    
                                               
                                            
                                                                                                
                                            </tr>
                                            @endif
                                            
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
