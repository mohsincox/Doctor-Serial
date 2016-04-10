@extends('registration.layout')

@section('content')
    <div class="container">
        <h2>Doctor Serial</h2>

        
        <hr>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Serial No</th>
                <th>Serial Date</th>
                <th>Print</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($doctor_serial as $serial)
                <tr>
                    <td>{{ $serial->id }}</td>         
                    <td>{{ $serial->patient_id }}</td>
                    <td>{{ $serial->serial_no }}</td>
                    <td>{{ $serial->serial_date }}</td>
                    <td>{!! Html::link("doctor-serial/show-serial/$serial->id", ' ', ['class' => 'fa fa-print', 'target' => '_blank']) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
