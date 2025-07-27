<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Appointment;
use App\Models\InvoiceService;
use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('appointment.patient')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        // Only appointments without an invoice
        $appointments = Appointment::doesntHave('invoice')->with('patient')->get();
        return view('invoices.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'services.*.name'  => 'required|string',
            'services.*.price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function(){
            $appointmentId = request('appointment_id');
            $services = request('services');

            // calculate total
            $total = array_sum(array_column($services, 'price'));

            $invoice = Invoice::create([
                'appointment_id' => $appointmentId,
                'total_amount'   => $total,
            ]);

            foreach ($services as $s) {
                $invoice->services()->create($s);
            }
        });

        return redirect()->route('invoices.index')
                         ->with('success','Invoice generated.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('services','appointment.patient','appointment.doctor');
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $appointments = Appointment::with('patient')->get();
        $invoice->load('services');
        return view('invoices.edit', compact('invoice','appointments'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'services.*.name'  => 'required|string',
            'services.*.price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function() use($invoice){
            $services = request('services');
            $total = array_sum(array_column($services, 'price'));

            $invoice->update(['total_amount' => $total]);
            $invoice->services()->delete();

            foreach ($services as $s) {
                $invoice->services()->create($s);
            }
        });

        return redirect()->route('invoices.index')
                         ->with('success','Invoice updated.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return back()->with('success','Invoice deleted.');
    }
}
