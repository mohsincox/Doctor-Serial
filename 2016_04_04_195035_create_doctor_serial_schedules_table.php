<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSerialSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_serial_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->unsignedInteger('deleted_by');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_serial_schedules');
    }
}



<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body>
	<div id="i">
		<p>Country</p>
	</div>
	
	<script>
		$(function() {
			var $a = $('#i');
			$.ajax({
			type: 'GET',
			url:'a.html',
			success: function(w){
				//console.log('success', a);
				$a.append(w)
			}
			});
		});
	</script>
	</body>
</html>	
