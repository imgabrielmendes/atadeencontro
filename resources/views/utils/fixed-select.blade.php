<select 
  class="form-control"
  id="{{ $id }}"
  type="{{ $type }}"
  name="{{ $name ?? $id }}" 
  aria-label="{{ $ariaLabel ?? $label ?? 'Seleção' }}"
>
  <option disabled selected>{{ $placeholder ?? 'Selecione uma opção' }}</option>

  @foreach ($options as $option)
    <option 
      class="{{ $optionClass ?? '' }}" 
      value="{{ is_array($option) ? $option['value'] : $option }}"
      @if(old($name ?? $id) == (is_array($option) ? $option['value'] : $option)) selected @endif
    >
      {{ is_array($option) ? $option['label'] : $option }}
    </option>
  @endforeach
</select>
