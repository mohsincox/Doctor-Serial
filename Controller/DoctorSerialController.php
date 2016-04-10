<?php

namespace App\Http\Controllers\Registration;

use App\Models\Doctors;
use Laracasts\Flash\Flash;
use App\Models\Admin\CompanyInfo;
use App\Http\Controllers\Controller;
use App\Models\Registration\Patient;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\DoctorSerial;
use App\Models\Registration\Schedule;
use App\Models\Diagnostic\Diagnostic;
use App\Models\Registration\Doctor;
use App\Http\Requests\Registration\DoctorSerialRequest;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorSerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         $doctor_serial = DoctorSerial::orderBy('id', 'desc')->get();

         return view('registration.doctor_serial.index', compact('doctor_serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // if (Gate::denies('patient_registration')) {
        //     return redirect()->back();
        // }
       

        $data['doctor_name'] = Doctors::lists('name', 'id')->all();
        $data['patient_type'] = ['new' => 'New', 'old' => 'Old'];
        $data['schedule'] = Schedule::lists('name', 'id')->all();

        return view('registration.doctor_serial.create', $data);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(DoctorSerialRequest $request)
    {
      // dd($request->all());
       

        $doctorId = $request->doctor_id;

      $doctor = Doctor::find($doctorId);

      $fee = $request->patient_type .'_fee';
      $request->merge( ['amount' => $doctor->$fee] );

      // $request->amount = $doctor->amount;

// dd($request->all());

      $docSerial = DoctorSerial::create($request->all());
      $docSerial->created_by = auth()->user()->id;
      $docSerial->save();
      // dd($request);

        flash()->success('Successfully Created');

        return redirect('doctor-serial/show-serial/'. $docSerial->id);
    }

    public function patientName(){
        $patientInfo = Patient::where('id',Input::get('patient_id'))->first();
        if (count($patientInfo)==1){
            return 'Patient Name: '.$patientInfo->patient_name;
        }
        else{
            return 'Wrong Id';
        }
    }

    public function showSerial($id)
    {
        $serial = DoctorSerial::find($id);
       $serialDoctor = DoctorSerial::with(['doctor'])->find($id);
    // dd($serialDoctor->doctor);

        $serialPatient = DoctorSerial::with(['patient'])->find($id);
        //dd($serialPatient->patient);
        $schedule = DoctorSerial::with(['schedule'])->find($id);
        $creator = DoctorSerial::with(['creator'])->find($id);
        //$ticket = Diagnostic::with(['diagnosticDetails', 'doctor', 'doctor.speciality'])->findOrFail($id);
        return view('registration.doctor_serial.show', compact('serialDoctor', 'serialPatient', 'serial', 'schedule', 'creator') );
    }

    public function serialPr()
    {
        $data['doctor_name'] = Doctors::lists('name', 'id')->all();
        $data['schedule'] = Schedule::lists('name', 'id')->all();

         return view('registration.doctor_serial.serial_form', $data);

    }

    public function showSerialList(Request $request)
    {
         // dd($request->all());

        // dd($request->serial_date);

        $serialDate = Carbon::createFromFormat('d/m/Y', $request->serial_date)->format('Y-m-d');
        
        $doctorSerial = DoctorSerial::with(['patient'])->where('serial_date', $serialDate)
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('schedule_id', $request->schedule_id)
                                    ->get();

         $doctor = Doctor::find($request->doctor_id);
         

        return view('registration.doctor_serial.list', compact('doctorSerial', 'doctor'));
    }

    public function cashBook()
    {
        return view('registration.doctor_serial.cash_book');
    }

    public function cashBookDetails(Request $request)
    {
        $from = Carbon::createFromFormat('d/m/Y', $request->from)->format('Y-m-d');
        $to = Carbon::createFromFormat('d/m/Y', $request->to)->format('Y-m-d');

        $doctorSerial = DoctorSerial::with(['patient', 'doctor'])
                                            ->whereBetween('serial_date', [$from, $to] )
                                            ->get();

        $from = Carbon::createFromFormat('Y-m-d', $from)->format('d/m/Y');
        $to = Carbon::createFromFormat('Y-m-d', $to)->format('d/m/Y');

        return view('registration.doctor_serial.cash_book_details', compact('doctorSerial', 'from', 'to') );
    }

    public function cashBookDoctorWise()
    {
        return view('registration.doctor_serial.cash_book_doctor_wise');
    }

     public function cashBookDoctorWiseDetails(Request $request)
    {
        $from = Carbon::createFromFormat('d/m/Y', $request->from)->format('Y-m-d');
        $to = Carbon::createFromFormat('d/m/Y', $request->to)->format('Y-m-d');

        $doctorSerial = DoctorSerial::with(['patient', 'doctor'])
                                            ->whereBetween('serial_date', [$from, $to] )
                                            // ->groupBy('doctor_id')
                                            ->get();
        //return $doctorSerial;
        $doctorWiseSerial = $doctorSerial->groupBy('doctor_id');
        $from = Carbon::createFromFormat('Y-m-d', $from)->format('d/m/Y');
        $to = Carbon::createFromFormat('Y-m-d', $to)->format('d/m/Y');

        return view('registration.doctor_serial.cash_book_doctor_wise_details', compact('doctorWiseSerial', 'from', 'to') );
    }

    public function serialCancelSearch()
    {
        $data['doctor_name'] = Doctors::lists('name', 'id')->all();
        $data['schedule'] = Schedule::lists('name', 'id')->all();

         return view('registration.doctor_serial.serial_cancel_form', $data);
    }

    public function showCancelSerialList(Request $request)
    {
        //dd($request->all());
         $serialDate = Carbon::createFromFormat('d/m/Y', $request->serial_date)->format('Y-m-d');
        
        $doctorSerial = DoctorSerial::with(['patient', 'doctor'])->where('serial_date', $serialDate)
                                    ->where('doctor_id', $request->doctor_id)
                                    ->where('schedule_id', $request->schedule_id)
                                    ->get();
        $doctor = Doctor::find($request->doctor_id);
        return view('registration.doctor_serial.cancel_list', compact('doctorSerial', 'doctor'));
    }

    public function softDelete($id)
    {
        $doctorSerial = DoctorSerial::find($id);
        $doctorSerial->deleted_by = auth()->user()->id;
        $doctorSerial->save();

        $docSerial = DoctorSerial::find($id)->delete();
        
        return redirect('register');
    }
}

