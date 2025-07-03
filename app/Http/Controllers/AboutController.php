<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function __invoke()
    {
        return Inertia::render('About');
    }
}
