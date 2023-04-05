
<div>
    <x-slot name="title"> FISHERIES </x-slot>
    <x-template::backend.container>
        <x-slot name="title" style="background-color: rgb(102, 73, 11);color:#fff">Fishing Vessel and Gear Database </x-slot>
        <!-- end page title -->
     <!-- Start right Content here -->
     @push('css')
       <style>
        .avatar-sm {
            height: 4rem;
            width: 4rem;
            }
        .card-title{
            font-size: 20px;
        }
        tr{
            border-color: #ddd9e1;
        }
       </style>
       <style>
        #mapid {
          height:583px;
        }
        .leaflet-marker-icon {
          color: #ff0000;
        }
            @media screen and (max-width:1370px) {
                .faruk {
                    font-size:14px!important;
                }
            }
            @media screen and (max-width:1573px) {
                .total_fishing_crew {
                    font-size:15px!important;
                }
            }
      </style>
     @endpush
            <!-- ============================================================== -->
                        <!-- end page title -->

                        <div class="row mt-3">
                            {{-- <div class="col-md-12 mb-2">
                                <div id="ww_3e32d9b5f68a6" v='1.3' loc='auto' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather Data Source: <a href="https://wetterlang.de/" id="ww_3e32d9b5f68a6_u" target="_blank">Wettervorhersage 30 tage</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_3e32d9b5f68a6"></script>
                            </div> --}}
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft" style="background: linear-gradient(to right, #48B276 0%, #00A3AA 100%);">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary" style="color:#fff!important;font-size:20px">Welcome Back !</h5>
                                                    <p style="color:#fff;font-size:18px">Last Login Date & Time: {{$user_info->created_at}}</p>
                                                    <p style="color:#fff;font-size:18px">Last Login IP : {{$ip_addres}}</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="{{asset('backend/images/profile-img.png')}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="{{asset('storage/'.$user_info->profile_picture)}}" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate" style="font-size: 20px !important;">{{$user_info->name}}</h5>
                                                {{-- <p class="text-muted mb-0 text-truncate">UI/UX Designer</p> --}}
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-12" style="background-color:#556ee6;height:55px;padding:5px;margin-left:7px;">
                                                            <h5 class="font-size-15" style="color:#fff">{{$user_info->mobile}}</h5>
                                                            <p class="text-muted mb-0"style="color:#fff!important;font-size: 14px;">{{$user_info->email}}</p>
                                                        </div>

                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="{{url('/member/profile')}}" class="btn btn-primary waves-effect waves-light btn-sm"style="background:#00A3AA;font-size: 18px;">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="overflow-x: hidden">
                                    <div class="card-body">
                                        <div style="background-color: #556ee6;height:33px;padding:4px;">
                                            <h4 class="card-title" style="color:#fff">Curent Status</h4>
                                        </div>
                                        <div class="table-responsive mt-2">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle"style="font-size:18px">Description</th>
                                                        <th class="align-middle"style="font-size:18px">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                        <h3 style="font-size: 17px">Yearly Vessel Registration </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 17px">10</h3>
                                                            {{-- <h3 style="font-size: 17px"> {{$yearly_registration}}</h3> --}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                      
                                                           <h3 style="font-size: 17px">With Registered </h3>
                                                        
                                                        </td>
                                                        <td>
                                                            
                                                            <h3 style="font-size: 17px"> {{$registered_with_mmo}}</h3>
                                                          
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                      
                                                           <h3 style="font-size: 17px">Without Registered </h3>
                                                        
                                                        </td>
                                                        <td>
                                                            
                                                            <h3 style="font-size: 17px"> {{$registered_with_mmo_without}}</h3>
                                                          
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <h3 style="font-size: 17px">With License</h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 17px"> {{$license}}</h3>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <h3 style="font-size: 17px">Without License </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 17px"> {{$no_license}}</h3>   
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <h3 style="font-size: 17px">With Fishing Permit </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 17px">{{$fishing_permit}}</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                      
                                                           <h3 style="font-size: 17px">Without Fishing Permit </h3>
                                                        
                                                        </td>
                                                        <td>
                                                            
                                                            <h3 style="font-size: 17px"> {{$no_permit}}</h3>
                                                          
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                       
                                                        <h3 style="font-size: 17px">With Seaworthines Certificate</h3>
                                                        
                                                        </td>
                                                        <td>
                                                           
                                                            <h3 style="font-size: 17px"> {{$seaworthiness_certificate}}</h3>
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        
                                                        <h3 style="font-size: 17px">Without Seaworthines Certificate </h3>
                                                       
                                                        </td>
                                                        <td>
                                                           
                                                            <h3 style="font-size: 17px"> {{$no_seaworthiness_certificate}}</h3>
                                                           
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>
                                                        
                                                        <h3 style="font-size: 17px"> Fishing Permit</h3>
                                                       
                                                        </td>
                                                        <td>
                                                           
                                                            <h3 style="font-size: 17px">{{$with_fishing_permit}}</h3>
                                                          
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div style="background-color: #556ee6;height:33px;padding:4px;">
                                            <h4 class="card-title" style="color:#fff">Enlistment List for Current Year </h4>
                                        </div>
                                        <div class="table-responsive mt-2">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle"style="font-size:18px">Vessel Name</th>
                                                        <th class="align-middle"style="font-size:18px">Date Of Enlistment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($letest_login_list as $users)
                                                    <tr>
                                                        </td>
                                                        {{--->format('d-M-Y') <td><a href="javascript: void(0);" class="text-body fw-bold">{{optional($users->User)->name}}</a> </td> --}}
                                                        <td style="font-size: 17px">{{$users->name}}</td>
                                                        <td style="font-size: 17px;text-align: center;">
                                                            <span class="badge badge-pill badge-soft-success" style="font-size: 17px;">{{Carbon\Carbon::parse($users->update_date)->format('d-M-Y')}}</span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->

                                    </div>
                                </div>
                               
                            </div>
                           @php
                            $sum_vessel=$total_industrial+$total_vessel;
                           @endphp
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84">
                                            <div class="card-body" style="background:linear-gradient(to right, #7144a1 0%, #d00fea 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Total Vessel </p>
                                                        <h4 class="mb-0" style="color:#fff!important;font-size:40px">{{$sum_vessel}}</h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <img src="{{asset('backend/images/logo/logo5.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84">
                                            <div class="card-body" style="background: linear-gradient(to right, #12a370 0%, #07e0b4 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Industrial Vessel</p>
                                                        <h4 class="mb-0" style="color:#fff!important;font-size:40px">{{$total_industrial}}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <img src="{{asset('backend/images/logo/logo6.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84">
                                            <div class="card-body" style="background:linear-gradient(to right, #F75B6F 0%, #FF7A59 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Artisanal Vessel</p>
                                                        <h4 class="mb-0" style="color:#fff!important;font-size:40px">{{$total_vessel}}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <img src="{{asset('backend/images/logo/logo7.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84">
                                            <div class="card-body" style="background: linear-gradient(to right, #4877B2 0%, #00A3AA 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Verified Vessel</p>
                                                        <h4 class="mb-0" style="color:#fff!important;font-size:40px">{{$total_veryfied_vessel}}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <img src="{{asset('backend/images/logo/logo9.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84 ">
                                            <div class="card-body" style="background: linear-gradient(to right, #f57817 0%, #f1bc2c 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Total Fishing Crew</p>
                                                        <h4 class="mb-0 " style="color:#fff!important;font-size:40px">{{$total_crew}}</h4>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <img src="{{asset('backend/images/logo/logo12.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid h-84 ">
                                            <div class="card-body" style="background: linear-gradient(to right, #497FD9 0%, #2CABF7 100%);">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium faruk total_fishing_crew" style="color:#fff!important;font-size:18px">Total Mechanized </p>
                                                        <h4 class="mb-0" style="color:#fff!important;font-size:40px">0</h4>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <img src="{{asset('backend/images/logo/logo12.png')}}" alt="" style="width:60px;">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body h-150">
                                                <h4 class="card-title mb-4 " style="background-color: #556ee6; height:33px; padding:4px; color:#fff">Artisanal Fishing Block Map</h4>
                                                <div class="leaflet-map" style="height: 382px;">
                                                    <img src="{{asset('backend/images/logo/map.png')}}" alt="" style="height: 104%; width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 mb-3">
                                        <div class="card ">
                                            <div class="card-body h-100">
                                                <h4 class="card-title mb-4"style="background-color: #556ee6;height:33px;padding:4px;color:#fff"> Major Fishing Gear</h4>
                                                    <!-- end main content-->
                                                    <canvas style="display: block; box-sizing: border-box; height: 300px; width: 381px;" id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div> --}}
                                     <!-- end row -->
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" />
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
                                        {{-- <div class="col-xl-4 mb-3">
                                            
                                        </div> --}}
                                </div>
                                 <!-- end row -->

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title d-flex justify-content-center"style="background-color: #556ee6; height:33px; padding:4px; color:#fff">Artisanal Fishing Gear</h4>
                                                <div class="d-flex justify-content-center">
                                                    <div class="mt-4 chartjs-chart" style="height:365px;margin-left: 34px; width:420px; position:relative">
                                                        <canvas id="pie_chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                                                    </div>
                                                </div>
                                                {{-- <h4 class="card-title mb-4">Artisanal Fishing Gear </h4>
                                                <div id="pie_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger","--bs-info", "--bs-warning"]' class="apex-charts" dir="ltr"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title d-flex justify-content-center" style="background-color: #556ee6; height:33px; padding:4px; color:#fff">Industrial Fishing Gear</h4>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="mt-4 chartjs-chart" style="height:365px;margin-left: 34px; width:420px; position:relative">
                                                            <canvas id="donut_chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                                                        </div>
                                                    </div>
                                                {{-- <h4 class="card-title mb-4">Industrial Fishing Gear </h4>
                                                
                                                <div id="donut_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger","--bs-info", "--bs-warning"]' class="apex-charts"  dir="ltr"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                        <!-- end row -->
                                <div class="card">
                                    <div class="card-body">
                                        <div id="mapid" class="leaflet-map" style="height: 260px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- end row -->
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg-12 mb-3">
                                          <div class="card h-100">
                                              <div class="card-body">
                                                  <div style="background-color: #556ee6;height:33px;padding:4px;">
                                                      <h4 class="card-title mb-4" style="color:#fff" >Login History</h4>
                                                  </div>
                                                  <div class="table-responsive mt-2">
                                                      <table class="table align-middle table-nowrap mb-0">
                                                          <thead class="table-light">
                                                              <tr>
                                                                  <th class="align-middle"style="font-size: 20px">User Name</th>
                                                                  <th class="align-middle"style="font-size: 20px">IP Address</th>
                                                                  <th class="align-middle"style="font-size: 20px">Browser Name</th>
                                                                  {{-- <th class="align-middle">Payload</th> --}}
                                                                  {{--<th class="align-middle">Last Activity</th>--}}
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($allSessions as $users)
                                                              <tr>
                                                                  {{-- encrypt --}}
                                                                  <td style="font-size:18px">{{optional($users->UserInfo)->name}}</td>
                                                                  <td style="font-size:18px">{{$users->ip_address}}</td>
                                                                  <td style="font-size:18px">
                                                                      <span class="badge badge-pill badge-soft-success font-size-11">{{$users->user_agent}}</span>
                                                                  </td>
                                                                  {{-- <td>{{$users->payload}}</td> --}}
                                                                  {{--<td>{{$users->last_activity }}</td>--}}
                                                              </tr>
                                                              @endforeach
                                                          </tbody>
                                                      </table>
                                                  </div>
                                                  <!-- end table-responsive -->
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                        <!-- end row -->
                           <div class="col-md-12 mb-2">
                                <div id="ww_3e32d9b5f68a6" v='1.3' loc='auto' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather Data Source: <a href="https://wetterlang.de/" id="ww_3e32d9b5f68a6_u" target="_blank">Wettervorhersage 30 tage</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_3e32d9b5f68a6"></script>
                            </div>

    </x-template::backend.container>
</div>	
@push('js')
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard blog init -->
    <script src="{{ asset('backend/js/pages/dashboard-blog.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js" integrity="sha512-VdqgeoWrVJcsDXFlQEKqE5MyhaIgB9yXUVaiUa8DR2J4Lr1uWcFm+ZH/YnzV5WqgKf4GPyHQ64vVLgzqGIchyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@push('js')
<script>
    var donutValue = [];
     $.ajax({
        type:'GET',
        url:'/vesselinfo/get/donut',
        success:function(data) {
            // console.log(data);
            const ctx = document.getElementById('donut_chart');
            const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                    labels: ['ESBN', 'Set Back Net','Trammel net','Line and hook','Pole and hook'],
                    datasets: [{
                        label: ' Count ',
                        data: data,
                        backgroundColor: [
                            
                            '#8FC741',
                            '#655CA8 ',
                            '#F7901E',
                            '#1C907F',
                            'rgba(74, 4, 60, 0.28)',
                            'rgba(126, 142, 8, 0.85)',
                        ],
                        borderColor: [
                            
                            '#8FC741',
                            '#655CA8 ',
                            '#F7901E',
                            '#1C907F',
                            'rgba(74, 4, 60, 0.28)',
                            'rgba(126, 142, 8, 0.85)',
                        ],
                        borderWidth: 1
                    }]
                },
            });
        }
    });

</script>
<script>

    var categoryName = [];
    var number_of_products = [];
    var colorchart = [];

    $.ajax({
        type: "GET",
        url: "/vesselinfo/get/pie",
        success: function (data) {
            console.log(data);

             for(var i = 0; i <data.length;i++)
            {
                categoryName.push(data[i].name);
                number_of_products.push(data[i].gear_type_count);
                var randomColor = random_rgba();
                colorchart.push(randomColor);

            }
            const ctx = document.getElementById('pie_chart');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: categoryName ,
                    datasets: [{
                        label: ' Count ',
                        data: number_of_products,
                        // backgroundColor:
                        //     colorchart,
                        // borderColor:
                        //     colorchart
                        // ,
                        backgroundColor: [
                            '#D9B20C',
                            'rgb(171, 68, 230)',
                            'rgb(9, 115, 147)',
                            'rgb(83, 104, 215)',
                            '#F5A752',
                            '#1C907F',
                            'rgb(26, 93, 221)',
                        ],
                        borderColor: [
                            '#D9B20C',
                            'rgb(171, 68, 230)',
                            'rgb(9, 115, 147)',
                            'rgb(83, 104, 215)',
                            '#F5A752',
                            '#1C907F',
                            'rgb(26, 93, 221)',
                        ],
                        borderWidth: 1
                    }]
                }

            });
        }

    });

    function random_rgba() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }

</script>
<!-- end row -->
<script>
    var map = L.map('mapid').setView([23.685, 90.3563], 7);
    // The above line creates a new Leaflet map centered on the specified latitude and longitude of Bangladesh, with a zoom level of 7.

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      // This line sets the tile layer to use OpenStreetMap tiles.
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([23.8103, 90.4125]).addTo(map);
    // The above line adds a marker to the map at the specified latitude and longitude for Dhaka city.
    marker.bindPopup("<b>Dhaka</b>").openPopup();

    function onMapClick(e) {
      // Remove the existing marker, if any
      if (marker) {
        map.removeLayer(marker);
      }
      // Add a new marker at the clicked location
      marker = L.marker(e.latlng).addTo(map);
      marker.bindPopup("<b>New Location</b><br/>Latitude: " + e.latlng.lat.toFixed(4) + "<br/>Longitude: " + e.latlng.lng.toFixed(4)).openPopup();
    }
    map.on('click', onMapClick);
  </script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Set Back Net ', 'Trammel net ', 'Line and hook ', 'Pole and hook '],
            datasets: <?php echo json_encode($data); ?>
        },
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>
@endpush
