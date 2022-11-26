@props([
    'title',
    'name',
    'idCount',
    'isRequired' => 'false',
    'value' => ''
])
<label for="field-itemtitle-{{ $idCount }}" class="form-label">
    {{ $title }}
    @if($isRequired === 'true')
        <sup class="text-danger">*</sup>
    @endif
</label>
<div data-controller="input" data-input-mask="">
    <input
        class="form-control"
        name="{{ $name }}"
        @if($isRequired === 'true') required="required" @endif
        id="field-itemtitle-{{ $idCount }}"
        @if($value) value="{{ $value }}" @endif
    >
</div>
