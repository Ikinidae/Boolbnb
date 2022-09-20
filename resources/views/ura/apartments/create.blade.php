@extends('ura.layouts.base')

@section('mainContent')

    <h1>Add new apartment</h1>

    <div>

        <form action="{{ route('ura.apartments.store') }}" id="form" method="post" novalidate enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label" for="title">Title *</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label" for="description">Description *</label>
                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label class="form-label" for="price">Price*</label>
                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Rooms --}}
            <div class="mb-3">
                <label class="form-label" for="rooms">Rooms*</label>
                <input class="form-control @error('rooms') is-invalid @enderror" type="text" name="rooms" id="rooms" value="{{ old('rooms') }}">
                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Beds --}}
            <div class="mb-3">
                <label class="form-label" for="beds">Beds*</label>
                <input class="form-control @error('beds') is-invalid @enderror" type="text" name="beds" id="beds" value="{{ old('beds') }}">
                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Bathrooms --}}
            <div class="mb-3">
                <label class="form-label" for="bathrooms">Bathrooms*</label>
                <input class="form-control @error('bathrooms') is-invalid @enderror" type="text" name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}">
                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Mq --}}
            <div class="mb-3">
                <label class="form-label" for="mq">mq*</label>
                <input class="form-control @error('mq') is-invalid @enderror" type="text" name="mq" id="mq" value="{{ old('mq') }}">
                @error('mq')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Managed from Vue --}}
            <div id="root">
                {{-- Non serve ma lo abbiamo lasciato per chiarezza nostra --}}
                <find-address></find-address>
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label class="form-label" for="image">Image*</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Preview img --}}
                <img id="preview" class="img-fluid" src="">
            </div>

            {{-- Visible --}}
            <div class="mb-3">
                <div>
                    <label for="visible">Visible*</label>
                </div>
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
                            class="form-check-input @error('services') is-invalid @enderror @error('services') is-invalid @enderror"
                            type="checkbox"
                            name="services[]"
                            value="{{ $service->id }}"
                            id="service-{{ $service->id }}"
                            @if(in_array($service->id, old('services') ?: [])) checked @endif
                        >
                        <label class="form-check-label" for="service-{{ $service->id }}">{{ $service->name }}</label>
                    </div>
                @endforeach

                @error('services')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </fieldset>

            {{-- Save Button --}}
            <button id="submit" type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="{{ asset('js/findAddress.js') }}" defer></script>
@endsection


