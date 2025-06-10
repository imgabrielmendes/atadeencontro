{{-- utils/input-group.blade.php --}}
<div class="form-group">
    <label for="{{ $id }}">{{ $label ?? '' }}</label>
    <input type="text"
           class="form-control"
           id="{{ $id }}"
           placeholder="{{ $placeholder }}"
           value="{{ $value ?? '' }}">
</div>
