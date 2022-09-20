@extends('ura.layouts.base')


@section('mainContent')
    @if (session('deleted'))
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {!! session('deleted') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('created') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1>Apartments</h1>
    @forelse ($apartments as $apartment)

            <table class="table table-md table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Rooms</th>
                        <th>Beds</th>
                        <th>Bathrooms</th>
                        <th>mq</th>
                        <th>Address</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>image</th>
                        <th>Services</th>
                        <th>Visible</th>

                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-id="{{ $apartment->id }}">
                        <td>{{ $apartment->id }}</td>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->description }}</td>
                        <td>{{ $apartment->price }}</td>
                        <td>{{ $apartment->rooms }}</td>
                        <td>{{ $apartment->beds }}</td>
                        <td>{{ $apartment->bathrooms }}</td>
                        <td>{{ $apartment->mq }}</td>
                        <td>{{ $apartment->address }}</td>
                        <td>{{ $apartment->latitude }}</td>
                        <td>{{ $apartment->longitude }}</td>
                        <td>{{ $apartment->image }}</td>
                        <td>
                            @foreach ($apartment->services as $service)
                                <span class="tag">{{ $service->name }}</span>
                            @endforeach
                        </td>
                        {{-- <td>{{ $apartment->services }}</td> --}}
                        <td>{{ $apartment->visible }}</td>


                        {{-- SOSTITUIRE CATEGORY CON SERVICES --}}
                        {{-- <td>
                                <a href="{{ route('admin.categories.show', ['category' => $apartment->category]) }}">
                                {{ $apartment->category->name }}
                                </a>
                            </td> --}}


                        <td>
                            <a href="{{ route('ura.apartments.show', ['apartment' => $apartment]) }}"
                                class="btn btn-primary">View</a>
                        </td>
                        <td>
                            <a href="{{ route('ura.apartments.edit', ['apartment' => $apartment]) }}"
                                class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('ura.apartments.destroy', ['apartment' => $apartment]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

    @empty
        <p>No apartments</p>
    @endforelse



    {{-- {{ $posts->links() }} --}}

    {{-- <section class="overlay d-none">
        <form class="popup" data-action="{{ route('ura.apartaments.destroy', ['apartament' => '*****']) }}" method="post">
            @csrf
            @method('DELETE')

            <h1>Sei sicuro?</h1>
            <button type="submit" class="btn btn-warning js-yes">Yes</button>
            <button type="button" class="btn btn-danger js-no">No</button>
        </form>
    </section> --}}
@endsection
