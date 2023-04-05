<div>
    <x-slot name="title"> Role List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Role List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openRoleModal'})">
                    <span class="fa fa-plus">New Role</span> <em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <livewire:user::datatable.role-datatable />
            <x-template::modal id="roleModal" title="Role {{ $role_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="name" label="Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="guard_name" label="Guard Name" />
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="roleStore" wire:target='roleStore'>Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
