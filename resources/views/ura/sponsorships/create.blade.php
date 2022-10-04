@extends('ura.layouts.base')

@section('mainContent')
    <div>
        <h2>Would you like to add a sponsorship to one of your apartments?</h2>

        <form action="{{ route('ura.sponsorships.store') }}" id="form" method="post" novalidate
            enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-around flex-wrap">

                {{-- choose apartment --}}
                <div class="m-2">
                    <fieldset class="mb-3">
                        <legend>Choose your apartment</legend>
                        @foreach ($apartments as $apartment)
                            <div class="form-check">

                                <input
                                    class="form-check-input @error('apartments') is-invalid @enderror @error('apartments') is-invalid @enderror"
                                    type="radio" name="apartments[]" value="{{ $apartment->id }}"
                                    id="apartment-{{ $apartment->id }}" @if (in_array($apartment->id, old('apartments') ?: [])) checked @endif>
                                <label class="form-check-label card_apartment" for="apartment-{{ $apartment->id }}">
                                    <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                                        <div class="card-header fs-5">{{ $apartment->title }}</div>
                                        <div class="card-body">
                                            <p class="card-text">Address: {{ $apartment->address }} </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach

                        @error('apartments')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                </div>

                {{-- choose sponsorship --}}
                <div class="m-2">
                    <fieldset class="mb-3">
                        <legend>Choose your sponsorship</legend>
                        @foreach ($sponsorships as $sponsorship)
                            <div class="form-check">

                                <input
                                    class="form-check-input @error('sponsorships') is-invalid @enderror @error('sponsorships') is-invalid @enderror"
                                    type="radio" name="sponsorships[]" value="{{ $sponsorship->id }}"
                                    id="sponsorship-{{ $sponsorship->id }}"
                                    @if (in_array($sponsorship->id, old('sponsorships') ?: [])) checked @endif>
                                <label class="form-check-label card_sponsorship" for="sponsorship-{{ $sponsorship->id }}">
                                    <div class="card text-black bg-info mb-3" style="max-width: 18rem;">
                                        <div class="card-header fs-5">{{ $sponsorship->name }}</div>
                                        <div class="card-body">
                                            <p class="card-text">Duration: {{ $sponsorship->duration }} hours</p>
                                            <p class="card-text">Price: € {{ $sponsorship->price }}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach

                        @error('sponsorships')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                </div>
            </div>

            {{-- Save Button --}}
            <button id="submit" type="submit" class="btn btn-primary">Save</button>
        </form>


    </div>
@endsection
