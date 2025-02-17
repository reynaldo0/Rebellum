<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store the data in the database
        $consultation = Consultation::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return response()->json(['success' => true, 'message' => 'Consultation sent successfully']);
    }

    //admin
    public function consultations()
    {
        // Fetch all consultations from the database
        $consultations = Consultation::all();

        return view('pages.admin.consultations.index', compact('consultations'));
    }
}
