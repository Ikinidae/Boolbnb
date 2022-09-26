<?php

namespace App\Http\Controllers\Ura;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::All();
        return view('ura.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // //prende un id e restituisce un singolo modello
        // $house = House::find($id);
        // // richiamiamo l'id relativo al utente della casa
        // $user = $house->user;
        // // controllo se l'utente registrato è lo stesso utente che ha inserito la casa
        // if( Auth::id() == $user->id ){
        //     $messages = $house -> messages() -> orderBy('created_at') -> get();
        //     return view('admin.messages.show', compact('messages'));
        // } else{
        //     abort(404);
        // }

        $apartment = Apartment::find($id);

        $user = $apartment->user_id;

        $messages = $apartment -> messages() -> orderBy('created_at') -> get();

        // dd($messages);

        // $message = Message::all();

        return view('ura.messages.show', compact('messages'));


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
