<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::query()
            ->with('slots')
            ->whereHas('slots')
            ->get();
        return Inertia::render('WelcomePage',compact('events'));
    }
}
