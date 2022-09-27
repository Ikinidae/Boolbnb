@extends('ura.layouts.base')

@section('mainContent')
    <div class="vw-100">
        <h1>Messages</h1><br>

        @foreach ($messages as $message)

            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$message->created_at}}</div>
                <div class="card-body">
                <h5 class="card-title">Name: {{$message->name}}</h5>
                <p class="card-text">{{$message->text}}</p>
                <p class="card-text">{{$message->email}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
