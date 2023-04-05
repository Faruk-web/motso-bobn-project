<div>
    <x-slot name="title"> Role List </x-slot>
    <x-template::backend.container>
        <x-slot name="title">
            @foreach (breadcrumbs('user.setting.role') as $item)
                <a style="color:#fff" href="{{$item['url']}}">{{$item['name']}}</a> >>
            @endforeach Role List
        </x-slot>
        <x-slot name="title"> Role List </x-slot>
        <x-template::backend.card>
            <x-slot name="card_header">
                <x-template::button.success x-data @click="$dispatch('callEventFunc',{callName:'openRoleModal'})" style="margin-left:-100px;margin-top:-3px;margin-right:47px;">
                    <span class="fa fa-plus"></span> New Role<em class="icon ni ni-arrow-long-right"></em>
                </x-template::button.success>
            </x-slot>
            <livewire:user::settings.datatable.role-datatable />
            <x-template::modal id="RoleModal" title="Role {{ $role_id ? 'Update' : 'Create' }}" size="ml">
                <div class="row">
                    <div class="col-lg-12 ">
                        <x-template::input.text wire:model.lazy="title" label="Title" require="true" />
                    </div>
                    <div class="col-lg-12 ">
                        <x-template::input.text wire:model.defer="name" label="Name" require="true" />
                    </div>
                    <div class="col-lg-12 ">
                        <x-template::input.text wire:model.defer="guard_name" label="Guard Name" />
                    </div>
                </div>
                <x-slot name="footer">
                    <x-template::button.success wire:click="roleStore" wire:target='roleStore' class="fa fa-check">Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>

            {{-- Permission Modal --}}
            <x-template::modal id="RolePermissionModal" title="Update Role Permission" size='xl'>
                <div class="accordion" id="accordionExample">
                    @foreach ($modules as $module)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#module{{ $module->id }}"
                                    aria-expanded="false" aria-controls="module{{ $module->id }}">
                                    {{ $module->name }} Module Permission List
                                </button>
                            </h2>
                            <div id="module{{ $module->id }}" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <table class="table table-border table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-primary">Access</th>
                                                <th class="text-success">Create</th>
                                                <th class="text-info">Update</th>
                                                <th class="text-danger">Delete</th>
                                                <th class="text-warning">All</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count(config(strtolower($module->name) . '.permission')) > 0)
                                                @foreach (config(strtolower($module->name) . '.permission') as $keyPermission => $valuePermission)
                                                    <tr>
                                                        <td>{{ $valuePermission['name'] }}</td>
                                                        @foreach (['view', 'create', 'update', 'delete', 'all'] as $item)
                                                            <td
                                                                class="@if ($item == 'view' && in_array($item, $valuePermission['type'])) bg-primary bg-opacity-25
                                                                @elseif ($item == 'update' && in_array($item, $valuePermission['type']))
                                                                    bg-info bg-opacity-25
                                                                @elseif ($item == 'create' && in_array($item, $valuePermission['type']))
                                                                    bg-success bg-opacity-25
                                                                @elseif ($item == 'delete' && in_array($item, $valuePermission['type']))
                                                                    bg-danger bg-opacity-25
                                                                @elseif ($item == 'all' && in_array($item, $valuePermission['type']))
                                                                    bg-warning bg-opacity-25 @endif">
                                                                @if (in_array($item, $valuePermission['type']))
                                                                    <x-template::input.checkbox
                                                                        wire:model.defer="{{ $item }}.{{ $keyPermission }}" />
                                                                @endif
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end accordion -->
                <x-slot name="footer">
                    <x-template::button.success class="btn btn-success" type="button"
                        wire:click="roleSetPermissionStore" wire:target='roleSetPermissionStore' class="fa fa-check">
                        Save
                    </x-template::button.success>
                </x-slot>
            </x-template::modal>
        </x-template::backend.card>
    </x-template::backend.container>
</div>
