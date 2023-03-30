<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
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
        if($request->get('surgery')!='no') {
            foreach($request->get('surgery_name') as $key => $value) {
                print_r($request->get('surgery_name')[$key].' - '.$request->get('surgery_description')[$key]);echo"<br>";
            }
        }
        if($request->get('treatment')!='no') {
            $diagnostic->treatment='yes';
        }

        echo"<pre>";print_r($diagnostic);echo"</pre>";
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
