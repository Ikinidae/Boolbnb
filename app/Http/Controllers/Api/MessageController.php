<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function store(Request $request){

        $data = $request->all();
        $apartment_id = $data['apartment_id'];
        $name = $data['name'];
        $surname = $data['surname'];
        $text = $data['text'];
        $email = $data['email'];

        $message = new Message;
        $message->apartment_id = $apartment_id;
        $message->text = $text;
        $message->email = $email;
        $message->name = $name;
        $message->surname = $surname;
        $message->save();

        return response()->json([
            'success'   => true
        ]);
    }
}
