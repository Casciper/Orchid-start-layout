@php
    $arr = [
    'name',
    'title',
    'idCount',
    'optionsCount',
    'currentValue'
    ];
    for($i = 1; $i <= $optionsCount; $i++){
        $arr[] = 'value'.$i;
        $arr[] = 'option'.$i;
    }
@endphp
@props($arr)
<label for="field-itemselect-{{$idCount}}" class="form-label">
    {{ $title }}
</label>
<select class="form-control" name="{{ $name }}" value="{{ $currentValue }}" title="text" id="field-itemselect-{{$idCount}}" tabindex="-1">
    @for($b=1; $b <= $optionsCount; $b++)
        @php
            $value = 'value'.$b;
            $option = 'option'.$b;
        @endphp
        <option
            @if( $$value === $currentValue) selected="selected" @endif
            value="{{ $$value }}">{{ $$option }}</option>
    @endfor
</select>
