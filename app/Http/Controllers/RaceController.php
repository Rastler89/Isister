<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Specie;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $race = Race::sortable()->paginate(10);
        return view('dashboard.race.index', ['races' => $race]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = Specie::all();
        return view('dashboard.race.create', ['species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required'],
            'specie_id' => ['required']
        ]);

        $race = new Race();
        $race->name_en = $request->get('name_en');
        $race->name_es = $request->get('name_es');
        $race->specie_id = $request->get('specie_id');
        $race->display = $request->get('display');

        $race->save();

        return redirect()->route('races.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $race = Race::find($id);
        $species = Specie::all();

        return view('dashboard.Race.edit', ['species' => $species, 'race' => $race]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $race = Race::find($id);
        $species = Specie::all();

        return view('dashboard.Race.edit', ['species' => $species, 'race' => $race]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Race $race)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required'],
            'specie_id' => ['required']
        ]);

        $race = Race::find($id);
        if($race->name_en != $request->get('name_en')) {
            $race->name_en = $request->get('name_en');
        }
        if($race->name_es != $request->get('name_es')) {
            $race->name_es = $request->get('name_es');
        }
        if($race->specie_id != $request->get('specie_id')) {
            $race->specie_id = $request->get('specie_id');
        }
        $race->display = $request->get('display')=='on';
        $race->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //
    }
}
