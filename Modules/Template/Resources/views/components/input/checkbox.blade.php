<div class="mt-2" style="color: #5845bb;font-size: 16px;">
    <div class="custom-control custom-switch custom-control-inline">
        @php $id = rand(); @endphp
        <input @if ($attributes['read-only']) readonly @endif {{ $attributes->wire('model') }} type="checkbox"
            id="{{ $attributes->wire('model')->value . $id }}" name="{{ $attributes->wire('model')->value }}"
            class="custom-control-input @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}" />
        <label class="custom-control-label" for="{{ $attributes->wire('model')->value . $id }}">
            @isset($attributes['require'])
                <span class="text-danger">(*)</span>
            @endisset
        </label>
        <span class="switch-label">{{ $attributes['label'] }}</span>
        @error($attributes->wire('model')->value)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
