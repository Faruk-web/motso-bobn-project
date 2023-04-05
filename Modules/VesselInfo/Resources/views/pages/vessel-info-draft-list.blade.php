<div>
    <x-slot name="title"> Vessel info List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Vessel info List </x-slot>
        <x-template::backend.card>

        
            {{-- <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openVesselInfoApprovedModal'})">
                    <span><i class="fa fa-plus"></i> Add New</span> <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot> --}}
            <livewire:vesselinfo::datatable.vessel-info-draft-list-datatable class="table-sm" />
            <x-template::modal id="portInfoModal" title="Menu {{ $portInfo_id ? 'Update' : 'Create' }}" size="ml">
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
        </x-template::backend.card>
    </x-template::backend.container>
</div>
