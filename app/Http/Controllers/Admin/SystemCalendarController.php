<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        if(Auth::user()->role_id != 1)
        {
            $appointments = Auth::user()->role_id === 3 ? \App\Appointment::where('doctor_id',Auth::user()->id)->get()
                :\App\Appointment::where('patient_id',Auth::user()->id)->get();
        }else
            $appointments = \App\Appointment::all();

        $events = [];

        foreach ( $appointments as $appointment) {
           $crudFieldValue = $appointment->getOriginal('appointment'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $appointment->appointment; 
           $prefix         = 'Appointment'; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.appointments.edit', $appointment->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
