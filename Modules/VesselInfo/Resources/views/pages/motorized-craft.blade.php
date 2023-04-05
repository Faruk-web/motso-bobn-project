<div>
    <x-slot name="title"> Fishing Vessel and Gear Database </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Fishing Vessel and Gear Database</x-slot>
        <x-template::backend.card>
            <div class="vertical-wizard wizard clearfix vertical" role="application">
                <div class="steps clearfix mt-4">
                    <ul role="tablist">
                        <li role="tab" class="first {{$tabCount == 1 ? 'current' : 'd-none d-sm-block'}}"
                            aria-disabled="false" aria-selected="true">
                            <a style="font-size:16px;" id="vertical-example-t-0" href="javascript::void(0)" wire:click="tabChange(1)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">1.</span> VESSEL SURVEY
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==2 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-1" href="javascript::void(0)" wire:click="tabChange(2)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">2.</span> LEGAL STATUS
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==3 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-3" href="javascript::void(0)" wire:click="tabChange(3)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">3.</span> VESSEL OWNERSHIP
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==4 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-5" href="javascript::void(0)" wire:click="tabChange(4)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">4.</span> VESSEL DESCRIPTION
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==5 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-6" href="javascript::void(0)" wire:click="tabChange(5)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">5.</span> FISHING SPECIES
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==6 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-7" href="javascript::void(0)" wire:click="tabChange(6)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">6.</span> GEAR
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==7 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-8" href="javascript::void(0)" wire:click="tabChange(7)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">7.</span> EQUIPMENT
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==8 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-9" href="javascript::void(0)" wire:click="tabChange(8)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">8.</span> CREW/STAFF
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==9 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-10" href="javascript::void(0)" wire:click="tabChange(9)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">9.</span> TRIP INFORMATION
                            </a>
                        </li>
                        <li role="tab" class="{{$tabCount==10 ? 'current' : 'd-none d-sm-block' }}" aria-disabled="
                            false" aria-selected="false">
                            <a style="font-size:16px;" id="vertical-example-t-10" href="javascript::void(0)" wire:click="tabChange(10)"
                                aria-controls="gear-servey">
                                <span class="current-info audible">current step: </span>
                                <span class="number">10.</span> NON-COMPLIANCE 
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <!-- Seller Details -->
                    <h3 id="vertical-example-h-0" tabindex="-1" class="title">VESSEL SURVEY</h3>
                    <section id="gear-servey" role="tabpanel" aria-labelledby="vertical-example-h-0"
                        class="body {{$tabCount == 1 ? 'current' : 'd-none'}}" aria-hidden="false" style="">
                        <form>
                            <h3  class="title shadow" style="color:#556ee6;text-align: right;text-decoration: purple;">Vessel Survey</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                
                                <div class="col-lg-6">
                                    <x-template::input.text_read wire:model.lazy="old_vessel_index_id" label="Enumerator ID"
                                        read-only="true"  />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-template::input.text_read wire:model.lazy="division_code" label="Division"
                                    read-only="true" />
                                </div> --}}
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.division-select wire:model.lazy="division_code"
                                        label="Divission" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.upazila-select wire:model.lazy="upazilla_id"
                                        label="Upazila" require="true" />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-template::input.text_read wire:model.lazy="upazila_code" label="Upazila"
                                    read-only="true" />
                                </div> --}}
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="name" label="Vessel Name"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="vessel_class_id"
                                        label="Vessel Class" type="vcl" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="type_of_vessel_id"
                                        label="Vessel Sub-Class" type="vst" />
                                </div>
                                <div class="col-lg-6">
                                    {{-- <x-template::input.select wire:model.lazy="name_engraved" label="Name Engraved"
                                    require="true">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select> --}}
                                    <x-template::input.select wire:model.defer="name_engraved" label="Name Engraved"
                                        :options="config('vesselinfo.status.vessel_infos_yes_no')" />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="vessel_sub_class_id"
                                        label="Vessel Su-Class" type="vcl" require="true" />
                                </div> --}}
                          
                                {{-- <div class="col-lg-12">
                                    <div class="row"> --}}
                                        <div class="col-lg-6">
                                            <x-template::input.text wire:model.defer="survey_location_latitude"
                                                label="Survey Location Latitude" require="true" />
                                                <p id="latitude"></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <x-template::input.text wire:model.defer="survey_location_longitude"
                                                label="Survey Location Longitude"  require="true" />
                                                <p id="longitude"></p>
                                        </div>
                                        <div class="col-lg-6">
                                            
                                            <x-template::input.text wire:model.defer="survey_location_altitude"
                                                label="Survey Location Altitude"  require="true" />
                                                {{-- <p id="latitude"></p> --}}
                                        </div>
                                        <div class="col-lg-6">
                                            <x-template::input.text wire:model.defer="survey_location_precision"
                                                label="Survey Location Precision" require="true" />
                                                {{-- <p id="longitude"></p> --}}
                                        </div>
                                    {{-- </div>
                                </div> --}}
                                <p class="mt-3" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</p>
                                <div class="col-lg-12 mt-3" wire:ignore>
                                    <div id="mapid" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom leaflet-pane leaflet-map-pane" style="height:175px;position:relative;width:width:100%;z-index:999;display: block;">
                                    </div>
                                </div>
                                <p class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</p>
                            </div>
                        </form>
                    </section>
                    <!-- LEGAL STATUS -->
                    <h3 id="vertical-example-h-1" tabindex="-2" class="title current">LEGAL STATUS</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 2 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <div>
                                <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Legal Status</h3>
                                <div class="row"style="background-color:#e9d6b773">
                                    <p style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</p>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="registered_with_mmo" label="Registered with MMO"
                                    require="true">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                    {{-- @if($tabCount == 2)
                                    <x-template::input.select-tom wire:model.defer="registered_with_mmo"
                                        label="Registered with MMO" require="true"
                                        :options="config('vesselinfo.status.vessel_infos_yes_no')" />
                                    @endif --}}
                                    </div>
                                <div class="col-lg-6 {{$registered_with_mmo !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="mmo_registration_no"
                                        label="MMO registration#" require="true" />
                                </div>
                                <div class="col-lg-6 {{$registered_with_mmo !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="date_issued" label="MMO Date Issued" />
                                </div>
                                <div class="col-lg-6 {{$registered_with_mmo !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="expired_date_mmo" label="MMO Date Expired" />
                                </div>
                                <div class="col-lg-6 {{$registered_with_mmo !=1 ? '' : 'd-none'}}">
                                    <x-template::input.file wire:model.defer="registration_certificate_image_id"
                                        label="Certificate of Registration " />
                                        @if($registration_certificate_image_id)
                                        <img src="{{$registration_certificate_image_id->temporaryUrl()}}" alt="" width="100px">
                                        @elseif ($registration_certificate_image_prev)
                                        <img src="{{asset('storage/'.$registration_certificate_image_prev)}}" alt="" width="100px">
                                        @else
                                        @endif
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                               </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="row"style="background-color:#b2abeb73">
                                    <span class="" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="fishing_license" label="Fishing license"
                                    require="true">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                    {{-- <x-template::input.select wire:model.defer="fishing_license" label="Fishing license"
                                        require="true" :options="config('vesselinfo.status.vessel_infos_yes_no')" /> --}}
                                </div>
                                <div class="col-lg-6 {{$fishing_license !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="fishing_license_no" label="License no"
                                        require="true" />
                                </div>
                                <div class="col-lg-6 {{$fishing_license !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="license_first_issue_date"
                                        label="Date 1st issued" />
                                </div>
                                <div class="col-lg-6 {{$fishing_license !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="license_first_expired_date"
                                        label="Date 1st Expired" />
                                </div>
                                <div class="col-lg-6 {{$fishing_license !=1 ? '' : 'd-none'}}">
                                    <x-template::input.file wire:model.defer="fishing_license_image_id" label="Fishing License " />
                                    @if($fishing_license_image_id)
                                    <img src="{{$fishing_license_image_id->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($fishing_license_image_prev)
                                    <img src="{{asset('storage/'.$fishing_license_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                              </div>
                                {{-- <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="insurance_status_id"
                                        label="Insurance Status" type="ins" multiple="true" />
                                </div>
                                <div class="col-lg-6 ">
                                    <x-template::input.date wire:model.defer="permit_first_issue_date"
                                        label="Date  Issued" />
                                </div>
                                <div class="col-lg-6 ">
                                    <x-template::input.date wire:model.defer="permit_first_expired_date"
                                        label="Date  Expired" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.file wire:model.defer="insurance_image_id" label="Insurance " />
                                    @if($insurance_image_id)
                                    <img src="{{$insurance_image_id->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($insurance_image_prev)
                                    <img src="{{asset('storage/'.$insurance_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div> --}}
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="row"style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="seaworthiness_certificate" label="Seaworthiness Certificate"
                                    require="true">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                    {{-- <x-template::input.select wire:model.defer="seaworthiness_certificate"
                                        label="Seaworthiness Certificate"
                                        :options="config('vesselinfo.status.vessel_infos_yes_no')" /> --}}
                                </div>
                                <div class="col-lg-6 {{$seaworthiness_certificate !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="seaworthiness_certificate_no"
                                        label="Seaworthiness Certificate No" />
                                </div>
                                <div class="col-lg-6 {{$seaworthiness_certificate !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="seawortthiness_cert_issue_date"
                                        label="Date issued" />
                                </div>
                                <div class="col-lg-6 {{$seaworthiness_certificate !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="seawortthiness_cert_expired_date"
                                        label="Date Expired" />
                                </div>
                                <div class="col-lg-6 {{$seaworthiness_certificate !=1 ? '' : 'd-none'}}">
                                    <x-template::input.file wire:model.defer="seaworthiness_cert_img_id"
                                        label="Certificate of Seaworthiness " />
                                        @if($seaworthiness_cert_img_id)
                                    <img src="{{$seaworthiness_cert_img_id->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($seaworthiness_cert_image_prev)
                                    <img src="{{asset('storage/'.$seaworthiness_cert_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="row"style="background-color:#b2abeb73">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="other_legal_status" label="Sailing">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                    {{-- <x-template::input.select wire:model.defer="fishing_permit" label="Fishing Permit"
                                        :options="config('vesselinfo.status.vessel_infos_yes_no')" /> --}}
                                </div>
                                <div class="col-lg-6 {{$other_legal_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_fishing_no"
                                        label="Sailing No" />
                                </div>
                                <div class="col-lg-6 {{$other_legal_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="other_first_issue_date"
                                        label="Sailing Date Issued" />
                                </div>
                                <div class="col-lg-6 {{$other_legal_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.date wire:model.defer="other_first_expired_date"
                                        label="Sailing Date Expired" />
                                </div>
                                <div class="col-lg-6 {{$other_legal_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.file wire:model.defeDr="other_fishing_image_id" label="Sailing Fishing" />
                                    @if($other_fishing_image_id)
                                    <img src="{{$other_fishing_image_id->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($other_fishing_image_prev)
                                    <img src="{{asset('storage/'.$other_fishing_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="row"style="background-color:#b2abeb73">
                                    <span  style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                   <div class="col-lg-6">
                                       <x-template::input.select_light wire:model.lazy="fishing_permit" label="Fishing Permit"
                                       require="true">
                                       <option value="0">Yes</option>
                                       <option value="1">NO</option>
                                       </x-template::input.select_light>
                                       {{-- <x-template::input.select wire:model.defer="fishing_permit" label="Fishing Permit"
                                           :options="config('vesselinfo.status.vessel_infos_yes_no')" /> --}}
                                   </div>
                                   <div class="col-lg-6 {{$fishing_permit !=1 ? '' : 'd-none'}}">
                                       <x-template::input.text wire:model.defer="fishing_permit_no"
                                           label="Fishing Permit No" />
                                   </div>
                                   <div class="col-lg-6 {{$fishing_permit !=1 ? '' : 'd-none'}}">
                                       <x-template::input.date wire:model.defer="permit_first_issue_date"
                                           label="Date 1st issued" />
                                   </div>
                                   <div class="col-lg-6 {{$fishing_permit !=1 ? '' : 'd-none'}}">
                                       <x-template::input.date wire:model.defer="permit_first_expired_date"
                                           label="Date 1st Expired" />
                                   </div>
                                   <div class="col-lg-6 {{$fishing_permit !=1 ? '' : 'd-none'}}">
                                       <x-template::input.file wire:model.defeDr="fishing_permit_image_id" label="Fishing Permit " />
                                       @if($fishing_permit_image_id)
                                       <img src="{{$fishing_permit_image_id->temporaryUrl()}}" alt="" width="100px">
                                       @elseif ($fishing_permit_image_prev)
                                       <img src="{{asset('storage/'.$fishing_permit_image_prev)}}" alt="" width="100px">
                                       @else
                                       @endif
                                   </div>
                                   <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                   </div>
                                 <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                 <div class="row"style="background-color:#e9d6b773">
                                    <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                    <div class="col-lg-4">
                                        <x-template::input.checkbox wire:model.lazy="vessel_insured"
                                        label="Vessel insured" type="ins" multiple="true" />
                                        <div class="col-lg-12 {{$vessel_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="vessel_insured_issue_date"
                                                label="Date  Issued" />
                                        </div>
                                        <div class="col-lg-12 {{$vessel_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="vessel_insured_expired_date"
                                                label="Date  Expired" />
                                        </div>
                                        <div class="col-lg-12 {{$vessel_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.file wire:model.defer="insurance_image_id" label="Insurance " />
                                            @if($insurance_image_id)
                                            <img src="{{$insurance_image_id->temporaryUrl()}}" alt="" width="100px">
                                            @elseif ($insurance_image_prev)
                                            <img src="{{asset('storage/'.$insurance_image_prev)}}" alt="" width="100px">
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <x-template::input.checkbox wire:model.lazy="lives_insured"
                                        label="Lives insured" type="ins" multiple="true" />
                                        <div class="col-lg-12 {{$lives_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="lives_insured_issue_date"
                                                label="Date  Issued" />
                                        </div>
                                        <div class="col-lg-12 {{$lives_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="lives_insured_expired_date"
                                                label="Date  Expired" />
                                        </div>
                                        <div class="col-lg-12 {{$lives_insured !=0 ? '' : 'd-none'}}">
                                            <x-template::input.file wire:model.defer="insurance_image_id" label="Insurance " />
                                            @if($insurance_image_id)
                                            <img src="{{$insurance_image_id->temporaryUrl()}}" alt="" width="100px">
                                            @elseif ($insurance_image_prev)
                                            <img src="{{asset('storage/'.$insurance_image_prev)}}" alt="" width="100px">
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <x-template::input.checkbox wire:model.lazy="health_insurance"
                                        label="Health insurance" type="ins" multiple="true" />
                                        <div class="col-lg-12 {{$health_insurance !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="health_insurance_issue_date"
                                                label="Date  Issued" />
                                        </div>
                                        <div class="col-lg-12 {{$health_insurance !=0 ? '' : 'd-none'}}">
                                            <x-template::input.date wire:model.defer="health_insurance_expired_date"
                                                label="Date  Expired" />
                                        </div>
                                        <div class="col-lg-12 {{$health_insurance !=0 ? '' : 'd-none'}}">
                                            <x-template::input.file wire:model.defer="insurance_image_id" label="Insurance " />
                                            @if($insurance_image_id)
                                            <img src="{{$insurance_image_id->temporaryUrl()}}" alt="" width="100px">
                                            @elseif ($insurance_image_prev)
                                            <img src="{{asset('storage/'.$insurance_image_prev)}}" alt="" width="100px">
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- VESSEL OWNERSHIP -->
                    <h3 id="vertical-example-h-1" tabindex="-3" class="title current">VESSEL OWNERSHIP</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 3 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Vessel Ownership</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="ownership_type" label="Ownership Type "
                                        require="true">
                                        <option value="0">Individual</option>
                                        <option value="1">Group</option>
                                        <option value="2">Business/Company</option>
                                    </x-template::input.select_light>
                                </div>
                                <div class="col-lg-6 {{$ownership_type !=0 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="number_of_owners" label="Number of owners" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="primary_name" label="Principal owner's name"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="primary_phone" label="Principal owner's phone" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="primary_nid" label="Principal owner's NID (if person)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="primary_fid" label="Principal owner's FID (if person)"
                                     />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.textarea wire:model.defer="primary_address"
                                        label="Principal owner's address" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.file wire:model.defer="primary_image" label="Principal owner's " />
                                    @if($primary_image)
                                    <img src="{{$primary_image->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($primary_image_prev)
                                    <img src="{{asset('storage/'.$primary_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                                <span class="mt-2" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6 {{$ownership_type !=0 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="secondary_name" label="Co-owner's name" />
                                </div>
                                <div class="col-lg-6 {{$ownership_type !=0 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="secondary_phone" label="Co-owner's phone" />
                                </div>
                                <div class="col-lg-6 {{$ownership_type !=0 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="secondary_nid" label="Co-owner's NID" />
                                </div>
                                <div class="col-lg-6 {{$ownership_type !=0 ? '' : 'd-none'}}">
                                    <x-template::input.file wire:model.defer="secondary_image" label="Co-owner's " />
                                    @if($secondary_image)
                                    <img src="{{$secondary_image->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($secondary_image_prev)
                                    <img src="{{asset('storage/'.$secondary_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- VESSEL DESCRIPTION -->
                    <h3 id="vertical-example-h-1" tabindex="-4" class="title current">VESSEL DESCRIPTION</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 4 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration:purple;">Vessel Description</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.defer="year_built" label="Year built" :options="config('user.status.year_built_status')" require="true" />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-template::input.date wire:model.defer="year_built" label="Year built" require="true" />
                                </div> --}}
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="place_built" label="Place built"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="onboard_mobile_number"
                                        label="Onboard Mobile Number" require="true" />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="type_of_vessel_id"
                                        label="Minor Type of vessel" type="vst" />
                                </div> --}}
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="vessel_condition_id"
                                        label="Vessel Condition" type="vcn" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="hull_material_id"
                                        label="Hull material" type="hul" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="color_id"
                                        label="Color(choice)" type="clr" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="other_multi_color_desc"
                                        label="Other (multi) color description"  />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.file wire:model.defer="vessel_image_id" label="Vessel photo"/>
                                    @if($vessel_image_id)
                                    <img src="{{$vessel_image_id->temporaryUrl()}}" alt="" width="100px">
                                    @elseif ($vessel_image_prev)
                                    <img src="{{asset('storage/'.$vessel_image_prev)}}" alt="" width="100px">
                                    @else
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="length_of_vessel" label="Length (m) of vessel"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="width_of_vessel" label="Width (m) of vessel"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="depth_of_vessel" label="Depth (m) of vessel"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="gross_tonnage" label="Gross Tonnage"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="net_tonnage" label="Net Tonnage"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="fish_hold_capacity"
                                        label="Fish hold capacity (MT)" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="engine_no" label="Engine#" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="make_or_model" label="Make/model"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="engine_power" label="Power (BHP)"
                                        require="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                            </div>
                        </form>
                    </section>
                    <!-- FISHING SPECIESS -->
                    <h3 id="vertical-example-h-1" tabindex="-5" class="title current">FISHING SPECIES</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 5 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Fishing Species</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.fishing-species wire:model.lazy="primary_species_id" label="Primary species"
                                        name="name" multiple="true" />
                                    {{-- <x-template::input.select-tom multiple="true" wire:model.lazy="fishing_species_id" label="Primary species"
                                        require="true" /> --}}
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.fishing-species wire:model.defer="secondary_species_id" label="Secondary species"
                                        name="name" multiple="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.fishing-species wire:model.defer="others_species_id" label="Other species"
                                        name="name" multiple="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                            </div>
                        </form>
                    </section>
                    <!-- GEAR -->
                    <h3 id="vertical-example-h-1" tabindex="-6" class="title current">GEAR</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 6 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <div>
                                <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">GEAR</h3>
                                <div class="row"style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="gear_id" label="Gear Name" type="ger" require="true" />
                                </div>
                                {{-- <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setup wire:model.lazy="other_gear_id" label="Other gear (specify)"
                                        type="ger" />
                                </div> --}}
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="gear_count" label="Gear count" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="avg_gear_length" label="Avg gear length (m)"
                                        require="true" />
                                </div>
                              
                                <div class="col-lg-6 {{$gear_id !=46 ? '' : 'd-none'}} {{$gear_id !=47 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="avg_gear_width" label="Avg gear width (m)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6 {{$gear_id !=46 ? '' : 'd-none'}} {{$gear_id !=47 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="mesh_size" label="Mesh size (cm)"
                                        require="true" />
                                </div>
                             
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="number_of_hook_per_line"
                                        label="Number of hooks per line" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="filament_id" label="Filament"
                                        type="flm" />
                                </div>
                                <span class="mt-3" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                </div>
                                <span class="mt-3" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="row"style="background-color:#b2abeb73">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="other_gear_status" label="Other Gear"
                                    >
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                    {{-- @if($tabCount == 2)
                                    <x-template::input.select-tom wire:model.defer="registered_with_mmo"
                                        label="Registered with MMO" require="true"
                                        :options="config('vesselinfo.status.vessel_infos_yes_no')" />
                                    @endif --}}
                                </div>
                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_gear_name"
                                        label="Other Gear Name" require="true" />
                                </div>
                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_gear_count" label="Other Gear count" require="true" />
                                </div>
                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_avg_gear_length" label="Avg gear length (m)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_avg_gear_width" label="Avg gear width (m)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_mesh_size" label="Mesh size (cm)"
                                        require="true" />
                                </div>

                                <div class="col-lg-6 {{$other_gear_status !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.defer="other_number_of_hook_per_line"
                                        label="Number of hooks per line" require="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- EQUIPMENT -->
                    <h3 id="vertical-example-h-1" tabindex="-7" class="title current">EQUIPMENT</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 7 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Equipment</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="nav_equipment_id"
                                        label="Navigation Equipment" type="neq" multiple="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="life_equipment_id"
                                        label="Life saving equipment" type="lse" multiple="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="com_equipment_id"
                                        label="Communication Equipment" type="ceq" multiple="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.vessel-setupp wire:model.lazy="fir_equipment_id"
                                        label="Fire Safety Equipment" type="fse" multiple="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.lazy="other_equipment"
                                        label="Other Equipment (If Any)" type="fse" multiple="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                            </div>
                        </form>
                    </section>
                    <!-- CREW/STAFF -->
                    <h3 id="vertical-example-h-1" tabindex="-8" class="title current">CREW/STAFF</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 8 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Crew/Staff</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="skipper_name" label="Skipper's Name"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="skipper_nid" label="Skipper's NID"
                                    require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="skipper_fid" label="Skipper's FID"
                                        />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="skipper_mobile_no" label="Skipper's Mobile Number"
                                     />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.lazy="number_of_skipper_majhi"
                                        label="Number of skipper" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.lazy="number_of_engine_crew"
                                        label="Number of engine crew" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.lazy="number_of_fishers_deckhand"
                                        label="Number of fishers/deckhand" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    
                                        <x-template::input.text wire:model.lazy="trip_duration" label="Number of other crew"
                                            require="true" />
                                   
                                    {{-- <x-template::input.text wire:model.lazy="number_of_other_crew"
                                        label="Number of other crew" require="true" /> --}}
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text_read wire:model.defer="total_crew"
                                        label="Total Number Of Crew/Staff" require="true" read-only="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                            </div>
                        </form>
                    </section>
                    <!-- TRIP INFORMATION -->
                    <h3 id="vertical-example-h-1" tabindex="-9" class="title current">TRIP INFORMATION</h3>
                    <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                        class="body {{$tabCount == 9 ? 'current' : 'd-none'}}" aria-hidden="true">
                        <form>
                            <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Trip Information</h3>
                            <div class="row" style="background-color:#e9d6b773">
                                <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                <div class="col-lg-6">

                                    <x-template::input.text wire:model.lazy="trip_duration" label="Trip Duration (days)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">

                                    <x-template::input.text wire:model.lazy="trips_per_year" label="Trips per year"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">

                                    <x-template::input.text_read wire:model.defer="fishing_days_per_year"
                                        label="Fishing days per year"  read-only="true" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="avg_cost_per_trip"
                                        label="Avg. cost of a trip (Thousand TK)" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="min_fishing_depth" label="Min Fishing Depth (m)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.text wire:model.defer="max_fishing_depth" label="Max Fishing Depth (m)"
                                        require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.port wire:model.lazy="home_port_id"
                                        label="Home Port" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.port wire:model.lazy="landing_port_id"
                                        label="Landing Port" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-vesselinfo::search.fishing-area wire:model.lazy="fishing_area_ids"
                                        label="Frequent fishing areas" multiple="true" require="true" />
                                </div>
                                <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="other_fishing_area" label="Other Frequent Fishing Area (IF Any)">
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                    </x-template::input.select_light>
                                </div>
                                <div class="col-lg-6 {{$other_fishing_area !=1 ? '' : 'd-none'}}">
                                    <x-template::input.text wire:model.lazy="other_fishing_area_descrip"
                                        label="Other Frequent fishing areas" multiple="true" require="true" />
                                </div>
                                <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                            </div>
                        </form>
                    </section>
                      <!-- TRIP INFORMATION -->
                      <h3 id="vertical-example-h-1" tabindex="-10" class="title current">NON-COMPLIANCE</h3>
                      <section id="vertical-example-p-1" role="tabpanel" aria-labelledby="vertical-example-h-1"
                          class="body {{$tabCount == 10 ? 'current' : 'd-none'}}" aria-hidden="true">
                          <form>
                              <h3 class="title" style="color:#556ee6;text-align: right;text-decoration: purple;">Non-compliance</h3>
                              <div class="row" style="background-color:#e9d6b773">
                                  <span style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                                  <div class="col-lg-6">
                                    <x-template::input.select_light wire:model.lazy="complain_action" label="Non-compliance (If Any)"
                                    >
                                    <option value="0">Yes</option>
                                    <option value="1">NO</option>
                                  </x-template::input.select_light>
                                    {{-- <x-template::input.text wire:model.lazy="legal_action" label="Legal Action"
                                        require="true" /> --}}
                                </div>
                                  <div class="col-lg-6 {{$complain_action !=1 ? '' : 'd-none'}}">
                                      <x-template::input.text wire:model.lazy="legal_action" label="Remark Of Non-Compliance"
                                          require="true" />
                                  </div>
                                  <div class="col-lg-6 {{$complain_action !=1 ? '' : 'd-none'}}">
                                      <x-template::input.text wire:model.lazy="pinishment" label="Remark Of Legal Action Or Penalty"
                                          require="true" />
                                  </div>
                                  <span class="mt-4" style="background-color: rgba(0, 0, 0, 0.308);font-size:1px;">.</span>
                              </div>
                          </form>
                      </section>
                </div>
                <div class="actions clearfix ">
                    <ul role="menu" aria-label="Pagination" style="text-align: right;">
                        {{-- <li class="{{$tabCount == 1 ? 'disabled' : ' '}}"><button type="button" wire:click="previousStore" wire:target="previousStore" class="btn btn-info"><i class="far fa-arrow-alt-circle-left"></i> Previous</button>
                        </li> --}}
                        <li class="{{$tabCount == 1 ? 'd-none' : ' '}}"><button type="button" wire:click="previousStore" wire:target="previousStore" class="btn btn-info"><i class="far fa-arrow-alt-circle-left"></i> Previous</button>
                        </li>
                        <li class="{{$tabCount == 10 ? 'd-none' : ''}}">
                            <button type="button" wire:click="nextStore" wire:target="nextStore" class="btn btn-primary" >Save As Draft<span style="margin-top: 10px;"></span></button>
                        </li>
                        <li class="{{$tabCount == 10 ? 'd-none' : ''}}">
                            <button type="button" wire:click="nextStore" wire:target="nextStore" class="btn btn-warning" > Next <span style="margin-top: 10px;"><i class="far fa-arrow-alt-circle-right "></i></span></button>
                        </li>
                        <li class="{{$tabCount == 10 ? '' : 'd-none'}}"><button type="button" wire:click="nextStore" wire:target="nextStore" class="btn btn-primary" >Save As Draft <span style="margin-top: 10px;"></span></button>
                        </li>
                        <li class="{{$tabCount == 10 ? '' : 'd-none'}}"><button type="button" wire:click="finalStore" wire:target="finalStore" class="btn btn-warning"><i class="far fa-check-circle"></i> Submit</button>
                        </li>
                    </ul>
                </div>
            </div>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" />
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
        // document.getElementById("latitude").textContent = latLng;
        // document.getElementById("longitude").textContent = latLnglarge;
        @this.set('survey_location_latitude',latLng);
        @this.set('survey_location_longitude',latLnglarge);
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