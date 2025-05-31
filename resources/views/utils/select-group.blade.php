<select 
  class="{{ $class ?? 'form-control mt-2 mb-2' }}" 
  id="{{ $id }}" 
  name="{{ $name ?? $id }}"
>
  <option value="" disabled selected>{{ $placeholder ?? 'Selecione uma opção' }}</option>

  @foreach($options as $option)
    <option 
      value="{{ $option[$valueKey] }}"
      @if(old($name ?? $id) == $option[$valueKey]) selected @endif
    >
      {{ $option[$labelKey] }}
    </option>
  @endforeach
</select>
