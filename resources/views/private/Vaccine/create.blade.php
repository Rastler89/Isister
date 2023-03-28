@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
      <form method="POST" action="{{route('vaccines.store',['id' => $pet->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">{{__("Name")}}</label>
          <input type="text" class="form-control" id="name" name="name" />
        </div>
        <div class="mb-3">
          <label for="batch" class="form-label">{{__("Batch")}}</label>
          <input type="text" class="form-control" id="batch" name="batch" />
        </div>
        <div class="mb-3">
          <label for="init" class="form-label">{{__("Vaccination date")}}</label>
          <input type="date" class="form-control" id="init" name="init" />
        </div>
        <div class="mb-3">
          <label for="next" class="form-label">{{__("Next dose")}}</label>
          <input type="date" class="form-control" id="next" name="next" />
        </div>
        <h5>{{__("Diseases")}}</h5>
        <div>
          @foreach($diseases as $disease)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="{{$disease->name}}" value="{{$disease->id}}" name="diseases[]" />
            <label class="form-check-label" for="{{$disease->name}}">{{$disease->name}}</label>
          </div>
          @endforeach
        </div>
        <button type="submit" class="btn btn-primary">{{__("Create")}}</button>
      </form>
    </div>
</div>
@endsection