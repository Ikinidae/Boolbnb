@extends('ura.layouts.base')

@section('mainContent')

    <h1>Add new apartment</h1>

    <form action="{{ route('ura.apartments.store') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label class="form-label" for="users_id">Users_id</label>
            <input class="form-control @error('users_id') is-invalid @enderror" type="text" name="users_id" id="users_id" value="{{ old('users_id') }}">
            @error('users_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rooms">Rooms</label>
            <input class="form-control @error('rooms') is-invalid @enderror" type="text" name="rooms" id="rooms" value="{{ old('rooms') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('rooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="beds">Beds</label>
            <input class="form-control @error('beds') is-invalid @enderror" type="text" name="beds" id="beds" value="{{ old('beds') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('beds')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="bathrooms">Bathrooms</label>
            <input class="form-control @error('bathrooms') is-invalid @enderror" type="text" name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('bathrooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="mq">mq</label>
            <input class="form-control @error('mq') is-invalid @enderror" type="text" name="mq" id="mq" value="{{ old('mq') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('mq')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">Address</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="latitude">Latitude</label>
            <input class="form-control @error('latitude') is-invalid @enderror" type="text" name="latitude" id="latitude" value="{{ old('latitude') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('latitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="longitude">Longitude</label>
            <input class="form-control @error('longitude') is-invalid @enderror" type="text" name="longitude" id="longitude" value="{{ old('longitude') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('longitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="text" name="image" id="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <img id="preview" class="img-fluid" src="">
        </div>

        <div class="mb-3">
            <label class="form-label" for="visible">Visible</label>
            <input class="form-control @error('visible') is-invalid @enderror" type="text" name="visible" id="visible" value="{{ old('visible') }}">
            {{-- <button type="button" class="btn btn-primary">Reset</button> --}}
            @error('visible')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {{-- DA SISTEMARE IL CHECKBOX DELLA VISIBLE --}}
        <fieldset class="mb-3">
            <legend>Services</legend>
            @foreach ($services as $service)
                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="services[]"
                        value="{{ $service->id }}"
                        id="service-{{ $service->id }}"
                        @if(in_array($service->id, old('services') ?: [])) checked @endif
                    >
                    <label class="form-check-label" for="service-{{ $service->id }}">{{ $service->name }}</label>
                </div>
            @endforeach

            @foreach ($errors->get('services.*') as $messages)
                @foreach ($messages as $message)
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @endforeach
            @endforeach
        </fieldset>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
