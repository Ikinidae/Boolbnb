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
    protected $validation_rules = [
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
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $apartment = new Apartment();
        $user_id = Auth::user()->id;
        $request->validate($this->validation_rules);

        $data = $request->all();
        $data['user_id'] = $user_id;

        $apartment->fill($data);
        $apartment->save();
        $apartment->services()->sync($data['services']);

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
        $services = Service::all();
        // $sponsorships = Sponsorship::all();

        return view('ura.apartments.edit', [
            'services'      => $services,
            'apartment'     => $apartment
            // 'sponsorships'  => $sponsorships,
        ]);
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
        $request->validate($this->validation_rules);

        $data = $request->all();

        $apartment->update($data);
        $apartment->services()->sync($data['services']);

        return redirect()->route('ura.apartments.show', ['apartment' => $apartment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->services()->sync([]);
        $apartment->delete();

        return redirect()->route('ura.apartments.index')->with('deleted', "Il post {$apartment->title} è stato eliminato");
    }
}
