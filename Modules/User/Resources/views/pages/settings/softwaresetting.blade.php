<div>
    <x-slot name="title"> Module List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Software Setting </x-slot>
        <x-template::backend.card>
                <div class="row">
                    <h5>Header Part</h5>
                    <div class="col-6 ">
                        <x-template::input.file wire:model.defer="header_logo" label="Header Logo" require="true" />
                        @if($header_logo)
                        <img src="{{$header_logo->temporaryUrl()}}" alt="" width="100px">
                        @elseif ($header_logo)
                        <img src="{{asset('storage/'.$header_logo)}}" alt="" width="100px">
                        @else
                        @endif
                    </div>
                    <div class="col-6 ">
                        <x-template::input.file wire:model.defer="company_logo" label="Company Logo" />
                        @if($company_logo)
                        <img src="{{$company_logo->temporaryUrl()}}" alt="" width="100px">
                        @elseif ($company_logo)
                        <img src="{{asset('storage/'.$company_logo)}}" alt="" width="100px">
                        @else
                        @endif
                    </div>
                    <div class="col-6 ">
                        <x-template::input.file wire:model.defer="website_logo" label="Website Logo" />
                        @if($website_logo)
                        <img src="{{$website_logo->temporaryUrl()}}" alt="" width="100px">
                        @elseif ($website_logo_pre)
                        <img src="{{asset('storage/'.$website_logo_pre)}}" alt="" width="100px">
                        @else
                        @endif
                    </div>
                </div>
                <x-template::button.success wire:click="userStore" wire:target='userStore' class="mt-1 float-end fa fa-check">
                    Save
                </x-template::button.success>
        </x-template::backend.card>
       
               <x-template::backend.card>
                    <div class="row">
                        <h5>Footer Part</h5>
                        <div class="col-6 ">
                            <x-template::input.text wire:model.defer="copyright" label="Copyright" require="true" />
                        </div>
                        <div class="col-6 ">
                            <x-template::input.text wire:model.defer="developer_by" label="Developed by" />
                        </div>
                        <div class="col-6 ">
                            <x-template::input.file wire:model.defer="footer_logo" label="Footer Logo" require="true" />
                            @if($footer_logo)
                            <img src="{{$footer_logo->temporaryUrl()}}" alt="" width="100px">
                            @elseif ($footer_logo_pre)
                            <img src="{{asset('storage/'.$footer_logo_pre)}}" alt="" width="100px">
                            @else
                            @endif
                        </div>
                    </div>
                    <x-template::button.success wire:click="userStore" wire:target='userStore' class="mt-1 float-end fa fa-check">
                    Save
                </x-template::button.success>
        </x-template::backend.card>
            <x-template::backend.card>
                <div class="row">
                    <h5>Social Link</h5>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="website" label="Website" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="faceboack" label="Facebook" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="twitter" label="Twitter" />
                    </div>
                </div>
                <x-template::button.success wire:click="userStore" wire:target='userStore' class="mt-1 float-end fa fa-check">
                    Save
                </x-template::button.success>
            </x-template::backend.card>
        <x-template::backend.card>
                <div class="row">
                    <h5>Page</h5>
                    <div class="col-6 ">
                        <x-template::input.textarea wire:model.defer="login_page" label="Login Page Content" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.textarea wire:model.defer="reset_page" label="Reset Page Content" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.textarea wire:model.defer="otp_page" label="Otp Page Content" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.textarea wire:model.defer="confiremation_page" label="Confirmation Page Content" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.file wire:model.defer="background_imag" label="Background Image" require="true" />
                        @if($background_imag)
                        <img src="{{$background_imag->temporaryUrl()}}" alt="" width="100px">
                        @elseif ($background_imag_pre)
                        <img src="{{asset('storage/'.$background_imag_pre)}}" alt="" width="100px">
                        @else
                        @endif
                    </div>
                </div>
                <x-template::button.success wire:click="userStore" wire:target='userStore' class="mt-1 float-end fa fa-check">
                    Save
                </x-template::button.success>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
