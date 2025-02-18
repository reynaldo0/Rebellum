<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('pages.user.consultation'); // Make sure you have a 'consultation.blade.php' file
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'message' => 'required|string',
            'forms' => 'required|file|mimes:jpeg,jpg,png,pdf,mp4|max:10240', // max 10MB
        ]);

        $formsPath = null;

        // Check if the 'forms' file is present
        if ($request->hasFile('forms')) {
            $forms = $request->file('forms');

            // Store the file in 'public/forms' directory within the public disk
            $formsPath = $forms->store('forms', 'public');
        }

        // Store the data in the database with the file path of the forms
        $consultation = Consultation::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'location' => $validated['location'],
            'message' => $validated['message'],
            'forms' => $formsPath, // Store the forms file path
        ]);

        return response()->json(['success' => true, 'message' => 'Consultation sent successfully']);
    }

    // Admin method to view all consultations
    public function consultations()
    {
        // Fetch all consultations from the database
        $consultations = Consultation::all();

        // Log the forms path for debugging
        foreach ($consultations as $consultation) {
            Log::info('Form file path: ' . $consultation->forms); // Use Log facade
        }

        return view('pages.admin.consultations.index', compact('consultations'));
    }
}
