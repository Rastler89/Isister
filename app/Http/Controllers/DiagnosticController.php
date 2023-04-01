<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Surgery;
use App\Models\Medication;
use App\Models\Pet;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
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

        return view('private.Diagnostic.create', ['pet'=>$pet, 'diseases'=>$pet->race->specie->diseases]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        //montar un validador
        $diagnostic = new Diagnostic();

        $diagnostic->pet_id = $id;
        $diagnostic->title = $request->get('name');
        $diagnostic->description = $request->get('description');
        $diagnostic->init = $request->get('init');
        if($request->get('in_process')!='on') {
            $diagnostic->finish = $request->get('finish');
        }
        $diagnostic->save();


        if($request->get('surgery')!='no') {
            foreach($request->get('surgery_name') as $key => $value) {
                $surgery = new Surgery();
                $surgery->name = $request->get('surgery_name')[$key];
                $surgery->description = $request->get('surgery_description')[$key];
                $surgery->date = $request->get('surgery_date')[$key];

                $diagnostic->surgeries()->save($surgery);
            }
        }
        if($request->get('treatment')!='no') {
            foreach($request->get('treatment_name') as $key => $value) {
                $medication = new Medication();
                $medication->name = $request->get('treatment_name')[$key];
                $medication->init = $request->get('treatment_init')[$key];
                $medication->finish = $request->get('treatment_finish')[$key];
                $medication->periodicity = $request->get('treatment_periodicity')[$key];
                $medication->periodicity_type = $request->get('treatment_periodicity_type')[$key];

                $diagnostic->medications()->save($medication);
            }
        }

        return redirect()->route('pets.show',['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnostic $diagnostic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnostic $diagnostic)
    {
        //
    }
}
