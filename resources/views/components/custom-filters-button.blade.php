<div class="ms-0 ms-md-2 mb-3 mb-md-0">
    <div class="btn-group d-block d-md-inline">
        <div>
            <button type="button" class="btn dropdown-toggle d-block w-100 d-md-inline dripicons-zoom-in" x-on:click="filtersOpen = !filtersOpen" style="margin-top: 24px;
            background-color: #e18b1c !important;
            color: #fff;">
                @lang('Advanced Search')
                <span class="caret"></span>
            </button>
        </div>
    </div>
</div>
@if ($component->filtersAreEnabled() && $component->filterPillsAreEnabled())
    <div class="ms-0 ms-md-2 mb-3 mb-md-0">
        <div class="btn-group d-block d-md-inline">
            <div>
                <button type="button" class="btn dropdown-toggle btn-sm d-block w-100 d-md-inline bg-light text-decoration-none" wire:click.prevent="$emit('clearDatatable')" style="margin-top: 24px;
                background-color: #4e66ec !important;
                color: #fff;height: 37px;"> <i class="fa fa-broom"></i>
                    @lang('Clear')
                    <span class="caret"></span>
                </button>
            </div>
        </div>
    </div>
@endif
