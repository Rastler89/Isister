@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
        <div class="card-body text-center">
            <img src="{{asset($pet->photo)}}" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$pet->name}}</h5>
            <p class="text-muted mb-1">{{$pet->race->name}}</p>
            <p class="text-muted mb-1">{{$pet->age}} {{__('years')}} - @if($pet->gender == 0) {{__('Male')}} @else {{__('Female')}} @endif</p>
            <p class="text-muted mb-4">{{__('Code')}}: <strong>{{$pet->code}}</strong></p>
            <div class="d-flex justify-content-center mb-2">
                <div class="btn-group" role="group" aria-label="Options">
                    <a href="{{route('pets.edit', ['id' => $pet->id])}}" class="btn btn-outline-warning">{{__('Editar')}}</a>
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmPet">{{__('Dar de baja')}}</button>
                </div>
            </div>
        </div>
        </div>
        <div class="card mb-4 mb-lg-0">
            <!-- actions -->
            <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item text-center p-3">
                    <h5>{{__("Vaccines")}}</h5>
                    <p class="mb-0 btn-group" style="text-align:center" role="group" aria-label="">
                        <a class="btn btn-primary" href="{{route('vaccines.create', ['id' => $pet->id])}}">{{__("Add")}}</a>
                    </p>
                </li>
                <li class="list-group-item text-center p-3">
                    <h5>{{__("Historial")}}</h5>
                    <p class="mb-0 btn-group" style="text-align:center" role="group" aria-label="">
                        <a class="btn btn-primary" href="{{route('diagnostics.create', ['id' => $pet->id])}}">{{__("Add")}}</a>
                    </p>
                </li>
                <li class="list-group-item text-center p-3">
                    <h5>{{__("Diets")}}</h5>
                    <p class="mb-0 btn-group" style="text-align:center" role="group" aria-label="">
                        <a class="btn btn-primary" href="">{{__("Add")}}</a>
                    </p>
                </li>
                <li class="list-group-item text-center p-3">
                    <h5>{{__("Walks")}}</h5>
                    <p class="mb-0 btn-group" style="text-align:center" role="group" aria-label="">
                        <a class="btn btn-primary" href="">{{__("Add")}}</a>
                    </p>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8" id="showData">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{__("Remembers")}}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" @if(count($vaccines)==0) disabled @endif>{{__("Vaccines")}}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" @if(count($diagnostics)==0) disabled @endif>{{__("Historial")}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="diet-tab" data-bs-toggle="tab" data-bs-target="#diet-tab-panel" type="button" role="tab" aria-controls="diet-tab-panel" aria-selected="false" @if(count($diets)==0) disabled @endif>{{__("Diets")}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="walk-tab" data-bs-toggle="tab" data-bs-target="#walk-tab-panel" type="button" role="tab" aria-controls="walk-tab-panel" aria-selected="false" @if(count($walks)==0) disabled @endif>{{__("Walks")}}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                </p>
                                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                @if(count($vaccines)!=0)
                    @foreach($vaccines as $vaccine)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$vaccine->name}}</h5>
                            <p class="card-text">{{$vaccine->batch}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>{{__("Date of vaccination")}}:</strong> {{$vaccine->init}}</li>
                            <li class="list-group-item"><strong>{{__("Next dose")}}:<strong> {{$vaccine->next}}</li>
                        </ul>
                    </div>
                    @endforeach
                @endif
            </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">3</div>
        <div class="tab-pane fade" id="diet-tab-panel" role="tabpanel" aria-labelledby="diet-tab" tabindex="0">diet</div>
        <div class="tab-pane fade" id="walk-tab-panel" role="tabpanel" aria-labelledby="walk-tab" tabindex="0">walk</div>
        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">4</div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('pets.delete', ['id' => $pet->id])}}">
    @csrf
    @method("DELETE")
<div class="modal fade" id="confirmPet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">{{__("Dar de baja")}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-danger">{{__("Estas seguro de dar de baja a esta mascota?")}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("No")}}</button>
          <button class="btn btn-danger">{{__("Si")}}</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection

@section('javascript')

@endsection