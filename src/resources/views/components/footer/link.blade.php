@props([
    "href",
    "title",
])

<a
    {{ $attributes->only(["target"]) }}
    class="border-blue-10 border-b text-blue-100 transition-opacity duration-200 hover:opacity-85"
    href="{{ $href }}"
    title="{{ $title }}"
>
    {{ $title }}
</a>
