<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Specie;
use App\Models\Race;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::where('user_id','=',auth()->user()->id)->where('active','=',1)->get();
        $species = Specie::where('display','=',1)->get();

        return view('private.home', ['pets' => $pets, 'species' => $species]);
    }

    public function indexApi() {
        $pets = Pet::where('user_id','=',auth()->user()->id)->where('active','=',1)->get();
        foreach($pets as $pet) {
            $pet->age = Carbon::parse($pet->birthday)->age;
            $pet->months = Carbon::parse($pet->birthday)->month;
            $pet->race_name = $pet->race->name;
        }
        $species = Specie::where('display','=',1)->get();

        $data = [
            'pets' => $pets,
            'species' => $species,
        ];

        return response()->json([
            'status' => 'success',
            'message' => 'La solicitud se completó correctamente',
            'data' => $data
        ], Response::HTTP_OK);
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
        $pet->race_id = $request->get('race_id');
        $pet->user_id = auth()->user()->id;

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
    public function show($id)
    {
        $pet = Pet::find($id);

        $pet->age = getAge($pet->birthday);

        $vaccines = $pet->vaccines;
        $diagnoses = $pet->historial;
        $diets = [];
        $walks = [];

        return view('private.Pet.show', ['pet' => $pet, 'vaccines' => $vaccines, 'diagnostics' => $diagnoses, 'diets' => $diets, 'walks' => $walks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pet = Pet::find($id);
        $species = Specie::where('display','=',1)->get();
        $races = Race::where('display','=',1)->get();

        return view('private.Pet.edit', ['pet' => $pet, 'species' => $species, 'races' => $races]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            if (File::exists($pet->photo)) {
                File::delete('ruta/del/archivo');
            }
            $image = $request->file('photo');
            $store_path = 'upload/pets';
            $name = md5(uniqid(rand(), true)) . str_replace(' ', '-', $image->getClientOriginalName());
            $image->move(public_path('/' . $store_path), $name);
            $pet->photo = $store_path.'/'.$name;
        }

        if($request->get('name') != $pet->name) {
            $pet->name = $request->get('name');
        }
        if($request->get('gender') != $pet->gender) {
            $pet->gender = $request->get('gender');
        }
        if($request->get('birthday') != $pet->birthday) {
            $pet->birthday = $request->get('birthday');
        }
        if($request->get('code') != $pet->code) {
            $pet->code = $request->get('code');
        }
        if($request->get('race') != $pet->race) {
            $pet->race = $request->get('race');
        }

        $pet->save();

        return redirect()->route('pets.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);

        $pet->active = 0;

        $pet->save();

        return redirect()->route('home');
    }
}
