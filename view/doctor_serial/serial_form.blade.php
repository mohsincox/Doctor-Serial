@extends('registration.layout')

@section('content')
    <div class="container">
        <h2>Serial List Search</h2>
        <hr>
        <div class="row">
            <div class="col-md-8">
               {!! Form::open(array('url'=>'doctor-serial/show-doctor-serial-list', 'method' =>'get', 'class' => 'form-horizontal', 'role' => 'form')) !!}

                <div class="required form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
                    {!! Form::label('doctor_id', 'Select Doctor', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('doctor_id',$doctor_name,null,['class' => 'form-control select2','id'=>'doctor_id', 'placeholder' => 'Select Doctor Name', 'required'])!!}
                        <span class="help-block text-danger">
                            {!! $errors -> first('doctor_id') !!}
                        </span>
                     </div>
                </div>

                <div class="required form-group{{ $errors->has('schedule_id') ? ' has-error' : '' }}">
                    {!! Form::label('schedule_id', 'Select Schedule', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('schedule_id',$schedule,null,['class' => 'form-control','id'=>'schedule_id', 'placeholder'=>'Select Schedule', 'required'])!!}
                        <span class="help-block text-danger">
                            {!! $errors -> first('schedule_id') !!}
                        </span>
                    </div>
                </div>

                <div class="required form-group{{ $errors->has('serial_date') ? ' has-error' : '' }}">
                    {!! Form::label('serial_date', 'Select Serial Date', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('serial_date', null, [ 'class' => 'form-control datetimepicker2 ','id'=>'serial_date', 'autocomplete' => 'off', 'data-mask' => "99/99/9999" ,'required']) !!}
                        <span class="help-block text-danger">
                            {{ $errors->first('serial_date') }}
                        </span>
                        <span id='date-error' style="color:red;"></span>
                    </div>
                </div>

                <div class="col-sm-6 col-sm-offset-3">
                    {!! Form::submit('Search',['class' => 'btn btn-success'])!!}
                </div>

            </div>
            
        </div>


    </div>



@endsection
