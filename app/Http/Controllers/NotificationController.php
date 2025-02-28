<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        return inertia('Notification/Index', [
            'notifications' => $user->notifications()->paginate(10)
        ]);
    }
}
