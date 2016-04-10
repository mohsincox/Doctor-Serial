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
   <?php
        $grandTotal = 0;
        foreach ($doctorWiseSerial as $doctorSerial) {
            
        
            foreach ($doctorSerial as $key => $value) {
                 $grandTotal += $value->amount;
             } 
        }
   ?>
    
    <h3>Doctor Serial Cash Book Details From <i>{{ $from }} To {{ $to }}</i></h3>
        <p style="text-align: right;">Grand Total: <b>{{ number_format($grandTotal, 2) }}</b></p>
        @foreach($doctorWiseSerial as $doctSerial)
        <table class="data-table">
        <caption>Doctor Name: <b>{{ $doctSerial[0]->doctor->title }} {{ $doctSerial[0]->doctor->name }}</b> </caption>
            <?php $balance = 0 ?>
            <thead>
                <tr>
                    <th style="width:5%;">Sl</th>
                    <th style="width: 15%">Invoice No</th>
                    <!-- <th>Doctor Name</th> -->
                    <th style="width: 35%">Patient Name</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
            @foreach($doctSerial as $key => $serial)
                <?php
                   $balance += $serial->amount;
                ?>
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $serial->id }}</td>
                    <!-- <td>{{ @$serial->doctor->title }} {{ @$serial->doctor->name }}</td> -->
                    <td>{{ $serial->patient->patient_name }}</td>
                    <td style="text-align: right;">{{ number_format($serial->amount, 2) }}</td>
                    <td style="text-align: right;">{{ "0.00" }}</td>
                    <td style="text-align: right;">{{{ $balance < 0 ? ('(' . number_format(abs($balance), 2) . ')') : number_format($balance, 2) }}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        @endforeach
            <?php $balance = 0 ?>
        
    
</body>
</html>