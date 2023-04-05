<div x-cloak x-show="filtersOpen">
    <div class="row" style="background-color: #d3d0d5;margin-top:20px;">
        @foreach ($this->getFilters() as $filter)
            @if (!$filter->isVisibleInMenus())
                @if ($filter->getKey() == 'district')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-template::search.districts wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'from_date')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-template::input.date wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'to_date')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-template::input.date wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'office_info')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-vesselinfo::search.office wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @else
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-group">
                            <label class="form-label"
                                for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}">
                                {{ $filter->getName() }}
                            </label>
                            <div class="form-control-wrap">
                                {{ $filter->render($component) }}
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
    {{-- <hr style="height: 5px;"> --}}
    {{-- <h2 class="mt-3">Vessel Report</h2> --}}
</div>
