<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Specie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pets = Pet::where('user_id','=',auth()->user()->id)->get();
        $species = Specie::where('display','=',1)->get();

        return view('private.home', ['pets' => $pets, 'species' => $species]);
    }
}
