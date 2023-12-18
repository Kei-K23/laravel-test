
<x-layout>

    @include("partial._hero")
    @include("partial._search")
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count( $posts))
        @foreach ($posts as $post)
        <x-post-card :post="$post"/>
        @endforeach
        @else
        <div>
            <p>No posts yet!</p>
        </div>
        @endif
    </div>

    <div class="mt-10">
        {{$posts->links()}}
    </div>

</x-layout>
