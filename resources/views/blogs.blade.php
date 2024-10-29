<x-layout>
    <x-slot:page>{{ $page }}</x-slot:page>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="#" class="hover:underline">
                <h2 class=" text-3xl tracking-tight font-bold text-gray-900">{{ $post->created_at->format('j F Y') }} |
                    {{ $post['title'] }}</h2>
            </a>
            <div class="">
                Author:
                <a href="" class="text-base text-gray-500 hover:underline">
                    {{ $post->author }}</a>
                in
                <a href="" class="text-base text-gray-500 hover:underline">
                    {{ $post->auhtor }}</a>
            </div>
            <p class="my-4 font-light">{{ Str::limit($post['blog'], 300) }}
            </p>
            📘
            <a href="#" class="font-medium text-gray-800 hover:underline">keep reading.</a>
        </article>
    @endforeach

</x-layout>
