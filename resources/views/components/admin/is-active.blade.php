@props([
    'name',
    'title',
    'help',
    'value' => '0'
])
<label for="field-itemis-active-1" class="form-label">
    {{ $title }}
</label>

<div data-controller="checkbox" data-checkbox-indeterminate="">
    <input hidden="" name="{{ $name }}" value="0">
    <div class="form-check">
        <input value="{{ $value }}"
               type="checkbox"
               class="form-check-input is_active-check"
               novalue="0"
               yesvalue="1"
               name="{{ $name }}"
               title="Активность"
               id="field-itemis-active-1"
                @if($value === '1')
                    checked="checked"
                @endif
        >
        <label class="form-check-label" for="field-itemis-active-1"></label>
    </div>
</div>

<small class="form-text text-muted">{{ $help }}</small>


