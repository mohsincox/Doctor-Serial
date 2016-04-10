<html>
    <head>
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table, td, th {
                border: 1px solid black;
            }
            td {
                
                vertical-align: bottom;
            }
        </style>
    </head>
    <body style="width: 8.26in;">
        <h1>Doctor Serial List</h1>
        <hr>
        <p style="font-size: 17px;">Doctor Name: <b>{{ $doctor->title }} {{ $doctor->name }}</b></p>
        <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm" style="width: 100%;">
            <thead>
            <tr>
                <th>Serial No</th>
                <th>Patient Name</th>
                
                <th>Age</th>
                <th>Sex</th>
            </tr>
            </thead>
            <tbody>
                @foreach($doctorSerial as $serial)
                <?php
                    $dateOfBirth = \Carbon\Carbon::createFromFormat('d/m/Y', $serial->patient->date_of_birth)->format('Y-m-d');
                    $age = age_calculation($dateOfBirth);
                ?>
                    <tr style="text-align: left; padding-left:5px;">
                        <td style="padding-left: 5px;">{{ $serial->serial_no }}</td>
                        <td style="padding-left: 5px;">{{ $serial->patient->patient_name }}</td>
                        
                        <td style="padding-left: 5px;">{{ $age }}</td>
                        <td style="padding-left: 5px;">{{ $serial->patient->gender }}</td>
                    </tr>
               @endforeach
            </tbody>
        </table>
    </body>
</html>
