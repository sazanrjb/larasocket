<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('notifications');
    }

    public function getAll()
    {
        $user = $this->user->first();
        return $user->notifications;
    }

    public function readAllNotification()
    {
        $user = $this->user->first();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return new JsonResponse([
           'status' => true
        ]);
    }
}
