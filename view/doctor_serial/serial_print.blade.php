<div class="row">
    <div class="head">
        Doctor Name:{{$doctorName}}<br>
        Serial Date:{{$time}}<br>
        Schedule:<b>{{$schedule==1?'Morning':'Evening'}}</b>
    </div>

</div>
<?php

?>
<div class="row serial">
    <table border="1">
        <tr>
            <th>SL</th><th>Patient Name</th><th>Patient Type</th><th>Patient Mobile</th>
        </tr>
        @foreach($serial as $key=>$value)
            <?php
            $key++;
            ?>
            <tr>
                <td>{{$key}}</td>
                <td>{{$value->patient_name}}</td>
                <td>{{$value->patient_type_id==1?'New':'Old'}}</td>
                <td>{{$value->mobile}}</td>
            </tr>
        @endforeach
    </table>
    <style>
        td{
            height:16px;
            padding:7px;
        }
        body{
            width: 8.26in;
            height: 11.69in;
            margin-top: 1in;
            margin-left: 3in;
            margin-right: .5in ;
        }
        table {
            width: 8.26in;
            border-collapse: collapse;
        }
        @media print {
            body{
                width: 8.26in;
                height: 11.69in;
                margin-top: 1.5in;
                margin-left: .5in;
                margin-right: .5in ;
            }
            table {
                width: 7.8in;
                border-collapse: collapse;
            }
        }
    </style>
</div>
