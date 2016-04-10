<div class="row">
    <div class="col-md-5 col-md-offset-4">
        <?php
            $session['serial_date']     = $time;
            $session['doctor_id']       = $dr_id;
            $session['schedule_id']     = $schedule;
            $session['patient_type_id'] = $patient_type;
            $session['gender']          = $gender;
            Session::put('serial_for',$session);
        ?>
        Doctor Name:{{$doctorName}}<br>
        Serial Date:{{$time}}<br>
        Patient Type:<b>{{$patient_type==1?'New':'Old'}}</b>&nbsp;&nbsp;
        Schedule:<b>{{$schedule==1?'Morning':'Evening'}}</b>
    </div>

</div>
<div class="row">
    <table class="table table-bordered">
        <tr>
            <th>SL</th><th>Patient Name</th><th>Patient Mobile</th><th>Created At</th><th>Delete</th>
        </tr>
        @foreach($serial as $key=>$value)
            <?php $key++; ?>
            <tr>
                <td>{{$key}}</td>
                <td>{{$value->patient_name}}&nbsp;&nbsp;&nbsp;&nbsp;<a href={{url('doctor-serial/'.$value->id.'/edit')}}>Edit</a></td>
                <td>{{$value->mobile}}</td>
                <td>{{$value->created_at}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'route' => ['doctor-serial.destroy', $value->id], 'class' =>'form-inline form-delete']) !!}
                    {!! Form::hidden('id', $value->id) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
</div>
