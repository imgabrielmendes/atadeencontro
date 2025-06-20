@props([
    'id' => '',
    'label' => '',
    'name' => null,
    'placeholder' => 'Selecione uma opção',
    'options' => [],
    'multiple' => false,
    'disabled' => false,
])

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <select 
        id="{{ $id }}" 
        name="{{ $name ?? ($multiple ? $id . '[]' : $id) }}" 
        @if($multiple) multiple @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'form-control']) }}
    >
        @if(!$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $option)
            <option 
                value="{{ $option['value'] }}" 
                {{ (collect(old($name))->contains($option['value'])) ? 'selected' : '' }}
            >
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
</div>
