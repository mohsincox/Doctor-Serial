
@extends('registration.layout')
@section('content')

    <h1>Doctor Serial</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($doctor_serial_info,['method' =>'PUT','class'=>'form-horizontal', 'url' => ["doctor-serial",$doctor_serial_info->id] ]) !!}
            @include('registration.doctor_serial._edit',['submit_button' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>

    <div id="ajax_loader"></div>
@stop

@section('custom_script')
    @parent
    <script src="{{ url('/js/talha.js') }}"></script>
@endsection

{{--{!! Form::model($doctor_serial_info,['method' =>'PUT', 'url' => ["doctor-serial",$doctor_serial_info->id],'id'=>'foo', 'data-toggle' => 'form-aja' ,'data-url' => 'yes']) !!}--}}
