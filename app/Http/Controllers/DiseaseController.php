<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Specie;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diseases = Disease::sortable()->paginate(10);
        return view('dashboard.Disease.index', ['diseases' => $diseases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = Specie::where('display','=',1)->get();
        return view('dashboard.Disease.create', ['species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required'],
            'species' => ['required']
        ]);

        $disease = new Disease();
        if($disease->name_en != $request->get('name_en')) {
            $disease->name_en = $request->get('name_en');
        }
        if($disease->name_es != $request->get('name_es')) {
            $disease->name_es = $request->get('name_es');
        }
        if($disease->description_en != $request->get('description_en')) {
            $disease->description_en = $request->get('description_en');
        }
        if($disease->description_es != $request->get('description_es')) {
            $disease->description_es = $request->get('description_es');
        }
        $disease->display = $request->get('display')=='on';
        $disease->save();

        $disease->species()->attach($request->get('species'));

        return redirect()->route('diseases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $species = Specie::where('display','=',1)->get();
        $disease = Disease::find($id);
        
        return view('dashboard.Disease.edit', ['disease' => $disease, 'species' => $species]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $species = Specie::where('display','=',1)->get();
        $disease = Disease::find($id);
        foreach($disease->species as $spec) {
            $disease_species[] = $spec->id;
        }
        return view('dashboard.Disease.edit', ['disease' => $disease, 'species' => $species, 'disease_species' => $disease_species]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required'],
            'species' => ['required']
        ]);

        $disease = Disease::find($id);
        if($disease->name_en != $request->get('name_en')) {
            $disease->name_en = $request->get('name_en');
        }
        if($disease->name_es != $request->get('name_es')) {
            $disease->name_es = $request->get('name_es');
        }
        if($disease->description_en != $request->get('description_en')) {
            $disease->description_en = $request->get('description_en');
        }
        if($disease->description_es != $request->get('description_es')) {
            $disease->description_es = $request->get('description_es');
        }
        $disease->display = $request->get('display')=='on';
        $disease->save();

        $disease->species()->attach($request->get('species'));

        return redirect()->route('diseases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)
    {
        //
    }
}
