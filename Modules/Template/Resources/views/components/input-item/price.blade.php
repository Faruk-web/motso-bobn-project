<div>
    <div class="input-group @if (in_array('form-control-sm', explode (' ', $attributes['class']))) input-group-sm @endif" @if($attributes['text-value']) x-show="open" @endif>
        <input @if($attributes['read-only']) readonly @endif type="number" onFocus="this.select()" id="{{$attributes->wire('model')->value}}" onFocus="this.select()" {{$attributes->wire('model')}} class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{$attributes['class']}}"  placeholder="{{ $attributes['placeholder'] }}">
        <div class="input-group-append">
            <span class="input-group-text @error($attributes->wire('model')->value) is-invalid @enderror" id="basic-addon2">{{currencySymbol()}}</span>
        </div>
        @error($attributes->wire('model')->value) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    @if($attributes['text-value'])
    <div x-show="!open">
        <span class="text-center" >{{numberFormat($attributes['text-value'], true)}}</span>
    </div>
    @endif
</div>
