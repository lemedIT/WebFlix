@extends('layouts.app')

@section('content')
    <a href="/films" class="text-gray-500">Retour aux films</a>
    <div class="flex gap-10 items-center">
        <div class="w-1/2">
            <img class="w-full" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        </div>

        <div class="w-1/2 ">
            <div class="border rounded p-4 shadow-lg mb-3">
                <h1 class="text-3xl">{{ $movie->title }}</h1>
                <p class="text-xs my-2">
                    @if ($movie->released_at)
                        {{ $movie->released_at->diffForHumans() }}
                        {{ $movie->released_at->translatedFormat('d F Y') }} |
                    @endif
                    @if ($movie->category_id)
                        {{ $movie->category->name }} |
                    @endif
                    {{ $movie->duration() }}
                </p>
                <p class="text-lg">{{ $movie->synopsis }}</p>

            </div>
            @if ($movie->youtube)
            <div class="border rounded p-1 shadow-lg">
                <p class="pl-4 pt-4 text-3xl">Bande-annonce :</p>
                <iframe class="p-3" width="100%" height="315" src="https://www.youtube.com/embed/{{ $movie->youtube }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen mute></iframe>
            @endif
        </div>

        </div>


    </div>
@endsection
