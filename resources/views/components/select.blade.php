@props([
    'id',
    'label',
    'placeholder' => 'Selecione uma opção',
    'options' => [],
    'multiple' => false,
])

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <select 
        id="{{ $id }}" 
        class="form-control" 
        {{ $multiple ? 'multiple' : '' }}
        @if($multiple) name="{{ $id }}[]" @else name="{{ $id }}" @endif
    >
        @if(!$multiple)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
        @endforeach
    </select>
</div>
