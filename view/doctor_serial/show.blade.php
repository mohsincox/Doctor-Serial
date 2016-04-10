<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Doctor Schedule </title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
            /*margin: 2cm;*/
        }
    </style>
    <style>
        body {
            margin: 0;
            /*margin-left: .5in;*/
            /*margin-right: .5in;*/
            /*margin-left: .5in;*/
            /*width: 8.26in;*/
            font-size: 10pt;
        }
        .logo {
            width: 70px;
            margin-top: 5px;
        }
        .company_info {
            width: 4.5in;
            float: left;
            margin-left: .25in;
            margin-right: .25in;
        }
    </style>
    <style type="text/css" media="print">
        .page {
            -webkit-transform: rotate(-90deg);
            -moz-transform:rotate(-90deg);
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
    </style>
</head>
<body>
    <?php $content = '' ?>
    <?php //ob_start() ?>
        <div class="company_info">

            <div style="padding-bottom: 15px; margin-top: 30px;">
                <div style="text-align: center; font-size: 18pt;">
                    <div style="float: left;">
                        <div>
                            {!! Html::image(env('LOGO_URL'), env('LOGO_ALT_TXT'), ['class' => 'logo']) !!}
                        </div>
                        <div style="font-size:10pt; margin-top:-5px;">
                            Reg No: {!! env('HOSPITAL_REG_NO') !!}
                        </div>
                    </div>

                    <div style="float:right; margin-left: 5px; text-align: center;">
                        <div>
                            {!! env('HOSPITAL_NAME') !!}
                        </div>

                        <div style="text-align: center; font-size: 12pt;">
                            {!! env('HOSPITAL_EXT_NAME') !!}
                        </div>

                        <div style="text-align: center; font-size: 9pt;">
                            {!! env('HOSPITAL_ADDRESS') !!}
                        </div>
                        <div style="text-align: center; font-size: 9pt;">
                            {!! env('HOSPITAL_MOBILE') !!}
                        </div>

                        <div style="text-align: center; font-size: 9pt;">
                            email: {!! env('HOSPITAL_EMAIL') !!}
                        </div>

                    </div>
                </div>
            </div>

            <div style="border-top: 1px solid black;clear: both;"></div>

            <div style="padding: 5px 0px;float: left;">
                <b> </b>
                
            </div>

            <div style="padding: 5px 0px; float: right;">
                Date Time:
                <b><i>{{ \Carbon\Carbon::parse($serial->created_at)->format('d-m-Y g:i A') }}</i></b>
                <i style="font-size: 8pt;"></i>
            </div>

            <div style="clear: both;"></div>

            <div style="clear:both;"></div>

            <div style="margin-top:5px; border-top:1px solid silver;">
                <div style="float:left; padding-top: 5px; font-size:11pt;">
                    Doctor Name: <b>{{ $serialDoctor->doctor->title }} {{ @$ticket->doctor->nameTitle->name }} {{ $serialDoctor->doctor->name }}</b>
                </div>
                <div style="float:right; padding-top: 5px;">
                    Invoice No:<b>{{ $serial->id }}</b>
                </div>
            </div>

            <div style="clear:both;"></div>

            <div>
                <div>
                    Patient Name: <b style="font-size:11pt;">{{ $serialPatient->patient->patient_name }}</b>
                    <div style="float:right; padding-top: 5px;">
                        Patient ID: <b>{{ $serialPatient->patient->id }}</b> 
                    </div>
                    <!--
                    <div style="float:right; margin-right:15px;">
                        <b>Age: </b> 
                    </div>-->
                </div>
            </div>

            <div style="padding-top: 5px;">
                <div style="">
                    Serial Date: <b>{{ \Carbon\Carbon::parse($serial->serial_date)->format('d-m-Y') }}</b>
                </div>
            </div>

            <div style="padding-top: 5px;">
                <div style="">
                    Serial No: <b>{{ $serial->serial_no }}</b>
                </div>
            </div>

            <div style="padding-top: 5px;">
                <div style="">
                    Schedule: <b>{{ $schedule->schedule->name }}</b>
                </div>
            </div>

            <div style="padding-top: 5px;">
                <div style="">
                    Amount: <b>{{number_format( $serial->amount, 2) }}</b>
                </div>
            </div>

            <div style="margin-top:10px; width:3in;">
                Cash In Word: <i>{{{ convert_number_to_words($serial->amount + 0) }}} Tk. only.</i>
            </div>
            
            <div style="border-top: 1px solid silver; margin-top: 5px;">
                            <i>Ticket By:</i> {{ $creator->creator->name }}
            </div>
        </div>
   
</body>
</html>
