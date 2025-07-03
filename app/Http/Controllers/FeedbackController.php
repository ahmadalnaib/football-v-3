<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function create()
    {
        return inertia('Feedback/Create'); // Point to your Inertia view
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feature' => 'nullable|string',
            'improvement' => 'nullable|string',
        ]);

        Feedback::create($request->all()); // Save feedback to the database

        return redirect()->route('feedback.create')->with('success', __('feedback.feedback_thank_you'));
    }
}
