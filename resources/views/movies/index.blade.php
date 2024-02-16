@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-12 mb-6">
        <h1 class="text-3xl">Films</h1>
        <a href="/films/creer"
            class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer un
            film</a>
    </div>

    <div class="flex flex-wrap -mx-3">
        @foreach ($movies as $movie)
            <div class="w-1/2 md:w-1/3 lg:w-1/5 mb-5">
                <div class="flex flex-col justify-between h-full rounded shadow-lg m-1">
                    <a href="/film/{{ $movie->id }}" class="block mx-3 group">
                        <img class="w-full h-[250px] rounded" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                        <h3 class="text-sm text-gray-600 underline group-hover:no-underline">{{ $movie->title }}</h3>
                        <p class="text-xs">
                            @if ($movie->released_at)
                                {{ $movie->released_at->diffForHumans() }}
                                {{ $movie->released_at->translatedFormat('d F Y') }} |
                            @endif
                            @if ($movie->category_id)
                                {{ $movie->category->name }} |
                            @endif
                            {{ $movie->duration() }}
                        </p>

                    </a>
                    @if (Auth::user() && Auth::user()->id == $movie->user_id)
                    <div class="flex mx-3 mb-3 m-2 justify-around">
                        <a class="border hover:border-gray-500 rounded py-1 px-2 bg-gray-500 hover:bg-white text-white hover:text-gray-500 text-xs"
                            href="/film/{{ $movie->id }}/modifier">Modifier</a>
                        <a class="border hover:border-red-500 rounded py-1 px-2 bg-red-500 hover:bg-white text-white hover:text-red-500 text-xs"
                            href="/film/{{ $movie->id }}/supprimer"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer le film {{ $movie->title }} ?')">Supprimer</a>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endsection
