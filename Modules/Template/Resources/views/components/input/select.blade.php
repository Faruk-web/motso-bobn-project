<div class="mt-2" style="font-size: 16px;">
    @if ($attributes['label'])
        <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
            @isset($attributes['require'])
                <span class="text-danger">(*)</span>
            @endisset
        </label>
    @endif
    <select id="select_{{ $attributes->wire('model')->value }}" {{ $attributes->wire('model') }}
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}">
        <option value="">
            {{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Select ' . $attributes['label'] }}
        </option>
        @if (isset($attributes['options']))
            @if (count($attributes['options']) > 0)
                @foreach ($attributes['options'] as $key => $option)
                    @if (isset($option['name']))
                        <option value="{{ $key }}">{{ $option['name'] }}</option>
                    @else
                        <option value="{{ $key }}">{{ $option }}</option>
                    @endif
                @endforeach
            @endif
        @else
            {{ $slot }}
        @endif
    </select>
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
