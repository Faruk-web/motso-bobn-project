<div>
    <x-slot name="title"> Module List </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Module List </x-slot>
        {{-- <x-slot name="title">
            @foreach (breadcrumbs('user.setting.module') as $item)
                <a style="color:#fff" href="{{$item['url']}}">{{$item['name']}}</a> >>
            @endforeach Module List 
        </x-slot> --}}
        {{-- <x-slot name="title"> Module List </x-slot> --}}
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openModuleModal'})" style="margin-left:-114px;margin-top:-3px;margin-right:47px;">
                    <span class="fa fa-plus"></span> New Module<em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <livewire:user::settings.datatable.module-datatable />
            <x-template::modal id="moduleModal" title="Module {{ $module_id ? 'Update' : 'Create' }}" size="lg">
                <div class="row">
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="name" label="Name" require="true" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="path" label="path" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="alias" label="alias" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="description" label="description" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="keywords" label="keywords" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="providers" label="providers" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="aliases" label="aliases" />
                    </div>
                    <div class="col-6 ">
                        <x-template::input.text wire:model.defer="requires" label="requires" />
                    </div>
                    {{-- <div class="col-6 ">
                        <x-template::input.text wire:model.defer="files" label="files" />
                    </div> --}}
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="moduleStore" wire:target='moduleStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
