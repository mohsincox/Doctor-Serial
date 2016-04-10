<div class="required form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
	{!! Form::label('doctor_id', 'Select Doctor', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('doctor_id',[''=>'Select Doctor'] + $doctor_name,null,['class' => 'form-control','id'=>'doctor_id'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('doctor_id') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('patient_type_id') ? ' has-error' : '' }}">
	{!! Form::label('patient_type_id', 'Patient Type', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('patient_type_id',[''=>'Select Patient Type'] +$patient_type,null,['class' => 'form-control','id'=>'patient_type_id'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('patient_type_id') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('schedule_id') ? ' has-error' : '' }}">
	{!! Form::label('schedule_id', 'Select Schedule', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('schedule_id',[''=>'Select Schedule'] +$schedule,null,['class' => 'form-control','id'=>'schedule_id'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('schedule_id') !!}
        </span>
	</div>
</div>

<div class="form-group required">
	{!! Form::label('serial_date', 'Select Serial Date', ['class' => 'control-label col-sm-4']) !!}
	<div class="col-sm-8">
			{!! Form::text('serial_date', null, [ 'readonly', 'class' => 'form-control datepicker ','id'=>'serial_date', 'placeholder' => 'mm/dd/yyyy', 'autocomplete' => 'off', 'data-validation-format' => "yyyy-mm-dd" ,'required']) !!}
        <span class="help-block text-danger">
            {{ $errors->first('serial_date') }}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
	{!! Form::label('gender', 'Gender', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::select('gender', [''=>'Select Gender'] +$sex, null, ['class' => 'form-control','id'=>'gender'])!!}
		<span class="help-block text-danger">
            {!! $errors -> first('gender') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('patient_name') ? ' has-error' : '' }}">
	{!! Form::label('patient_name','Patient Name', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::text('patient_name', null, ['class'=>'form-control', 'id' => 'patient_name', 'autocomplete' => 'off', 'placeholder' => 'Enter Patient Name','required' ]) !!}
		<span class="help-block text-danger">
            {!! $errors -> first('patient_name') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('age') ? ' has-error' : '' }}">
	{!! Form::label('age', 'Age', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::text('age', null, ['class'=>'form-control', 'id' => 'age', 'autocomplete' => 'off', 'placeholder' => 'Enter Age' ]) !!}
		<span class="help-block text-danger">
            {!! $errors -> first('age') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('care_of') ? ' has-error' : '' }}">
	{!! Form::label('care_of', 'Care Of', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::text('care_of',null ,['class'=>'form-control', 'id' => 'care_of', 'autocomplete' => 'off', 'placeholder' => 'Care Of' ]) !!}
		<span class="help-block text-danger">
            {!! $errors -> first('care_of') !!}
        </span>
	</div>
</div>

<div class="required form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
	{!! Form::label('mobile', 'Patient Mobile', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::number('mobile',null,['id' => 'patient_mobile', 'class' => 'form-control', 'placeholder' => "Patient Mobile", 'autocomplete' => 'off', 'rows'=>'3']) !!}
		<span class="help-block text-danger">
            {!! $errors -> first('mobile') !!}
        </span>
	</div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	{!! Form::label('address','Address', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::textarea('address',null,['id' => 'address', 'class' => 'form-control', 'placeholder' => "Enter Patient Address", 'autocomplete' => 'off', 'rows'=>'3']) !!}
		<span class="help-block text-danger">
            {!! $errors -> first('address') !!}
        </span>
	</div>
</div>

<div class="col-sm-6 col-sm-offset-3">
	{!! Form::submit($submit_button,['class' => 'btn btn-success'])!!}
</div>

{!! Form::close() !!}
