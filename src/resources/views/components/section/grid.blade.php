@props([
    "reversed" => false,
])

<x-section.partials.body {{ $attributes }}>
    <div
        @class(["flex flex-col gap-6 lg:flex-row lg:gap-x-8", "lg:flex-row-reverse" => $reversed])
    >
        <div class="w-full text-center lg:w-1/2">
            <x-section.partials.title>
                {{ $title }}
            </x-section.partials.title>

            {{ $slot }}
        </div>
        <div class="w-full lg:w-1/2">
            {{ $image }}
        </div>
    </div>
</x-section.partials.body>
