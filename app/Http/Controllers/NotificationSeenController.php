<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Notifications\DatabaseNotification;

class NotificationSeenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DatabaseNotification $notification)
    {
        Gate::authorize('update', $notification);

        $notification->markAsRead();

        return redirect()->back()->with('success', 'Notification mark as read');
    }
}
