@extends('registration.layout')

@section('content')
    <div class="container">
        <h2>Doctor Serial</h2>

        
        <hr>
        <p>Doctor Name: {{ $doctor->name }}</p>    
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Serial No</th>
                <th>Serial Date</th>
                <th>Cancel</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($doctorSerial as $serial)
                <tr>
                    <td>{{ $serial->id }}</td>         
                    <td>{{ $serial->patient->patient_name }}</td>
                    <td>{{ $serial->serial_no }}</td>
                    <td>{{ $serial->serial_date }}</td>
                    <td>{!! Html::link("doctor-serial/soft-delete/$serial->id", ' ', ['class' => 'fa fa-trash']) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
