<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Disease;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $pet = Pet::find($id);

        $specie = Specie::find($pet->race->specie_id);

        $diseases = $specie->diseases;

        return view('private.Vaccine.create', ['pet'=>$pet, 'diseases'=>$diseases]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $vaccine = new Vaccine();

        $vaccine->name = $request->get('name');
        $vaccine->batch = $request->get('batch');
        $vaccine->init = $request->get('init');
        $vaccine->next = $request->get('next');
        $vaccine->pet_id = $id;

        $vaccine->save();

        $vaccine->diseases()->attach($request->get('diseases'));

        return redirect()->route('home');
    }

    public function getAllByPet($id) {
        $vaccines = Vaccine::where('pet','=',$id)->get();

        return response()->json($vaccines);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccine $vaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaccine $vaccine)
    {
        //
    }
}
