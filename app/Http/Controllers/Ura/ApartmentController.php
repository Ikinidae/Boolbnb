<?php

namespace App\Http\Controllers\Ura;

use App\Models\Service;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{

    protected $validation_rules = [
        'user_id'       => 'required|numeric|exists:user_id|unique:users',
        'title'         => 'required|text|max:100',
        'description'   => 'required|text|max:1000',
        'price'         => 'required|numeric',
        'rooms'         => 'required|numeric',
        'beds'          => 'required|numeric',
        'bathrooms'     => 'required|numeric',
        'mq'            => 'required|numeric',
        'address'       => 'required|string|max:255',
        'latitude'      => 'required|numeric',
        'longitude'     => 'required|numeric',
        'image'         => 'required|string|max:255',
        'visible'       => 'required|boolean'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::id() != $apartment->user_id) abort(401);
        $apartments = Apartment::All();

        return view('ura.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $sponsorships = Sponsorship::all();

        return view('ura.apartments.create', [
            'services'    => $services,
            'sponsorships'          => $sponsorships,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate($this->validation_rules);

        // $request->validate([
        //     'user_id' => 'required|numeric|exists:users_id|unique:users',
        //     'title'   => 'required|text|max:100',
        //     'description' => 'required|text|max:1000',
        //     'price' => 'required|numeric',
        //     'rooms' => 'required|numeric',
        //     'beds' => 'required|numeric',
        //     'bathrooms' => 'required|numeric',
        //     'mq' => 'required|numeric',
        //     'address' => 'required|string|max:255',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'image' => 'required|string|max:255',
        //     'visible' => 'required|boolean'

        // ]);
        // $this->validation_rules['user_id'][] = 'unique:users';

        $data = $request->all();

        $data = $data + [
            'user_id'       => Auth::id(),
        ];

        $apartment = Apartment::create($data);
        $apartment->services()->sync($data['services']);

        return redirect()->route('ura.apartments.show', ['apartment' => $apartment]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('ura.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
