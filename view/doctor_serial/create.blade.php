@extends('registration.layout')
@section('content')

    <h1>Doctor Serial</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['url' => 'doctor-serial', 'method' =>'post', 'class' => 'form-horizontal', 'id'=>'foo', 'role' => 'form', 'data-toggle' => 'form-aja', 'data-url' => 'Yes']) !!}
                @include('registration.doctor_serial._form',['submit_button' => 'Submit'])
            {!! Form::close() !!}
        </div>



         <div class="col-sm-4 col-sm-offset-2" id="patient-info">
             
            <span id='name-of-patient'></span>
             <span class="help-block text-danger">
            {{ $errors->first('patient_id') }}
            </span>

         </div>

        <div class="col-md-6">
                <div id="serial_info">

                    @if(session()->has('serial'))
                        <?php
                        $serial = Session::get('serial');
                        $serialFor = Session::get('serial_for');
                        ?>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-4">
                                Doctor Name:{{$doctor_name[$serialFor['doctor_id']]}}<br>
                                Serial Date:{{$serialFor['serial_date']}}<br>
                                Patient Type:<b>{{$serialFor['patient_type_id']==1?'New':'Old'}}</b>&nbsp;&nbsp;
                                Schedule:<b>{{$serialFor['schedule_id']==1?'Morning':'Evening'}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SL</th>
                                    <th>Patient Name</th>
                                    <th>Patient Mobile</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($serial as $key=>$value)
                                    <?php $key++; ?>
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$value->patient_name}}&nbsp;&nbsp;&nbsp;&nbsp;<a
                                                    href={{url('doctor-serial/'.$value->id.'/edit')}}>Edit</a></td>
                                        <td>{{$value->mobile}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>

                                            {!! Form::open(['method' => 'delete', 'route' => ['doctor-serial.destroy', $value->id], 'class' =>'form-inline form-delete']) !!}
                                            {!! Form::hidden('id', $value->id) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                                            {!! Form::close() !!}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    {{Session::forget('serial')}}
            </div>
        </div>
    </div>

    <div id="ajax_loader"></div>
@stop

@section('custom_script')
    @parent
    <script src="{{ url('/js/talha.js') }}"></script>
@endsection
