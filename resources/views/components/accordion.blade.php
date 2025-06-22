@props(['id', 'title', 'icon' => ''])

<div class="accordion-item shadow">
    <h2 class="accordion-header" id="heading-{{ $id }}">
        <button class="accordion-button shadow-sm text-white collapsed" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapse-{{ $id }}"
            aria-expanded="false"
            aria-controls="collapse-{{ $id }}"
            style="background-color: #1c8f69;">
            @if($icon)
                <i class="{{ $icon }} p-1 mb-1"></i>
            @endif
            <h5 class="mb-0 ms-2">{{ $title }}</h5>
        </button>
    </h2>

    <div id="collapse-{{ $id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $id }}">
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
