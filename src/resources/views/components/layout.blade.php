@props([
    "header",
    "footer",
])

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config("app.name") }} - placeholder images of monkeys</title>
        <meta
            name="description"
            content="A quick and simple service for getting images of monkeys for use as placeholders."
        />
        <meta
            name="author"
            content="Matthieu Mesnager (https://github.com/MatthieuMesnager)"
        />
        <meta name="robots" content="all" />

        <!-- Favicons -->
        <link
            rel="shortcut icon"
            href="{{ asset("favicon.ico") }}"
            type="image/x-icon"
        />
        <link
            rel="icon"
            href="{{ asset("favicon.ico") }}"
            type="image/x-icon"
        />

        <!-- Open Graph Tags -->
        <meta property="og:type" content="website" />
        <meta
            property="og:title"
            content="{{ config("app.name") }} - placeholder images of monkeys"
        />
        <meta
            property="og:description"
            content="A quick and simple service for getting images of monkeys for use as placeholders."
        />
        <meta property="og:image" content="{{ url("/250") }}" />
        <meta property="og:url" content="{{ url("") }}" />
        <meta property="og:site_name" content="{{ config("app.name") }}" />

        <!-- Twitter Cards Tags -->
        <meta
            name="twitter:title"
            content="{{ config("app.name") }} - placeholder images of monkeys"
        />
        <meta
            name="twitter:description"
            content="A quick and simple service for getting images of monkeys for use as placeholders."
        />
        <meta name="twitter:image" content="{{ url("/250") }}" />

        <link rel="canonical" href="{{ url()->current() }}" />
        <link rel="stylesheet" href="{{ asset("css/app.css") }}" />

        <!-- Styles & Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="font-sans bg-white text-black dark:bg-zinc-950 dark:text-zinc-100">
        <header>
            <div class="flex flex-row items-center justify-end pr-4 pt-4">
                <x-theme-switcher />
            </div>
            <x-section.grid>
                <x-slot:title>
                    {{ config("app.name") }}
                </x-slot>
                <p class="-mt-2 text-xl font-thin">
                    Because monkeys are amazing.
                </p>
                <x-slot:image>
                    <x-image :src="url('/500/350')" alt="Image of a monkey" />
                </x-slot>
            </x-section.grid>
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer
            class="flex flex-col items-center gap-y-2 bg-stone-950 px-5 py-10 text-gray-100 xl:px-10 xl:py-20"
        >
            <div
                class="flex flex-col items-center gap-y-2 sm:flex-row sm:flex-wrap"
            >
                <x-footer.item>
                    <span>Created by</span>
                    <x-slot:link>
                        <x-footer.link
                            href="https://github.com/MatthieuMesnager"
                            title="Matthieu Mesnager"
                            target="_blank"
                        />
                    </x-slot>
                </x-footer.item>
                <x-footer.item>
                    <span>Inspired by</span>
                    <x-slot:link>
                        <x-footer.link
                            href="https://picsum.photos"
                            title="Lorem Picsum"
                            target="_blank"
                        />
                    </x-slot>
                </x-footer.item>
            </div>
            <div
                class="flex flex-col items-center gap-y-2 sm:flex-row sm:flex-wrap"
            >
                <x-footer.item>
                    <span>Images from</span>
                    <x-slot:link>
                        <x-footer.link
                            href="https://unsplash.com"
                            title="Unsplash"
                            target="_blank"
                        />
                    </x-slot>
                </x-footer.item>
            </div>
        </footer>
    </body>
</html>
