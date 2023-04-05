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
    <x-slot name="title"> Port info List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Port info List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openPortInfoModal'})" style="margin-left:-93px;margin-top:-3px;margin-right:47px;">
                    <span class="fa fa-plus"></span>Add New <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <a class="btn btn-primary faruk_btn" href="{{route('vesselinfo.fishing.mpdf.port.all')}}" style="margin-top: -29px;"><i class="fa fa-print"></i> Print</a>
            <livewire:vesselinfo::datatable.port-info-datatable class="table-sm" />
            <x-template::modal id="portInfoModal" title="Port info {{ $portInfo_id ? 'Update' : 'Create' }}" size="lg">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="name" label="Port Name" require="true" />
                            </div>
                            <div class="col-6 ">
                                <x-template::input.text wire:model.defer="code" label="Port Code" />
                            </div>
                            <div class="col-12 ">
                                <x-template::input.textarea wire:model.defer="address" label="Address Code" />
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
                            <div class="col-6 ">
                                <x-template::input.select wire:model.defer="status" label="Status" :options="config('vesselinfo.status.port_infos_status')" />
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <x-template::backend.card > 
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.911577982473!2d90.38408601635598!3d23.750532352633776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bfbbc4932091%3A0xd30409b787bfb08b!2sLEOTECH%20(Best%20Software%20Company%20in%20Bangladesh)!5e0!3m2!1sen!2sbd!4v1674974909179!5m2!1sen!2sbd" width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </x-template::backend.card>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="portInfoStore" wire:target='portInfoStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
