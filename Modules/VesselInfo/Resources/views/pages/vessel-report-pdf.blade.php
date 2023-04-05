<div>
    <x-slot name="title"> Vessel Info Invoice </x-slot>
    <x-template::backend.container>
      <!-- end page title -->
      <x-slot name="title"> Vessel Info Invoice </x-slot>
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                                <div class="float-start mb-4" >
                                    <address>
                                    <div class="mb-4">
                                       <img src="{{ asset('backend/images/logo.jpg') }}" alt="" height="100"
                                        width="100">
                                    </div>
                                    </address>
                                </div>
                                <div class="text-sm-center" style="margin-top: -119px;">
                                    <address class="mb-3 mt-sm-0">
                                    <h3 style="color:blue" class=" font-size-16">Fishing Vessel and Gear Database</h3>
                                    <h5 class=""style="color:#0b59bd;">Sustainable Coastal and Marine Fisheries Project</h5>
                                    </address>
                                </div>
                            </div>
                    <hr style="height: 5px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <address>
                                <strong>Report No:</strong><br>
                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <address class="mt-2 mt-sm-0">
                                <strong>Date: 14-Feb-2023</strong><br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                       <h2 class="text-center" style="color:blue">Vessel Info Report Details.</h2>
                       <h2 class="text-center" style="color: #f70d36;">from 01-Sep-2022 to 30-Sep-2022</h2>
                    </div>
                    <div class="py-2 mt-3">
                        <!-- <h3 class="font-size-15 fw-bold">Vessel Info Details</h3> -->
                    </div>
                    <hr style="height: 5px;">
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                   
                                    <th>User Name</th>
                                    <th>Vessel Name</th>
                                    <th>Skipper Name</th>
                                    <th>Place Built</th>
                                    <th>License No</th>
                                    <th>Engine No</th>
                                    <th>Updated Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vesselInfo as $items)
                                <tr>
                                    <td>{{$items->User->name}}</td>
                                    <td>{{$items->vessel_name}}</td>
                                    <td>{{$items->skipper_name}}</td>
                                    <td>{{$items->place_built}}</td>
                                    <td>{{$items->fishing_license_no}}</td>
                                    <td>{{$items->engine_no}}</td>
                                    <td>{{$items->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr style="height: 2px;">
                    <div class="d-print-none">
                        <div class="float-start">
                            <a href="javascript:window.print()" class="waves-effect waves-light me-1" style="color:#0b59bd;">Powered by www.leotechbd.com</a>
                            
                        </div>
                    </div>
                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                            <a href="javascript: void(0);" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    </x-template::backend.container>
</div>

