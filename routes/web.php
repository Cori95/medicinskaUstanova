<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
// Patient
$this->get('register/patient', 'Auth\RegisterController@showRegistrationFormPatient')->name('auth.registerPatient');
$this->post('register/patient', 'Auth\RegisterController@registerPatient')->name('auth.registerPatient');
//Doctor
$this->get('register/doctor', 'Auth\RegisterController@showRegistrationFormDoctor')->name('auth.registerDoctor');
$this->post('register/doctor', 'Auth\RegisterController@registerDoctor')->name('auth.registerDoctor');


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/reports/monthly-appointments', 'Admin\ReportsController@monthlyAppointments');
    Route::get('/reports/daily-appointments', 'Admin\ReportsController@dailyAppointments');
    Route::get('/reports/yearly-appointments', 'Admin\ReportsController@yearlyAppointments');

    Route::get('/calendar', 'Admin\SystemCalendarController@index'); 
  
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('appointments', 'Admin\AppointmentsController');
    Route::post('appointments_mass_destroy', ['uses' => 'Admin\AppointmentsController@massDestroy', 'as' => 'appointments.mass_destroy']);
    Route::post('appointments_restore/{id}', ['uses' => 'Admin\AppointmentsController@restore', 'as' => 'appointments.restore']);
    Route::delete('appointments_perma_del/{id}', ['uses' => 'Admin\AppointmentsController@perma_del', 'as' => 'appointments.perma_del']);



 
});
