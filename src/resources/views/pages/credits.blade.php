<x-layout>
    <div>
        <h1 class="sr-only text-5xl font-bold">Credits</h1>

        <x-section.basic
            class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
        >
            <x-slot:title>Credits page</x-slot>
            <p>
                Here you can view a list of all the images provided by
                Placemonkeys.
            </p>
            <p class="mt-1">
                Each image listed below includes a link to its original author,
                so feel free to support them on
                <a
                    class="font-semibold"
                    href="https://unsplash.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Unsplash
                </a>
                if you like.
            </p>
            <p class="mt-4">
                You can find detailed information about usage on the
                <a
                    class="font-semibold text-blue-800 dark:text-blue-400"
                    href="{{ route("page.home") }}"
                >
                    main page
                </a>
                .
            </p>
        </x-section.basic>

        <div class="px-4 py-8 lg:px-8 lg:py-16">
            <div class="container mx-auto">
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-8 lg:grid-cols-3 lg:gap-10"
                >
                    @foreach ($credits as $credit)
                        <x-credits.card :credit="$credit" />
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $credits->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
