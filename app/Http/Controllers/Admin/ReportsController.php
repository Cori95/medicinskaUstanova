<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;

class ReportsController extends Controller
{
    public function monthlyAppointments()
    {
        $reportTitle = 'Monthly Appointments';
        $reportLabel = 'SUM';
        $chartType   = 'bar';

        $results = Appointment::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m');
        })->map(function ($entries, $group) {
            return $entries->sum('id');
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

    public function dailyAppointments()
    {
        $reportTitle = 'Daily Appointments';
        $reportLabel = 'SUM';
        $chartType   = 'bar';

        $results = Appointment::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m-d');
        })->map(function ($entries, $group) {
            return $entries->sum('id');
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

    public function yearlyAppointments()
    {
        $reportTitle = 'Yearly Appointments';
        $reportLabel = 'SUM';
        $chartType   = 'bar';

        $results = Appointment::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y');
        })->map(function ($entries, $group) {
            return $entries->sum('id');
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
