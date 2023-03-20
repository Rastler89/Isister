<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $specie = Specie::sortable()->paginate(10);
        
        return view('dashboard.Specie.index', ['species' => $specie]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Specie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required'],
        ]);

        $specie = new Specie();
        $specie->name_en = $request->get('name_en');
        $specie->name_es = $request->get('name_es');
        $specie->display = $request->get('display');

        $specie->save();

        return redirect()->route('species.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specie = Specie::find($id);

        return view('dashboard.Specie.edit', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_en' => ['required'],
            'name_es' => ['required']
        ]);

        $specie = Specie::find($id);
        if($specie->name_en != $request->get('name_en')) {
            $specie->name_en = $request->get('name_en');
        }
        if($specie->name_es != $request->get('name_es')) {
            $specie->name_es = $request->get('name_es');
        }
        $specie->display = $request->get('display')=='on';
        $specie->save();

        return redirect()->route('species.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie)
    {
        //
    }
}
