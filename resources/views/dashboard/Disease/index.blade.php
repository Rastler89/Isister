@extends('layouts.dashboard')

@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{__("Enfermedades")}}</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">						    
                        <a class="btn btn-primary text-white" href="{{route('diseases.create')}}">
                            {{__("Nueva")}}
                        </a>
                    </div>
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__("Nombre español")}}</th>
                <th scope="col">{{__("Nombre inglés")}}</th>
                <th scope="col">{{__("Especie")}}</th>
                <th scope="col">{{__("Mostrar")}}</th>
                <th scope="col">{{__("Acción")}}</th>
        </thead>
        <tbody>
            @foreach($diseases as $disease)
            <tr>
                <th scope="row">{{$disease->id}}</th>
                <td>{{$disease->name_es}}</td>
                <td>{{$disease->name_en}}</td>
                <td>
                    @foreach($disease->species as $specie)
                    {{$specie->name}}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    @if($disease->display)
                    {{__("Sí")}}
                    @else
                    {{__("No")}}
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline-warning" href="{{route('diseases.edit',['id' => $disease->id])}}">{{__("Editar")}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$diseases->links()}}
@endsection