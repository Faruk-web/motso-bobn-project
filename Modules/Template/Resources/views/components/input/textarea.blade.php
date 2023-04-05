<div class="mt-2"style="font-size: 16px;">
    <label for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}
        @isset($attributes['require'])
            <span class="text-danger">(*)</span>
        @endisset
    </label>
    <textarea id="{{ $attributes->wire('model')->value }}"
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror" {!! $attributes->merge(['class' => 'form-control']) !!}
        placeholder="{{ $attributes['placeholder'] }}"></textarea>
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
