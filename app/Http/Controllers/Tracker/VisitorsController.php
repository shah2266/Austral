<?php

namespace App\Http\Controllers\Tracker;

use App\Http\Controllers\Controller;
use Tracker;
use PragmaRX\Tracker\Vendor\Laravel\Support\Session;

class VisitorsController extends Controller
{
    public function visitors() 
    {
        $visitor = Tracker::currentSession();
        return view('admin.tracker.visitors', compact('visitor'));
    }

    public function sessions(Session $session) 
    {
        $sessions   = Tracker::sessions($session->getMinutes());
        return view('admin.tracker.sessions', compact('errors','sessions'));
    }

    public function errors(Session $session)
    {
        $errors = Tracker::errors($session->getMinutes());
        return view('admin.tracker.errors', compact('errors'));
    }
}
