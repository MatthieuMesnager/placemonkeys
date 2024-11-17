<x-layout>
	<div>
		<h1 class="sr-only text-5xl font-bold">Homepage</h1>

		<x-section.basic
				class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
		>
			<x-slot:title>Easy to use</x-slot>
			<p>To get a simple square image:</p>
			<x-code.sample
					class="bg-white text-black dark:bg-zinc-950 dark:text-zinc-100"
			>
				{{ url("/500") }}
			</x-code.sample>
			<p class="mt-4">Or you can specify your desired width & height:</p>
			<x-code.sample
					class="bg-white text-black dark:bg-zinc-950 dark:text-zinc-100"
			>
				{{ url("/500/350") }}
			</x-code.sample>
		</x-section.basic>

		<x-section.grid>
			<x-slot:title>Greyscale</x-slot>
			<p>
				To get an image with the greyscale filter, just add
				<x-code.keyword>?greyscale</x-code.keyword>
				at the end of the URL.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?greyscale") }}
			</x-code.sample>
			<x-slot:image>
				<x-image
						:src="url('/500/350?greyscale')"
						alt="Image of a monkey with a greyscale filter"
				/>
			</x-slot>
		</x-section.grid>

		<x-section.grid :reversed="true">
			<x-slot:title>Sepia</x-slot>
			<p>
				To get an image with the sepia filter, just add
				<x-code.keyword>?sepia</x-code.keyword>
				at the end of the URL.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?sepia") }}
			</x-code.sample>
			<x-slot:image>
				<x-image
						:src="url('/500/350?sepia')"
						alt="Image of a monkey with a sepia filter"
				/>
			</x-slot>
		</x-section.grid>

		<x-section.grid>
			<x-slot:title>Blur</x-slot>
			<p>
				To get a blurred image, just add
				<x-code.keyword>?blur</x-code.keyword>
				at the end of the URL.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?blur") }}
			</x-code.sample>
			<p class="mt-4">
				The default amount of blur is
				<x-code.keyword>15</x-code.keyword>
				,
				but you can adjust it as you like by providing a value between
				<x-code.keyword>0</x-code.keyword>
				and
				<x-code.keyword>100</x-code.keyword>
				.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?blur=25") }}
			</x-code.sample>
			<x-slot:image>
				<x-image
						:src="url('/500/350?blur')"
						alt="Image of a monkey with a blur filter"
				/>
			</x-slot>
		</x-section.grid>

		<x-section.grid :reversed="true">
			<x-slot:title>Spooky</x-slot>
			<p>
				To get some spooky monkeys, just add
				<x-code.keyword>?spooky</x-code.keyword>
				at the end of the URL.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?spooky") }}
			</x-code.sample>
			<x-slot:image>
				<x-image
						:src="url('/500/350?spooky')"
						alt="Image of a monkey with a spooky filter"
				/>
			</x-slot>
		</x-section.grid>

		<x-section.grid>
			<x-slot:title>Advanced usage</x-slot>
			<p>Any filters seen above can be combined.</p>
			<p>
				For example, if you want to have a severe headache, you can
				combine the
				<x-code.keyword>spooky</x-code.keyword>
				and
				<x-code.keyword>blur</x-code.keyword>
				filters:
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?spooky&blur") }}
			</x-code.sample>
			<p class="mt-4">
				You can prevent requested images from being cached by appending
				<x-code.keyword>?random</x-code.keyword>
				at the end of the URL.
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?random") }}
			</x-code.sample>
			<p class="mt-4">
				If you want multiple images of the same size, add the
				<x-code.keyword>?random</x-code.keyword>
				param as well as a value:
			</p>
			<x-code.sample
					class="bg-gray-100 text-black dark:bg-zinc-900 dark:text-zinc-100"
			>
				{{ url("/500/350?random=1") }}
				<br />
				{{ url("/500/350?random=2") }}
			</x-code.sample>
			<x-slot:image>
				<x-image
						:src="url('/500/350?sepia&blur')"
						alt="Image of a monkey with a sepia and blur filters"
				/>
			</x-slot>
		</x-section.grid>
	</div>
</x-layout>
