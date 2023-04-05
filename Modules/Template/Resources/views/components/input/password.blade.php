<div class="mt-2" style="font-size: 16px;">
    @isset($attributes['label'])
        <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
            @isset($attributes['require'])
                <span class="text-danger">(*)</span>
            @endisset
        </label>
    @endisset
    <input @if ($attributes['read-only']) readonly @endif type="password"
        list="{{ $attributes->wire('model')->value }}_list" {{ $attributes->wire('model') }}
        id="{{ $attributes->wire('model')->value }}"
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}"
        placeholder="{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Please Type ' . $attributes['label'] }}">
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
