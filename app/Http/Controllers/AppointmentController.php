<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // Receptionist sees all; doctors see only their own
        $appointments = $user->role === 'doctor'
            ? Appointment::where('doctor_id', $user->id)->with('patient','doctor')->get()
            : Appointment::with('patient','doctor')->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors  = Doctor::all();
        return view('appointments.create', compact('patients','doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'doctor_id'    => 'required|exists:doctors,id',
            'scheduled_at' => 'required|date'
        ]);

        Appointment::create($request->only('patient_id','doctor_id','scheduled_at'));

        return redirect()->route('appointments.index')
                         ->with('success','Appointment scheduled.');
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $doctors  = Doctor::all();
        return view('appointments.edit', compact('appointment','patients','doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'doctor_id'    => 'required|exists:doctors,id',
            'scheduled_at' => 'required|date',
            'status'       => 'required|in:scheduled,completed,cancelled'
        ]);

        $appointment->update($request->only('patient_id','doctor_id','scheduled_at','status'));

        return redirect()->route('appointments.index')
                         ->with('success','Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success','Appointment cancelled.');
    }
}
