@extends('ura.layouts.base')

@section('mainContent')
    <h1>{{ $apartment->title }}</h1>

    {{-- Opzione 1 immagine di default --}}
    {{-- <img class="img-fluid" src="{{ asset($apartment->image ? 'storage/' . $apartment->image : 'img/fallback.png') }}" alt="{{ $apartment->title }}"> --}}

    {{-- Opzione 2 no immagine --}}
    {{-- @if ($apartment->image)
        <img class="img-fluid" src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}">
    @endif --}}

    {{-- <h3>In category: {{ $apartment->category->name }}</h3>
    <div class="tags">
        @foreach ($apartment->tags as $tag)
            <span class="tag">{{ $tag->name }}</span>
        @endforeach
    </div> --}}
    <p>{{ $apartment->description }}</p>
@endsection
