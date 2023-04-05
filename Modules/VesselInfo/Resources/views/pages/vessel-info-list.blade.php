<div>@push('css')
    <style>
        .faru{
        margin-top: 27px;
        background-color: #e18b1c !important;
        color: #fff;
    }
    </style>
    
@endpush
    <x-slot name="title"> Vessel info List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Vessel info List </x-slot>
        
        {{-- <div class="shadow">
            <div class="row" style="box-shadow">
                    <div class="col-12">
                        <div class="row">
                            <a href="{{ route('vesselinfo.vessel_report_pdf') }}">faruk</a>
                            <div class="col-3 ">
                                <x-vesselinfo::search.office wire:model.defer="Office" label="Office Name:" type="" require="true" />
                            </div>
                            <div class="col-3 ">
                                <x-vesselinfo::search.vessel-setupp wire:model.defer="vessel_type" label="Vessel Type" type="" />
                            </div>
                            <div class="col-3 ">
                                <x-vesselinfo::search.fishing-species wire:model.defer="fishing_species" label="Fishing Species" multiple="true"/>
                            </div>
                            <div class="col-3 ">
                                <x-vesselinfo::search.fishing-area wire:model.defer="fishing_area" label="Fishing Area" multiple="true"/>
                            </div>
                            <div class="col-3 ">
                                <x-vesselinfo::search.port wire:model.defer="port_type" label="Port Info" require="true"/>
                            </div>
                            <div class="col-3 ">
                                <x-template::input.date-range wire:model.defer="yearlly" label="Years" :options="config('user.status.branch_status')" />
                            </div>
                            <div class="col-3 ">
                                <x-template::input.select wire:model.lazy="page_size" label="Page Size" :options="config('vesselinfo.status.page_size')"/>
                            </div>
                            <div class="col-3 ">
                                <x-template::input.select wire:model.lazy="page_type" label="Page Type" :options="config('user.status.branch_status')"/>
                            </div>
                            <div class="col-3 ">
                                <x-template::input.date wire:model.defer="date" label="Start Date"  require="true" />
                            </div>
                            <div class="col-3 ">
                                <x-template::input.date wire:model.defer="date" label="End Date"   />
                            </div>
                        </div>
                    </div>
                  
                </div>
        </div> --}}
        <x-template::backend.card>
            <livewire:vesselinfo::datatable.vessel-info-list-datatable class="table-sm" />
            {{-- <div wire:ignore>
                <table id="reportTable" class="table table-striped collapsed" style="width:100%"></table>
            </div> --}}
            <!-- <div class="d-print-none">
                <div class="float-end">
                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                    <a href="javascript: void(0);" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                </div>
            </div> -->
            <x-template::modal id="vessellistInfoModal" title="Menu {{ $vesselInfo_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 ">
                                <x-template::input.select wire:model.defer="status" label="Status" :options="config('vesselinfo.status.vessel_infos_status')" />
                            </div>
                        </div>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="portInfoStore" wire:target='portInfoStore'>Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
            <x-template::modal id="vessellistInfoDeleteModal" title="Vessel Information {{ $vesselInfo_id ? 'Delete' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 ">
                                <p>Are You Sure?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="vesselInfoDelete" wire:target='vesselInfoDelete'>Confirm
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            window.loadDataTable = loadDatatable('#reportTable', {
                ajax: {
                    url: "{{ route('vesselinfo.datatable', ['table' => 'vesselInfoListDatatable']) }}",
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
                        name: 'vessel_name',
                        data: 'vessel_name',
                        searchable: true
                    },
                    {
                        title: 'Registration No',
                        name: 'mmo_registration_no',
                        data: 'mmo_registration_no',
                        searchable: true
                    }, 
                    {
                        title: 'License',
                        name: 'fishing_license_no',
                        data: 'fishing_license_no',
                        searchable: false
                    },
                    {
                        title: 'Permit',
                        name: 'fishing_permit',
                        data: 'fishing_permit',
                        searchable: false
                    },
                    {
                        title: 'Date',
                        name: 'date_issued',
                        data: 'date_issued',
                        searchable: true
                    },
                    {
                        title: 'Status',
                        name: 'status',
                        data: 'status',
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
                url: '/vessel_report',
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