@extends('layouts.dashboard')

@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{__("Crear nueva enfermedad")}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('diseases.update', ['id' => $disease->id])}}">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="name_en">{{__("Nombre ingles")}}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Name" value="{{$disease->name_en}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="name_es">{{__("Nombre español")}}</label>
                            <input type="text" class="form-control" id="name_es" name="name_es" placeholder="Nombre" value="{{$disease->name_es}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="description_en" class="form-label">{{__("Descripción ingles")}}</label>
                            <textarea class="form-control" id="description_en" name="description_en" rows="3">{{$disease->description_en}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description_es" class="form-label">{{__("Descripción español")}}</label>
                            <textarea class="form-control" id="description_es" name="description_es" rows="3">{{$disease->description_es}}</textarea>
                        </div>
                        <div class="mb-3">
                            @foreach($species as $specie)
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{$specie->name}}" value="{{$specie->id}}" name="species[]" @if(in_array($specie->id, $disease_species)) checked @endif/>
                            <label class="form-check-label" for="{{$specie->name}}">{{$specie->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="display" name="display">
                            <label class="form-check-label" for="display">{{__("Mostrar")}}</label>
                        </div>                    
                        <div class="float-end">
                            <button class="btn btn-primary text-white">{{__("Crear")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection