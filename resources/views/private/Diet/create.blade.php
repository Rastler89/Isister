@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <form method="POST" action="">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">{{__("Description")}}</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="repetitive" class="form-label">{{__("Es diario?")}}</label>
                <input type="checkbox" id="repetitive" name="repetitive" />
            </div>
            <div class="mb-3">
                <label for="dayOfWeek" class="form-label">{{__("Dia de la semana")}}</label>
                <select name="dayOfWeek" class="form-select">
                    <option>{{__("Please select one")}}</option>
                    <option value="1">{{__("Monday")}}</option>
                    <option value="2">{{__("Tuesday")}}</option>
                    <option value="3">{{__("Wednesday")}}</option>
                    <option value="4">{{__("Thursday")}}</option>
                    <option value="5">{{__("Friday")}}</option>
                    <option value="6">{{__("Saturday")}}</option>
                    <option value="7">{{__("Sunday")}}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hour" class="form-label">{{__("Hora")}}</label>
                <div class="input-group">
                    <input type="number" class="form-control" min="0" max="23" id="hour" name="hour" />
                    <span class="input-group-text">:</span>
                    <input type="number" class="form-control" min="0" max="59" id="minutes" name="minutes" />
                </div>
            </div>
            
            <button class="btn btn-primary">Enviar</button>
        </form>    
    </div> 
</div>


@endsection

@section('javascript')
<script>
    $( window ).on( "load", function() {
        $("#repetitive").change(function() {
            if( $('#repetitive').prop('checked') ) {
                $('#dayOfWeek').prop('disabled', 'disabled');
            } else {
                $('#dayOfWeek').prop('disabled', false);
            }
        });
    });
</script>
@endsection