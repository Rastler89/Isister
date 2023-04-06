@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <form method="POST" action="{{route('diagnostic.store',['id' => $pet->id])}}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">{{__("Name")}}</label>
                <input type="text" class="form-control" id="name" name="name" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">{{__("Description")}}</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="init" class="form-label">{{__("Init")}}</label>
                <input type="date" class="form-control" id="init" name="init" />
                <label for="in_proccess" class="form-label">{{__("Sigue en tratamiento")}}</label>
                <input type="checkbox" id="in_process" name="in_process" />
            </div>
            <div class="mb-3">
                <label for="finish" class="form-label">{{__("Finish")}}</label>
                <input type="date" class="form-control" id="finish" name="finish" />
            </div>
            <h5>{{__("Need Surgery?")}}</h5>
            <div class="mb-3">
                <label for="y_surgery" class="form-label">{{__("Yes")}}</label>
                <input type="radio" class="selectors" type="checkbox" id="y_surgery" name="surgery" />
                <label for="n_surgery" class="form-label">{{__("No")}}</label>
                <input type="radio" checked class="selectors" type="checkbox" id="n_surgery" name="surgery" />
            </div>
            <div style="display:none;" id="surgeries_body" class="mb-4">
                <h3>{{__("Surgeries")}}</h3>
                <div id="surgeries"></div>
                <button type="button" id="surgery_add" class="btn btn-primary">{{__("Add more")}}</button>
            </div>
            <h5>{{__("Need treatment?")}}</h5>
            <div class="mb-3">
                <label for="y_treatment" class="form-label">{{__("Yes")}}</label>
                <input type="radio" class="selectors" type="checkbox" id="y_treatment" name="treatment" value="yes"/>
                <label for="n_treatment" class="form-label">{{__("No")}}</label>
                <input type="radio" checked class="selectors" type="checkbox" id="n_treatment" name="treatment" value="no"/>
            </div>
            <div style="display: none;" id="treatments_body">
                <h3>{{__("Treatments")}}</h3>
                <div id="treatments"></div>
                <button type="button" id="treatment_add" class="btn btn-primary">{{__("Add more")}}</button>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>    
    </div> 
</div>

<div style="visibility: hidden">
    <div id="surgery_sys" style="border:1px dotted black;padding:15px;">
        <div class="mb-3">
            <label for="name" class="form-label">{{__("Name")}}</label>
            <input type="text" class="form-control" id="name" name="surgery_name[]" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__("Description")}}</label>
            <textarea class="form-control" id="description" name="surgery_description[]"></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">{{__("Date")}}</label>
            <input type="date" class="form-control" id="date" name="surgery_date[]" />
        </div>
    </div>
    <div id="treatment_sys" style="border:1px dotted black;padding:15px;">
        <div class="mb-3">
            <label for="name" class="form-label">{{__("Name")}}</label>
            <input type="text" class="form-control" id="name" name="treatment_name[]" />
        </div>
        <div class="mb-3">
            <label for="init" class="form-label">{{__("Start Treatment")}}</label>
            <input type="date" class="form-control" id="init" name="treatment_init[]" />
        </div>
        <div class="mb-3">
            <label for="finish" class="form-label">{{__("Finish Treatment")}}</label>
            <input type="date" class="form-control" id="finish" name="treatment_finish[]" />
        </div>
        <div class="mb-3">
            <label for="periodicity" class="form-label">{{__("Periodicity")}}</label>
            <div class="input-group">
                <input type="number" class="form-control" id="peridocity" name="treatment_periodicity[]" />
                <select class="form-control" id="periodicity_type" name="treatment_periodicity_type[]">
                    <option value="h" selected>{{__("Hours")}}</option>
                    <option value="d">{{__("Days")}}</option>
                    <option value="m">{{__("Months")}}</option>
                </select>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var surgery, treatment = false;
    $( window ).on( "load", function() {
        // Run code
        $("#surgery_add").click(function() {
            $( "#surgery_sys" ).clone().find(".form-control").val("").end().appendTo( "#surgeries" );
        });
        $("#treatment_add").click(function() {
            $( "#treatment_sys" ).clone().find(".form-control").val("").end().appendTo( "#treatments" );
        });
        $(".selectors").change(function() {
            if( $('#y_surgery').prop('checked') ) {
                $("#surgeries_body").css('display','block');
                if(!surgery) {
                    $( "#surgery_sys" ).clone().find(".form-control").val("").end().appendTo( "#surgeries" );
                    surgery = true;
                }
            } else {
                $("#surgeries_body").css('display','none');
            }
            if( $('#y_treatment').prop('checked') ) {
                $("#treatments_body").css('display','block');
                if(!treatment) {
                    $( "#treatment_sys" ).clone().find(".form-control").val("").end().appendTo( "#treatments" );
                    treatment = true;
                }
            } else {
                $("#treatments_body").css('display','none');
            }
        });
    });

    
</script>
@endsection