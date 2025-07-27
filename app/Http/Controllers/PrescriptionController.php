<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        // Show only prescriptions by this doctor
        $prescriptions = Prescription::where('doctor_id', auth()->id())
                                     ->with('patient','appointment')
                                     ->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        // Allow doctor to pick one of their appointments
        $appointments = Appointment::where('doctor_id', auth()->id())
                                   ->with('patient')
                                   ->get();
        return view('prescriptions.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medication'     => 'required|string',
            'instructions'   => 'nullable|string',
        ]);

        $appt = Appointment::findOrFail($request->appointment_id);

        Prescription::create([
            'appointment_id' => $appt->id,
            'doctor_id'      => auth()->id(),
            'patient_id'     => $appt->patient_id,
            'medication'     => $request->medication,
            'instructions'   => $request->instructions,
        ]);

        return redirect()->route('prescriptions.index')
                         ->with('success','Prescription saved.');
    }

    public function edit(Prescription $prescription)
    {
        // only doctor who created can edit
        if ($prescription->doctor_id !== auth()->id()) {
            abort(403);
        }

        $appointments = Appointment::where('doctor_id', auth()->id())
                                   ->with('patient')
                                   ->get();

        return view('prescriptions.edit', compact('prescription','appointments'));
    }

    public function update(Request $request, Prescription $prescription)
    {
        if ($prescription->doctor_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medication'     => 'required|string',
            'instructions'   => 'nullable|string',
        ]);

        $prescription->update([
            'appointment_id' => $request->appointment_id,
            'medication'     => $request->medication,
            'instructions'   => $request->instructions,
        ]);

        return redirect()->route('prescriptions.index')
                         ->with('success','Prescription updated.');
    }

    public function destroy(Prescription $prescription)
    {
        if ($prescription->doctor_id !== auth()->id()) {
            abort(403);
        }
        $prescription->delete();
        return back()->with('success','Prescription deleted.');
    }
}
