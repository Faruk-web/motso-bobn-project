

<div>
    <x-slot name="title"> FISHERIES </x-slot>
    <x-template::backend.container>
        <x-slot name="title" style="background-color: rgb(102, 73, 11);color:#fff">Fishing Vessel and Gear Database </x-slot>
        <!-- end page title -->
     <!-- Start right Content here -->
     @push('css')
       <style>
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
      </style>
     @endpush
            <!-- ============================================================== -->
                        <!-- end page title -->
                        <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-body">
      
                                    <div>
                                      <h4 class="card-title mb-4" style="background-color: #7450af;height:33px;padding:4px;color:#fff">Duplicacy List</h4>
                                    </div>


                                      <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                          <thead>
                                            <tr>
                                              <th class="align-middle"style="font-size: 20px"> Name</th>
                                              <th class="align-middle"style="font-size: 20px">Year Built</th>
                                              <th class="align-middle"style="font-size: 20px">Skipper Name</th>
                                              <th class="align-middle"style="font-size: 20px">Skipper NID</th>
                                              <th class="align-middle"style="font-size: 20px">Actinon</th>
                                              {{-- <th class="align-middle">Payload</th> --}}
                                              {{--<th class="align-middle">Last Activity</th>--}}
                                          </tr>
                                          </thead>
      
      
                                          <tbody>
                                            @foreach($p as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->year_built}}</td>
                                                <td>{{$item->skipper_name}}</td>
                                                <td>{{$item->skipper_nid}}</td>
                                                <td>
                                                  <a href="{{route('vesselinfo.report.mpdf.view',$item->year_built)}}" class="btn btn-info waves-effect waves-light btn-sm text-center fa fa-eye" style="font-size: 20px"></a>
                                                  <a href="{{route('vesselinfo.vessel_info_duplicacy_datele',$item->year_built)}}" class="btn btn-danger waves-effect waves-light btn-sm text-center dripicons-trash" style="font-size:13px"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div> <!-- end col -->
                      </div> <!-- end row -->
    </x-template::backend.container>
</div>
@push('js')
<script src="{{ asset('backend/js/app.js')}}"></script>
    <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard blog init -->
    <script src="{{ asset('backend/js/pages/dashboard-blog.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
@push('js')
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
@endpush
