<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::where('user_id','=',auth()->user()->id)->get();
        $species = Specie::all();

        return view('private.home', ['pets' => $pets, 'species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->get('name');
        $pet->gender = $request->get('gender');
        $pet->birthday = $request->get('birthday');
        $pet->code = $request->get('code');
        $pet->race = $request->get('race');
        $pet->owner = auth()->user()->id;

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $store_path = 'upload/pets';
            $name = md5(uniqid(rand(), true)) . str_replace(' ', '-', $image->getClientOriginalName());
            $image->move(public_path('/' . $store_path), $name);
            $pet->photo = $store_path.'/'.$name;
        }

        $pet->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
