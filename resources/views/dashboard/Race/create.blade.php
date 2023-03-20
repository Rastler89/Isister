@extends('layouts.dashboard')

@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{__("Crear nueva raza")}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('races.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="name_en">{{__("Nombre ingles")}}</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Name" />
                        </div>
                        <div class="mb-3">
                            <label for="name_es">{{__("Nombre español")}}</label>
                            <input type="text" class="form-control" id="name_es" name="name_es" placeholder="Nombre" />
                        </div>
                        <div class="mb-3">
                            <label for="specie_id" class="form-label">{{__("Especie")}}</label>
                            <input class="form-control" list="specieList" id="specie_id" name="specie_id" />
                            <datalist id="specieList">
                                @foreach($species as $specie)
                                <option value="{{$specie->id}}">{{$specie->id}} - {{$specie->name}}</option>
                                @endforeach
                            </datalist>
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