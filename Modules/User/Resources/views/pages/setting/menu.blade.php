<div>
    <x-slot name="title"> Menu List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Menu List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openMenuModal'})">
                    <span class="fa fa-plus">New Menu</span> <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <livewire:user::datatable.menu-datatable class="table-sm" />
            <x-template::modal id="menuModal" title="Menu {{ $menu_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="menu_name" label="Menu Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="menu_contant" label="Menu Contant" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="menu_url" label="Menu Url" />
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="menuStore" wire:target='menuStore'>Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
