@php
    $jsId = str_replace(['.', '_'], '', $attributes->wire('model')->value);
@endphp
<div class="form-group">
    @if ($attributes['label'])
        <label class="form-label">{{ $attributes['label'] }}</label>
    @endif
    <div class="form-control-wrap">
        <div wire:ignore>
            <select id="{{ $jsId }}" name="{{ $attributes->wire('model')->value }}"
                {{ $attributes->wire('model') }}
                class="@error($attributes->wire('model')->value) invalid @enderror {{ $attributes['class'] }}">
                <option value="">
                    {{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Select ' . $attributes['label'] }}
                </option>
            </select>
        </div>
        @error($attributes->wire('model')->value)
            <div class="invalid" style="color:red">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('js')
    <script>
        var config{{ $jsId }} = {
            valueField: 'id',
            labelField: 'name',
            searchField: ['id', 'name', 'code', 'mobile', 'company'],
            load: (query, callback) => {
                axios.get("{{ route('backend.search', ['type' => $attributes['type']]) }}", {
                        params: {
                            @isset($attributes['user_type'])
                                user_type: "{{ $attributes['user_type'] }}",
                            @endisset
                            search: query
                        }
                    })
                    .then(response => {
                        callback(response.data);
                    }).catch(function(error) {
                        callback();
                    });
            },
            render: {
                option: function(item, escape) {
                    return `<div class="py-1 d-flex">
                                <div>
                                    <div>
                                        <span class="h6">
                                            ${ item.company !== null ? ','+escape(item.company) : escape(item.name) }
                                        </span>
                                        <span class="text-muted"> | ${ escape(item.mobile) }</span>
                                    </div>
                                    <div class="description"> ${ escape(item.name) }</div>
                                </div>
                            </div>`;
                },
                item: function(item, escape) {
                    return `<div>${ item.company !== null ? ','+escape(item.company) : escape(item.name) } | ${ escape(item.mobile) }</div>`;
                }
            }
        };

        document.addEventListener("DOMContentLoaded", function(event) {
            var select{{ $jsId }} = new TomSelect(document.getElementById("{{ $jsId }}"),
                config{{ $jsId }});

            window.addEventListener("{{ $attributes->wire('model')->value }}_update", event => {
                select{{ $jsId }}.addOption({
                    id: event.detail.id,
                    name: event.detail.name,
                    code: event.detail.code,
                    company: event.detail.company,
                    mobile: event.detail.mobile,
                });

                select{{ $jsId }}.setValue(event.detail.id);
            });

            window.addEventListener("{{ $attributes->wire('model')->value }}_reset", event => {
                select{{ $jsId }}.clear();
            });

            window.addEventListener("typeahead_reset", event => {
                select{{ $jsId }}.clear();
            });
        });
    </script>
@endpush
