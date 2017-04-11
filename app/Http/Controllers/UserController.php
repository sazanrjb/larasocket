<?php

namespace App\Http\Controllers;

use App\Notifications\UserCreatedNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class UserController extends Controller
{
    protected $notification;

    protected $user;
    public function __construct(Notification $notification, User $user)
    {
        $this->notification = $notification;
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        $data = [
          'message' => 'New User Created!'
        ];
        $this->notification->send($users, new UserCreatedNotification($data));
    }
}
