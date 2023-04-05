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
    <x-slot name="title"> Fishing Area Info List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Fishing Area Info List </x-slot>

        <x-template::backend.card>
           
            <x-slot name="card_header">   
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openFishingAreaInfoModal'})" style="margin-left:-94px;margin-top:-3px;margin-right:47px;">
                    <span class="fa fa-plus"></span>Add New <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <a class="btn btn-primary faruk_btn" href="{{route('vesselinfo.fishing.mpdf.area.all')}}" style="margin-top: -29px;"><i class="fa fa-print"></i> Print</a>
            <livewire:vesselinfo::datatable.fishing-area-info-datatable class="table-sm" />
            <x-template::modal id="fishingAreaInfoModal" title="Fishing Area {{ $fishingAreaInfo_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="name" label="Area Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="description" label="Area Description"/>
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="code" label="Area Code" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.select wire:model.defer="status" label="Area Status" :options="config('vesselinfo.status.fishing_area_infos_status')" />
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
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="fishingAreaInfoStore" wire:target='fishingAreaInfoStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
