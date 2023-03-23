@extends('layouts.app')

@section('content')
<div class="row pt-4">
  <form method="POST" action="{{route('pets.update',['id' => $pet->id])}}" enctype="multipart/form-data">
    <div class="col-md-8 mx-auto">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">{{__("Name")}}</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$pet->name}}" />
      </div>
      <div class="mb-3">
          <label for="specie" class="form-label">{{__("Specie")}}</label>
          <select class="form-select" aria-label='{{__("Please select one specie")}}' id="specie" name="specie_id">
            <option selected>{{__("Select one option")}}</option>
            @foreach($species as $specie)
            <option value="{{$specie->id}}" @if($specie->id == $pet->race->specie_id) selected @endif>{{$specie->name}}</option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label for="race" class="form-label">{{__("Race")}}</label>
          <select class="form-select" aria-label='{{__("Please select one race")}}' id="race" name="race_id">
            <option selected>{{__("Select one option")}}</option>
            @foreach($races as $race)
            <option value="{{$race->id}}" @if($race->id == $pet->race->id) selected @endif>{{$race->name}}</option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
          <label for="gender" class="form-label">{{__("Gender")}}</label>
          <select class="form-select" aria-label='{{__("Please select one gender")}}' id="gender" name="gender">
            <option selected>{{__("Select one option")}}</option>
            <option value="0" @if($pet->gender == 0) selected @endif>{{__("Male")}}</option>
            <option value="1" @if($pet->gender == 1) selected @endif>{{__("Female")}}</option>
          </select>
      </div>
      <div class="mb-3">
          <label for="birthday" class="form-label">{{__("Date of birth")}}</label>
          <input type="date" class="form-control" id="birthday" name="birthday" value="{{$pet->birthday}}"/>
      </div>
      <div class="input-group mb-3">
          <img id="photo_preview" src="{{asset($pet->photo)}}" width="100px"/>
          <input type="file" class="form-control" id="photo" name="photo" value="{{$pet->photo}}">
      </div>
      <div class="mb-3">
        <label for="code" class="form-label">{{__("Code")}}</label>
        <input type="text" class="form-control" id="code" name="code" value="{{$pet->code}}" />
      </div>
      <div class="float-end">
        <button type="submit" class="btn btn-primary">{{__("Modificar")}}</button>
      </div>
    </div>
  </form>
</div>
@endsection

@section('javascript')
<script>
    $( document ).ready(function() {
      var userLang = navigator.language || navigator.userLanguage;

      $("#photo").change(function() {
        var file = $("input[type=file]").get(0).files[0];

        if(file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#photo_preview").attr("src",reader.result);
            }

            reader.readAsDataURL(file);
        }
        console.log(file);
      })

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