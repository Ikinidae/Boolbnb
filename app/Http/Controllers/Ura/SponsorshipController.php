<?php

namespace App\Http\Controllers\Ura;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apartments = Apartment::All()->where('user_id', auth()->user()->id);
        // $sponsorships = Sponsorship::All();
        // return view('ura.sponsorships.index', [
        //     'apartments'      => $apartments,
        //     'sponsorships'  => $sponsorships,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::All()->where('user_id', auth()->user()->id);
        $sponsorships = Sponsorship::All();
        return view('ura.sponsorships.create', [
            'apartments'      => $apartments,
            'sponsorships'  => $sponsorships,
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
        // dd($request->all());
        $apartment = Apartment::find($request->apartments);
        $apartment_id = $request->apartments;
        $sponsorship_id = $request->sponsorships;
        $attach_data[1] = [
            'apartment_id' => $apartment_id,
            'sponsorship_id' => $sponsorship_id,
        ];
        $duck = Sponsorship::all();
        dd($duck);
        $apartment->sponsorships()->attach($attach_data);
        return response()->json([
            'success' => true,
            'message' => "Transazione eseguita con Successo!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
