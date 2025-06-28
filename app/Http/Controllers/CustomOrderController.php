<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomOrderConfirmation;
use App\Mail\CustomOrderNotification;

class CustomOrderController extends Controller
{
    public function index()
    {
        return view('custom');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'base_model' => 'required|string',
            'caliber' => 'required|string',
            'barrel_length' => 'required|numeric|min:4|max:24',
            'finish' => 'required|string|in:blued,stainless,cerakote',
            'additional_features' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Create custom order
        $order = CustomOrder::create($validated);

        // Send confirmation email
        Mail::to($request->email)->send(new CustomOrderConfirmation($order));

        // Send notification to admin
        Mail::to(config('mail.admin_email'))->send(new CustomOrderNotification($order));

        // Redirect ke halaman invoice custom (bukan download otomatis)
        return redirect()->route('custom.invoice', $order->id);
    }

    public function invoice($id)
    {
        $order = \App\Models\CustomOrder::findOrFail($id);
        return view('custom.invoice', compact('order'));
    }

    public function downloadInvoice($id)
    {
        $order = \App\Models\CustomOrder::findOrFail($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('custom.invoice_pdf', compact('order'));
        return $pdf->download('custom-invoice-'.$order->id.'.pdf');
    }

    public function success()
    {
        return view('custom.success');
    }

    public function list()
    {
        $orders = \App\Models\CustomOrder::latest()->get();
        return view('custom.list', compact('orders'));
    }
} 