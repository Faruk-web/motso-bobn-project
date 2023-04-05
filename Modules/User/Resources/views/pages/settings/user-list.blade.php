@push('css')
    <style>
        .table > :not(caption){
  padding:-0.25rem .75rem!important;
  background-color: var(--bs-table-bg)!important;
  border-bottom-width: 1px;
  -webkit-box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)!important;
  box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)!important;
}
    </style>
@endpush
<div>
    <x-slot name="title"> User List </x-slot>
    <x-template::backend.container>
        <x-slot name="title">
            @foreach (breadcrumbs('user.setting.user') as $item)
                <a style="color:#fff" href="{{$item['url']}}">{{$item['name']}}</a> >>
            @endforeach User List
        </x-slot>
        <x-slot name="title"> User List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                @ucan('user.create', 'User')
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openUserModal'})" style="margin-left:-100px;margin-top:-3px;margin-right:47px;">
                    <span  class="fa fa-plus"></span> New User<em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
                @enducan
            </x-slot>
            <livewire:user::settings.datatable.user-datatable />
            <x-template::modal id="userModal" title="User {{ $user_id ? 'Update' : 'Create' }}" size="lg">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="name" label="Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="mobile" label="Mobile" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.file wire:model.defer="profile_picture" label="Profile Picture" require="true" />
                        @if($profile_picture)
                        <img src="{{$profile_picture->temporaryUrl()}}" alt="" width="100px">
                        @elseif ($profile_picture_preview)
                        <img src="{{asset('storage/'.$profile_picture_preview)}}" alt="" width="100px">
                        @else
                        @endif
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="email" label="Email"/>
                    </div>
                    <div class="col-6 ">
                        <x-template::input.password wire:model.defer="password" label="Password" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.password wire:model.defer="password_confirmation" label="Confirm Password" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.select wire:model.defer="branch_id" label="Branch">
                            @foreach ($branchs as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </x-template::input.select>
                    </div>
                    <div class="col-6 ">
                        <x-template::search.roles wire:model.defer="role_ids" label="Roles" />
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="userStore" wire:target='userStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
