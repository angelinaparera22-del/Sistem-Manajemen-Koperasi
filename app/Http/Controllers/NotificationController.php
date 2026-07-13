<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
            
            // Redirect based on URL in data if exists
            if (isset($notification->data['url'])) {
                return redirect($notification->data['url']);
            }
        }

        return back();
    }
}
