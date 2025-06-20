@props([
    'id',
    'label',
    'disabled' => false,
    'type' => 'text',
    'name' => '',
    'value' => '',
])
<div class="form-group">
<label for="{{ $id }}">{{ $label }}</label>
<input
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
        'type' => $type,
        'name' => $name,
        'value' => old($name, $value),
        'class' => 'border-gray-300 dark:border-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 rounded-md shadow-sm',
    ]) }}>
</div>