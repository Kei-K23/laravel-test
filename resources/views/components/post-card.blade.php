@props([
    "post"
])

<x-card >
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="/no-image.png"
            alt=""
        />
        <div>
        <h3 class="text-2xl">
            <a href="/posts/{{ $post->id  }}">{{ $post->title }}</a>
        </h3>
        <div class="text-xl font-bold mb-4">{{ $post->company  }}</div>
       <x-tags  :tagsCsv="$post->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$post->location}}
            </div>
        </div>
    </div>
</x-card>
