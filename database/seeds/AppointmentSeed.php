<?php

use Illuminate\Database\Seeder;

class AppointmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'patient_id' => 1, 'doctor_id' => 1, 'appointment' => '2018-07-18 22:26:45',],

        ];

        foreach ($items as $item) {
            \App\Appointment::create($item);
        }
    }
}
