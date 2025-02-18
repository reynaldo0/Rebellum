<?php

namespace App\Http\Controllers;

use App\Models\ConsultationDetail;
use Illuminate\Http\Request;

class ConsultationDetailController extends Controller
{
    public function index()
    {
        $consultations = ConsultationDetail::all();
        return view('pages.admin.consultations.detail', compact('consultations'));
    }

    public function user()
    {
        $consultations = ConsultationDetail::all();
        return view('pages.user.consultation', compact('consultations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'school' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'evidence' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
            'evidence_description' => 'nullable|string',
            'urgency' => 'required|string|in:Rendah,Sedang,Tinggi',
            'agreement' => 'accepted', // The accepted rule will ensure it's checked
        ]);

        // Simpan file bukti jika ada, dan simpan ke disk 'public'
        $evidencePath = null;
        if ($request->hasFile('evidence')) {
            $evidence = $request->file('evidence');
            $evidencePath = $evidence->store('evidence', 'public');  // Store in 'public' disk
        }

        // Simpan data ke dalam ConsultationDetail
        ConsultationDetail::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'school' => $validated['school'] ?? null,
            'address' => $validated['address'] ?? null,
            'category' => $validated['category'],
            'description' => $validated['description'],
            'evidence' => $evidencePath, // Store the evidence path in the database
            'evidence_description' => $validated['evidence_description'] ?? null,
            'urgency' => $validated['urgency'],
            // Handle 'agreement' checkbox explicitly to store 1 for true and 0 for false
            'agreement' => $validated['agreement'] === 'on' ? 1 : 0,
        ]);

        return redirect()->route('consultation.create')->with('success', 'Konsultasi berhasil dikirim.');
    }
}
