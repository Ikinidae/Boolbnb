<?php

namespace App\Http\Controllers\Ura;

use App\Models\Service;
use App\Models\Apartment;
use App\Models\Sponsorship;
// use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{


        // 'user_id'       => 'required|numeric|exists:user_id|unique:users',
        // 'title'         => 'required|string|max:100',
        // 'description'   => 'required|string|max:1000',
        // 'price'         => 'required|numeric',
        // 'rooms'         => 'required|numeric',
        // 'beds'          => 'required|numeric',
        // 'bathrooms'     => 'required|numeric',
        // 'mq'            => 'required|numeric',
        // 'address'       => 'required|string|max:255',
        // 'latitude'      => 'required|numeric',
        // 'longitude'     => 'required|numeric',
        // 'image'         => 'required|string|max:255',
        // 'visible'       => 'required|boolean',


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function apartments()
    // {
    //     return $this->hasMany(Apartment::class);
    // }

    public function index()
    {
        // if (Auth::id() != $apartment->user_id) abort(401);
        $apartments = Apartment::All()->where('user_id', auth()->user()->id);

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
        // $sponsorships = Sponsorship::all();

        return view('ura.apartments.create', [
            'services'      => $services,
            // 'sponsorships'  => $sponsorships,
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

        // NOSTRO STORE

        $apartment = new Apartment();
        $user_id = Auth::user()->id;


        $request->validate([
            'title'         => 'required|string|max:100',
            'description'   => 'required|string|max:1000',
            'price'         => 'required|numeric|integer',
            'rooms'         => 'required|numeric|integer',
            'beds'          => 'required|numeric|integer',
            'bathrooms'     => 'required|numeric|integer',
            'mq'            => 'required|numeric|integer',
            'address'       => 'required|string|max:255',
            'latitude'      => 'required|numeric|integer',
            'longitude'     => 'required|numeric|integer',
            'image'         => 'required|string|max:255',
            'visible'       => 'boolean',

        ]);

        $data = $request->all();
        $data['user_id'] = $user_id;


        $apartment->fill($data);

        $apartment->save();

        $apartment->services()->sync($data['services']);



        // STORE HENRY

        // $data = $request->all();

        // $data = $data + [
        //     'user_id'       => Auth::id(),
        // ];

        // dd($data);
        // $apartment = Apartment::create($data);
        // $apartment->services()->sync($data['services']);



        // dd( $apartment);

        return redirect()->route('ura.apartments.index');

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
