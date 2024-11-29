@props([
    "credit",
])

<figure
    class="group overflow-hidden rounded-sm text-black shadow-lg transition-shadow duration-100 dark:text-zinc-100"
>
    <div class="overflow-hidden">
        <img
            class="aspect-[4/3] h-full w-full object-cover transition-transform duration-150 group-hover:scale-110"
            src="{{ $credit["imageData"] }}"
            alt="{{ $credit["links"]["image"] }}"
        />
    </div>
    <figcaption
        class="flex flex-row items-center justify-between px-2 py-4 text-sm lg:px-4"
    >
        <div>
            <a
                class="transition-opacity duration-200 hover:opacity-75"
                href="{{ $credit["links"]["author"] }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                {{ "@" . $credit["author"] }}
            </a>
        </div>
        <div>
            <a
                class="rounded-lg bg-gray-100 px-2 py-1 text-blue-800 dark:bg-zinc-900 dark:text-blue-400"
                href="{{ $credit["links"]["image"] }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                {{ "#" . $credit["id"] }}
            </a>
        </div>
    </figcaption>
</figure>
