<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PanController extends Controller
{
    public function index()
    {
        // Fetching all analytics data from the 'pan_analytics' table
        $analytics = DB::table('pan_analytics')->get();

        // Rendering the 'Dashboard' view and passing the analytics data
        return Inertia::render('Dashboard', [
            'analytics' => $analytics
        ]);
    }
}
