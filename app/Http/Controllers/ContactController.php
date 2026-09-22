<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();

        return view('contact.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'organization' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'service_interest' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        Contact::create($validated);

        return redirect()->route('contact.index')
            ->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
