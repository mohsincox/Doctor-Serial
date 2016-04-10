<?php

Route::group(['middleware' => 'web'], function() {
    Route::group(['middleware' => ['auth']], function(){

        Route::get('register-patient/{register_patient}/search/', 'PatientRegistrationController@search');

        Route::resource('register-patient', 'PatientRegistrationController');

        Route::resource('register-doctor', 'DoctorRegistrationController');

        Route::resource('register-broker', 'BrokerRegistrationController');

        Route::resource('register-investigation-group', 'InvestigationGroupController');

        Route::get('group/names', [
            'as' => 'register-investigation-group.names', 'uses' => 'InvestigationGroupController@names'
        ]);

        Route::resource('register-investigation', 'InvestigationController');

        Route::get('/register', function(){
            return view('pages.registration');
        });

    });
    //Route::get('doctor-serial/hamba', 'DoctorSerialController@hamba');
    Route::get('doctor-serial-patient-name', 'DoctorSerialController@patientName');
    Route::get('user-panel-talha/block-url', 'UserPanelController@BlockUrl');
    Route::get('doctor-serial/serial-print', 'DoctorSerialController@serialPrint');
    Route::get('doctor-serial/serial', 'DoctorSerialController@serial');
    Route::get('test', 'DoctorSerialController@test');
    Route::get('doctor-serial/show-serial/{id?}', 'DoctorSerialController@showSerial');
    Route::get('doctor-serial/show-doctor-serial-list', 'DoctorSerialController@showSerialList');
    Route::get('doctor-serial/doctor-serial-list-print', 'DoctorSerialController@SerialPr');
    Route::get('doctor-serial/cash-book', 'DoctorSerialController@cashBook');
    Route::get('doctor-serial/cash-book_details', 'DoctorSerialController@cashBookDetails');
     Route::get('doctor-serial/cash-book-doctor-wise', 'DoctorSerialController@cashBookDoctorWise');
    Route::get('doctor-serial/cash-book-doctor-wise-details', 'DoctorSerialController@cashBookDoctorWiseDetails');
    Route::get('doctor-serial/cancel-search', 'DoctorSerialController@serialCancelSearch');
    Route::get('doctor-serial/show_cancel_serial_list', 'DoctorSerialController@showCancelSerialList');
    Route::get('doctor-serial/soft-delete/{id?}', 'DoctorSerialController@softDelete');

    // Route::get('/doctor-serial/create', [
    //     'uses' => 'DoctorSerialController@create',
    // ]);

    // Route::get('/doctor-serial/hamba', [
    //     'middleware' => 'role:admin',
    //     'uses' => 'DoctorSerialController@hamba',
    // ]);

    Route::resource('doctor-serial', 'DoctorSerialController');

    Route::resource('user-panel-talha', 'UserPanelController');
    Route::any('user-panel-talha/permission-update', 'UserPanelController@PermissionUpdate');

    Route::resource('schedule', 'ScheduleController');

});
