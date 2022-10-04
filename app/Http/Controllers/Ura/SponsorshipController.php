<?php

namespace App\Http\Controllers\Ura;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorshipController extends Controller
{
    public function index()
    {
        // $apartments = Apartment::All()->where('user_id', auth()->user()->id);
        $sponsorships = Sponsorship::All();
        return view('ura.sponsorships.index', compact('sponsorships'));
    }
}
