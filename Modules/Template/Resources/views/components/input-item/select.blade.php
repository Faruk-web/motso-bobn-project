<div>
    <div class="" @if($attributes['text-value']) x-show="open" @endif>
        <select id="{{$attributes->wire('model')->value}}" {{$attributes->wire('model')}} class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{$attributes['class']}}">
            <option value="">{{ $attributes['placeholder'] }}</option>
                @if (isset($attributes['options']))
                        @if(count($attributes['options']) > 0)
                            @foreach($attributes['options'] as $key => $option)
                                @if (isset($option['name']))
                                    <option value="{{$key}}" >@if($attributes['option-lang']) {{__('text.'.$option['name'])}} @else {{$option['name']}} @endif</option>
                                @else
                                    <option value="{{$key}}" >@if($attributes['option-lang']) {{__('text.'.$option)}} @else {{$option}} @endif</option>
                                @endif
                            @endforeach
                        @endif
                    @else
                    {{$options}}
                @endif
        </select>
    </div>
    @error($attributes->wire('model')->value)<div class="invalid-feedback">{{ $message }}</div>@enderror
    @if($attributes['text-value'])
    <div x-show="!open">
        <span class="text-center" >{{$attributes['text-value']}}</span>
    </div>
    @endif
</div>
