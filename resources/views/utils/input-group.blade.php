<div class="input-group">
  <label for="{{ $id ?? 'inputId' }}">{{ $label ?? 'Label do input:' }}</label>
  <input 
    type="{{ $type ?? 'text' }}" 
    id="{{ $id ?? 'inputId' }}" 
    name="{{ $name ?? 'inputName' }}" 
    placeholder="{{ $placeholder ?? 'Digite algo aqui' }}" 
    value="{{ $value ?? '' }}"
  />
</div>
