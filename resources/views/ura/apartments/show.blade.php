@extends('ura.layouts.base')

@section('mainContent')
    <div class="vw-100">
        <h1>{{ $apartment->title }}</h1>
        <img class="w-75" src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->title }}">
        <h3>Price: {{ $apartment->price }}€ per night</h3>
        <h3>Rooms: {{ $apartment->rooms }}</h3>
        <h3>Beds: {{ $apartment->beds }}</h3>
        <h3>Bathrooms: {{ $apartment->bathrooms }}</h3>
        <h3>Mq: {{ $apartment->mq }}</h3>
        <h3>Address: {{ $apartment->address }}</h3>
        <p>{{ $apartment->description }}</p>

        @foreach ($apartment->services as $service)
            <span class="tag">{{ $service->name }}</span>
        @endforeach
    </div>

    {{-- <div>
        @foreach ($message as $message)
        <h5>{{$message->text}}</h5>

        @endforeach
    </div> --}}

    {{-- <div>

        <a  class="nav-link" href=" {{route('ura.messages.show', ['message' => $apartment->id] )}}">
            Show Messages
        </a>

    </div> --}}


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

@endsection
