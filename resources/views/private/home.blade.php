@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row">
      <div class="card col-12">
          <div class="card-body">
              {{__("We have found :count pets",['count' => count($pets)])}}
          </div>
      </div>
      <div class="d-grid gap-2 p-4">
        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addNewPet">{{__("Add new")}}</button>
      </div>
      @foreach($pets as $pet)
      <div class="col">
        <div class="card mb-3" style="max-width:540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{asset($pet->photo)}}" class="card-img-top" alt="{{$pet->name}}"/>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$pet->name}}</h5>
                <p class="card-text">{{__("Race")}}: {{$pet->race->name}}</p>
                <p class="card-text"><small class="text-muted">{{$pet->birthday}}</small></p>
                <a href="{{route('pets.show', ['id' => $pet->id])}}" class="btn btn-outline-info">{{__("View more")}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <form method="POST" action="{{route('pets.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="modal fade" id="addNewPet" tabindex="-1" aria-labelledby="addNewPetLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewPetLabel">{{__("Add new pet")}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">{{__("Name")}}</label>
            <input type="text" class="form-control" id="name" name="name" />
          </div>
          <div class="mb-3">
            <label for="specie" class="form-label">{{__("Specie")}}</label>
            <select class="form-select" aria-label='{{__("Please select one specie")}}' id="specie" name="specie_id">
              <option selected>{{__("Select one option")}}</option>
              @foreach($species as $specie)
              <option value="{{$specie->id}}">{{$specie->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="race" class="form-label">{{__("Race")}}</label>
            <select class="form-select" aria-label='{{__("Please select one race")}}' id="race" name="race_id"></select>
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">{{__("Gender")}}</label>
            <select class="form-select" aria-label='{{__("Please select one gender")}}' id="gender" name="gender">
              <option selected>{{__("Select one option")}}</option>
              <option value="0">{{__("Male")}}</option>
              <option value="1">{{__("Female")}}</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="birthday" class="form-label">{{__("Date of birth")}}</label>
            <input type="date" class="form-control" id="birthday" name="birthday" />
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">{{__("Photo")}}</label>
            <input type="file" class="form-control" id="photo" name="photo" />
          </div>
          <div class="mb-3">
            <label for="code" class="form-label">{{__("Code")}}</label>
            <input type="text" class="form-control" id="code" name="code" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
          <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
        </div>
      </div>
    </div>
  </div>
  </form>
@endsection

@section('javascript')
<script>
    $( document ).ready(function() {
      var userLang = navigator.language || navigator.userLanguage;

        $("#specie").change(function(){
          let url = '/api/species/'+$('#specie').val()+'/races';

          $("#race").empty();

          $.get(url,function(data) {
            data.forEach(function(obj) {
              if(userLang.substring(0,2)=='es') {
                name = obj.name_es;
              } else {
                name = obj.name_en;
              }
              let option = new Option(name, obj.id);
              $(option).html(name);
              $("#race").append(option);
            })
          });
        })
    });
</script>
@endsection