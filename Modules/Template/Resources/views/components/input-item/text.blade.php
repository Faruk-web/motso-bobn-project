<div>
    <div class="" @if($attributes['text-value']) x-show="open" @endif>
        <input @if($attributes['read-only']) readonly @endif type="text" id="{{$attributes->wire('model')->value}}" {{$attributes->wire('model')}} class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{$attributes['class']}}" placeholder="{{ $attributes['placeholder'] }}">
        @error($attributes->wire('model')->value) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    @if($attributes['text-value'])
    <div x-show="!open">
        <span class="text-center" >{{$attributes['text-value']}}</span>
    </div>
    @endif
</div>
