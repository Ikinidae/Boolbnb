@extends('ura.layouts.base')

@section('mainContent')
    <div class="vw-100">
        <h1>Messages</h1>

        @foreach ($messages as $message)
        <h5>{{$message->text}}</h5><br>
        <h5>{{$message->email}}</h5><br>
        <h5>{{$message->name}}</h5><br><br>
        @endforeach

    </div>

@endsection
