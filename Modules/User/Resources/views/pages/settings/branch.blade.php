<div>
    <x-slot name="title"> Branch List </x-slot>
    <x-template::backend.container>
    <x-slot name="title">
        @foreach (breadcrumbs('user.setting.branch') as $item)
            <a href="{{$item['url']}}">{{$item['name']}}</a> >>
        @endforeach Branch List 
    </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <div x-data>
                    <x-template::button.success @click="$dispatch('callEventFunc',{callName:'openBranchModal'})"
                        style="margin-left:-114px;margin-top:-3px;margin-right:47px;">
                        <span class="fa fa-plus"></span>New Branch <em class="icon ni ni-arrow-long-right"></em>
                    </x-template::button.success>
                </div>
            </x-slot>
            <livewire:user::settings.datatable.branch-datatable class="table-lg" />
            {{-- <div wire:ignore>
                <table id="reportTable" class="table table-striped collapsed" style="width:100%"></table>
            </div> --}}

            <x-template::modal id="BranchModal" title="Branch {{ $branch_id ? 'Update' : 'Create' }}" size="lg">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="name" label="Name" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="phone_no" label="Phone" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="address" label="Address" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="web_address" label="Web Address"
                                    require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.email wire:model.defer="email_add" label="Email" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="reg_code" label="Register Code"
                                    require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="contact_person" label="Contact person" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="contact_person_mobile"
                                    label="Contact Person Mobile" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.email wire:model.defer="contact_email" label="Contact Email" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.select wire:model.defer="status" label="Status" :options="config('user.status.branch_status')" />
                            </div>
                            <div class="col-6 ">
                                <x-template::search.divisions wire:model.lazy="division_code" label="Division Name" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::search.districts wire:model.lazy="district_code" label="District Name" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::search.upazilas wire:model.lazy="upazila_code" label="Upazila Name" require="true" />
                            </div>
                            <div class="col-12 ">
                                <x-template::input.text wire:model="map_url" label="Map Url" />
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-3" wire:ignore>
                        <div id="mapid" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom leaflet-pane leaflet-map-pane" style="height:550px;position:relative;width:width:100%;z-index:999;display: block;">
                        </div>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="branchStore" wire:target='branchStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
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
            const latLng =e.latlng.lat.toFixed(4);
            const latLnglarge =e.latlng.lng.toFixed(4);
            document.getElementById("latitude").textContent = latLng;
            document.getElementById("longitude").textContent = latLnglarge;
            @this.set('survey_location_latitude',latLng);
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
        $(document).ready(function() {
            window.loadDataTable = loadDatatable('#reportTable', {
                ajax: {
                    url: "{{ route('user.datatable', ['table' => 'branchDatatable']) }}",
                    // data:function(data){
                    // 	data.flow = $('select[name="filter_flow"]').val();
                    // 	data.status = $('select[name="filter_status"]').val();
                    // 	data.type = $('select[name="filter_type"]').val();
                    //     data.start_date = $('input#date_filter').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    // 	data.end_date = $('input#date_filter').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    // }
                },
                columns: [{
                        title: 'ID',
                        data: 'id'
                    },
                    {
                        title: 'Name',
                        name: 'name',
                        data: 'name',
                        searchable: true
                    },
                    {
                        title: 'Phone',
                        name: 'phone_no',
                        data: 'phone_no',
                        searchable: true
                    },
                    {
                        title: 'Adress',
                        name: 'address',
                        data: 'address',
                        searchable: true
                    },
                    {
                        title: 'Date',
                        name: 'created_at',
                        data: 'created_at',
                        searchable: false
                    },
                    {
                        title: 'Status',
                        name: 'status',
                        data: 'status',
                        searchable: false
                    },
                    {
                        title: 'Action',
                        name: 'action',
                        data: 'action',
                        searchable: false
                    },
                ]
            }, 'exportable');

            // $(document).on("change",['select[name="filter_flow"]','select[name="filter_type"]','select[name="filter_status"]','input[name="date_filter"]'],function(){
            // 	window.loadDataTable.draw(true);
            // })
        });

        // Begin:: members Search for
        $('#product_search').keyup(function () {
            var vessel_info = $(this).val();
            $.ajax({
                type: 'get',
                url: '/report',
                data: {
                    'vessel_info': vessel_info
                },
                success: function (data) {
                    
                    $('#product_show_info').html(data);
                }
            });
        });
        // End:: doner Search for
    </script>
@endpush


