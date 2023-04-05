<div class="mt-2" style="font-size: 16px;">
    @isset($attributes['label'])
        <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
            @isset($attributes['require'])
                <span class="text-danger">(*)</span>
            @endisset
        </label>
    @endisset
    @error($attributes->wire('model')->value)
            <span class="error"><small>{{ $message }}</small></span>
        @else
            <span style="color:brown"> (Max file size 5 mb) </span>
        @enderror
    <div class="custom-file">
        <input type="file" id="{{ $attributes->wire('model')->value }}-{{ rand() }}"
            {{ $attributes->wire('model') }}
            class="custom-file-input form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}">
        <label wire:loading.remove wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}"></label> 
        <label wire:loading wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}">Uploading...</label>
        

    </div>
</div>
