@push('css')
<style>
    .faruk_btn{
        margin-left: 84%;
    }
    @media screen and (max-width:1575px) {
            .faruk_btn {
                margin-left:78%;
            }
        }
</style>
@endpush
<div>
    <x-slot name="title"> Vessel Setup info List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Vessel Setup info List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openVesselSetupInfoModal'})" style="margin-left:-95px;margin-top:-3px;margin-right:47px;">
                    <span class="fa fa-plus"></span>Add New <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <a class="btn btn-primary faruk_btn" href="{{route('vesselinfo.vessel.mpdf.setup.all')}}" style="margin-top: -29px;"><i class="fa fa-print"></i> Print</a>
            <livewire:vesselinfo::settings.datatable.vessel-setup-info-datatable class="table-sm" />
            <x-template::modal id="vesselSetupInfoModal" title="Vessel Setup {{ $vesselSetupInfo_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="name" label="Vessel Setup Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="code" label="Vessel Setup Code" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.select wire:model.defer="type" label="Vessel Setup type" :options="config('vesselinfo.status.vessel_setup_infos_type')" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.select wire:model.defer="status" label="Vessel Setup status" :options="config('vesselinfo.status.vessel_setup_infos_status')" />
                    </div>
                    {{-- <div class="col-6 ">
                        <x-template::search.divisions wire:model.lazy="division_code" label="Divisions Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::search.districts wire:model.lazy="district_code" label="District Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::search.upazilas wire:model.lazy="upazila_code" label="Upazila Name" require="true" />
                    </div> --}}
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="vesselSetupInfoStore" wire:target='vesselSetupInfoStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
                </x-template::modal>
            </x-template::backend.card>
    </x-template::backend.container>
</div>
