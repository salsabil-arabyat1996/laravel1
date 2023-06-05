<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentDashboardController extends Controller
{
    public function index()
    {
        // Retrieve all reservations
        $appointments = Appointment::all();

        // Pass the reservations to the view
        return view('Admin.appointment.index', compact('appointments'));
    }
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('Admin.appointment.show', compact('appointment'));
    }
}
