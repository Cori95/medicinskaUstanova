@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.appointment.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.patient')</th>
                            <td field-key='patient'>{{ $appointment->patient->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.lastname')</th>
                            <td field-key='lastname'>{{ isset($appointment->patient) ? $appointment->patient->lastname : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.doctor')</th>
                            <td field-key='doctor'>{{ $appointment->doctor->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.lastname')</th>
                            <td field-key='lastname'>{{ isset($appointment->doctor) ? $appointment->doctor->lastname : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointment.fields.appointment')</th>
                            <td field-key='appointment'>{{ $appointment->appointment }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
