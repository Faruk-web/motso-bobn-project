<div>
    <x-slot name="title"> Menu List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Menu List </x-slot>
        {{-- <x-slot name="title">
            @foreach (breadcrumbs('user.setting.menu') as $item)
                <a style="color:#fff" href="{{$item['url']}}">{{$item['name']}}</a> >>
            @endforeach Menu List 
        </x-slot> --}}
        {{-- <x-slot name="title"> Menu List </x-slot> --}}
        <x-template::backend.card>
            <x-slot name="card_header">
                <div x-data>
                    <x-template::button.success @click="$dispatch('callEventFunc',{callName:'openMenuModal'})" style="margin-left:-108px;margin-top:-3px;margin-right:47px;">
                        <span class="fa fa-plus"></span> New Menu <em class="icon ni ni-arrow-long-right"></em>
                    </x-template::button.success>
                </div>
            </x-slot>
            <livewire:user::settings.datatable.menu-datatable class="table-sm" />
            <x-template::modal id="MenuModal" title="Menu {{ $menu_id ? 'Update' : 'Create' }}">
                <div class="row">
                    <div class="col-lg-12">
                        <x-template::input.text wire:model.defer="name" label="Menu Name" require="true" />
                    </div>
                    <div class="col-lg-12">
                        <x-template::input.select wire:model.defer="parent_id" label="Root Menu"
                            :options="$parent_menus->pluck('name', 'id')" />
                    </div>
                    <div class="col-lg-12">
                        <x-template::input.select wire:model.lazy="module_id" label="Module"
                            :options="$modules->pluck('name', 'id')" require="true" />
                    </div>
                    <div class="col-lg-12">
                        <x-template::input.select wire:model.defer="route_name" label="Route Name">
                            @foreach ($route_list as $route)
                            <option value="{{ $route['route_name'] }}">
                                {{ $route['name'] }} | {{ $route['route_name'] }}
                            </option>
                            @endforeach
                        </x-template::input.select>
                    </div>
                    <div class="col-lg-12">
                        <x-template::input.text wire:model.defer="icon" label="Icon" />
                    </div>
                    <div class="col-lg-12">
                        <x-template::input.select wire:model.defer="status" label="Menu Status"
                            :options="config('status.common')" require="true" />
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="menuStore" wire:target='menuStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
