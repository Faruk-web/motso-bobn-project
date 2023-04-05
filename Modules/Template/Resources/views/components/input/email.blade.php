<div class="mt-2" style="font-size: 16px;">
    <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
        @isset($attributes['require'])
            <span class="text-danger">(*)</span>
        @endisset
    </label>
    <input @if ($attributes['read-only']) readonly @endif type="email" id="{{ $attributes->wire('model')->value }}"
        {{ $attributes->wire('model') }}
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}"
        placeholder="{{ $attributes['placeholder'] }}">
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
