<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Doctor Serial Cash Book Details</title>
    <style>
        body    {
            width: 8.26in;
        }

        .data-table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 8.26in;
        }

        .data-table td, .data-table th {
            border: 1px solid black;
            padding: 3px 5px;
        }

        .data-table caption {
            text-align: left;
            border:none;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

    {!! $user or '' !!}
    <table class="data-table">
        <caption><h3>Doctor Serial Cash Book Details From <i>{{ $from }} To {{ $to }}</h3></i></caption>
        <thead>
            <tr>
                <th style="width:50px;">Sl</th>
                <th>Invoice No</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php $balance = 0 ?>
            @foreach($doctorSerial as $key => $row)
                <?php
                   $balance += $row->amount;
                ?>
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->doctor->title }} {{ $row->doctor->name }}</td>
                    <td>{{ $row->patient->patient_name }}</td>
                    <td style="text-align: right;">{{ number_format($row->amount, 2) }}</td>
                    <td style="text-align: right;">{{ "0.00" }}</td>
                    <td style="text-align: right;">{{{ $balance < 0 ? ('(' . number_format(abs($balance), 2) . ')') : number_format($balance, 2) }}}</td>
                </tr>
           @endforeach
        </tbody>
    </table>
    
</body>
</html>