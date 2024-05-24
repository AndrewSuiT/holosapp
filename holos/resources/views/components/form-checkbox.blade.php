@props(['label', 'model', 'lcol'=>'4', 'muestraErrores' => 's'])
@php
    $icol     = $lcol != "" ? abs(12 - $lcol) : '';
@endphp

<div class="form-group {{ $lcol != "" ? 'row' : '' }}">
    <label class="{{ $lcol != "" ? 'col-sm-'.$lcol.' col-form-label' : '' }}">{{ $label }}</label>
    <div class="col-sm-{{ $icol }}">
        <input type='checkbox' {{ $attributes->merge(['class' => 'form-check-input-d'. ($errors->has($model) ? ' is-invalid' : '')]) }}>
        @error($model) <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>