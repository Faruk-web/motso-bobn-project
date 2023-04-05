<div class="mt-2" style="font-size: 16px;">
    <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
        @isset($attributes['require'])
            <span class="text-danger">(*)</span>
        @endisset
    </label>
    <div class="input-group">
        <input @if ($attributes['read-only']) readonly @endif {{ $attributes->wire('model') }} onFocus="this.select()"
            type="number" id="{{ $attributes->wire('model')->value }}"
            class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}"
            placeholder="{{ $attributes['placeholder'] }}">
        <div class="input-group-append">
            <span class="input-group-text @error($attributes->wire('model')->value) is-invalid @enderror"
                id="basic-addon2">{{ currencySymbol() }}</span>
        </div>
        @error($attributes->wire('model')->value)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
