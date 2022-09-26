<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Service;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        $services = Service::all();
        return response()->json($services);
    }
    public function users()
    {

        // $id = Auth::id();
        // $user = DB::table('users')->find($id);
        // dd('dd dell id',$user);

        $users = User::all()->where('id',$id);
        if($users){
            return response()->json([
                "success" => true,
                "result" => $users

            ]);
        } else{
            return response()->json([
                "success" => false,

            ]);
        }
    }

    public function getApartments(Request $request) {
        $data = Apartment::with('services')->where('address', 'LIKE','%'. $request->keyword .'%')->get();
        return response()->json($data);
    }

    public function radiusSearch($radius, $lat, $lon)
    {
        // $allApartments = DB::table('apartments')
        //     ->where('is_visible', '=', true)
        //     // ->services()
        //     ->get();
        // crea una variabile con apartment e la tabella servizi
        // $allApartments = Apartment::with('service')->get();
        $allApartments = Apartment::with('services')->get();

        // crea un array vuoto
        $apartments = [];

        // salva in due variabili lat e lon convertita in radianti
        $lat2 = deg2rad($lat);
        $lon2 = deg2rad($lon);

        // foreach di tutti gli appartamenti
        foreach ($allApartments as $apartment) {

            // converte lat e long dell'appartamento ciclato
            $lat1 = deg2rad($apartment->latitude);
            $lon1 = deg2rad($apartment->longitude);

            // differenza tra coordinate richieste e quelle del singolo appartamento
            $deltaLat = $lat2 - $lat1;
            $deltaLon = $lon2 - $lon1;

            //
            $val = pow(sin($deltaLat / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($deltaLon / 2), 2);
            $res = 2 * asin(sqrt($val));

            //
            $radiusEarth = 6371;
            $distance = $radiusEarth * $res;

            // pusha in array se minore del raggio passato
            if ($distance <= $radius) {
                array_push($apartments, $apartment);
            }
        }
        return response()->json($apartments);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::with('services')->where('id', $id)->first();

        if($apartment){
            return response()->json([
                "success" => true,
                "result" => $apartment

            ]);
        } else{
            return response()->json([
                "success" => false,

            ]);
        }
    }



}
