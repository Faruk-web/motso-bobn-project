@push('css')

@endpush
<div>
    <x-slot name="title"> Change Password </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Change Password </x-slot>
        <div class="row">
            <div class="col-lg-12">
                <x-template::backend.card>
                    <x-slot name="card_title">Change Password</x-slot>
                    <div class="row">
                         <div class="col-lg-6">
                            <x-template::input.password wire:model.defer="current_password" label="Old Password" />
                        </div>
                        <div class="col-lg-6">
                            <x-template::input.password wire:model.defer="password" label="New Password" />
                        </div>
                        <div class="col-lg-6">
                            <x-template::input.password wire:model.defer="password_confirmation" label="Confirm Password" />
                        </div>
                    </div>
                    <x-template::button.success wire:click="passwordChangeStore" wire:target='passwordChangeStore' class="mt-2 fa fa-key">
                        Change Password
                    </x-template::button.success>
                </x-template::backend.card>
            </div>
        </div>
    </x-template::backend.container>
</div>

