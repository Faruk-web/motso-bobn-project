<div x-cloak x-show="filtersOpen">
    <div class="row">
        @foreach ($this->getFilters() as $filter)
            @if (!$filter->isVisibleInMenus())
                @if ($filter->getKey() == 'district')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.districts wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif($filter->getKey() == 'division')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.divisions wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'upazila')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.upazilas wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'sub_agent')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.sub-agents
                            wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'agent')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.agents wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
                            label="{{ $filter->getName() }}" :placeholder="$filter->hasConfig('placeholder') ? $filter->getConfig('placeholder') : null" />
                    </div>
                @elseif ($filter->getKey() == 'hub')
                    <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-search.hubs wire:model.stop="{{ $this->getTableName() }}.filters.{{ $filter->getKey() }}"
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
</div>
