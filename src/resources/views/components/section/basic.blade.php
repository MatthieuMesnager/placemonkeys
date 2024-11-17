<x-section.partials.body {{ $attributes }}>
    <div class="flex items-center">
        <div class="w-full text-center lg:mx-auto lg:w-1/2">
            <x-section.partials.title>
                {{ $title }}
            </x-section.partials.title>

            {{ $slot }}
        </div>
    </div>
</x-section.partials.body>
