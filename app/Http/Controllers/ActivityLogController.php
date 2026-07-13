<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        return view('activity_log.index', [
            'title' => 'Log Aktivitas Sistem',
            'logs' => ActivityLog::with('user')->latest()->get()
        ]);
    }
}
