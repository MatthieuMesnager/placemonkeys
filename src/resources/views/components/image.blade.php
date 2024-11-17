@props([
    "src",
    "alt",
])

<img
    class="mx-auto rounded-lg object-cover shadow-lg"
    src="{{ $src }}"
    alt="{{ $alt }}"
/>
