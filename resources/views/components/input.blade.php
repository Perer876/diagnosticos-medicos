@props([
    'id',
    'name',
    'label',
    'class' => 'form-control',
    ])

<div class="form-group">
    <label for="{{ $id }}">{{ $slot }}</label>
    <input name="{{ $name }}" id="{{ $id }}"
           class="{{ $class }} @error($name)is-invalid @enderror" {{ $attributes }}}>
    @error($name)
    <div class="invalid-feedback">
        <i class="bx bx-radio-circle"></i>
        {{ $message }}
    </div>
    @enderror
</div>
