@extends('ura.layouts.base')

@section('mainContent')

    <h1>Edit the apartment</h1>

    <form action="{{ route('ura.apartments.update', ['apartment' => $apartment]) }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        @method('put')


        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $apartment->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $apartment->description) }}">

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $apartment->price) }}">

            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Rooms --}}
        <div class="mb-3">
            <label class="form-label" for="rooms">Rooms</label>
            <input class="form-control @error('rooms') is-invalid @enderror" type="text" name="rooms" id="rooms" value="{{ old('rooms', $apartment->rooms) }}">

            @error('rooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

         {{-- Beds --}}
        <div class="mb-3">
            <label class="form-label" for="beds">Beds</label>
            <input class="form-control @error('beds') is-invalid @enderror" type="text" name="beds" id="beds" value="{{ old('beds', $apartment->beds) }}">

            @error('beds')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

         {{-- Bathrooms --}}
        <div class="mb-3">
            <label class="form-label" for="bathrooms">Bathrooms</label>
            <input class="form-control @error('bathrooms') is-invalid @enderror" type="text" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}">

            @error('bathrooms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

         {{-- Mq --}}
        <div class="mb-3">
            <label class="form-label" for="mq">mq</label>
            <input class="form-control @error('mq') is-invalid @enderror" type="text" name="mq" id="mq" value="{{ old('mq', $apartment->mq) }}">

            @error('mq')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {{-- Address --}}
        <div id="root">
            <find-address></find-address>
        </div>



         {{-- Image --}}
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input class="form-control mb-3 @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*" value="{{ asset('storage/' . $apartment ->image) }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <img id="preview" class="img-fluid" src="{{ asset('storage/' . $apartment ->image) }}">
        </div>


         {{-- Visible --}}
        <div class="mb-3">
            <div>
                <label for="visible">Visible</label>
            </div>
            <div>
                <div class="form-check">
                    <input class="form-check-input @error('flexRadioDefault1') is-invalid @enderror" type="radio" name="visible" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('flexRadioDefault2') is-invalid @enderror" type="radio" name="visible" id="flexRadioDefault2" value="0" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      No
                    </label>
                </div>
            </div>
            @error('visible')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


         {{-- Services --}}
        <fieldset class="mb-3">
            <legend>Services</legend>
            <p>*Insert at least one service</p>
            @foreach ($services as $service)
                <div class="form-check">

                    <input
                        class="form-check-input @error('services') is-invalid @enderror"
                        type="checkbox"
                        name="services[]"
                        value="{{ $service->id }}"
                        id="service-{{ $service->id }}"
                        @if(in_array($service->id, old('services', $apartment->services->pluck('id')->all()) ?: [])) checked @endif
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
<script src="{{ asset('js/vue.js') }}" defer></script>
@endsection

