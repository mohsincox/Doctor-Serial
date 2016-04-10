<div class="form-group required">
	{!! Form::label('patient_id', 'Patient Id', ['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
		<div class="input-group">
			{!! Form::text('patient_id', null, [ 'class' => 'form-control ', 'id'=>'patient_id', 'autocomplete' => 'off','required']) !!}
			<span class="input-group-btn">
                <button id="serial_patient_id" type="button" class="btn btn-info"><i class="fa fa-search"></i>
				</button>
            </span>
		</div>
		
	</div>
</div>



<div class="required form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
	{!! Form::label('doctor_id', 'Select Doctor', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">

		{!! Form::select('doctor_id', $doctor_name,null, ['class' => 'form-control select2', 'placeholder' => 'Select Doctor Name'] )!!}

		<span class="help-block text-danger">
            {!! $errors -> first('doctor_id') !!}
        </span>

	</div>
</div>

<div class="required form-group{{ $errors->has('schedule_id') ? ' has-error' : '' }}">
	{!! Form::label('schedule_id', 'Select Schedule', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('schedule_id',$schedule,null,['class' => 'form-control','id'=>'schedule_id', 'placeholder'=>'Select Schedule'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('schedule_id') !!}
        </span>
	</div>
</div>
<div class="required form-group{{ $errors->has('patient_type') ? ' has-error' : '' }}">
	{!! Form::label('patient_type', 'Select Patient Type', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('patient_type', $patient_type, null,['class' => 'form-control','id'=>'patient_type', 'placeholder'=>'Select Patient Type'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('patient_type') !!}
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
	{!! Form::submit($submit_button,['class' => 'btn btn-success'])!!}
</div>
