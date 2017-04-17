<?php

namespace App\Http\Controllers;

use App\Events\TaskCreated;
use App\Notifications\TaskCreatedNotification;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    protected $task;

    protected $user;
    public function __construct(Task $task, User $user)
    {
        $this->task = $task;
        $this->user = $user;
    }

    public function index()
    {
        return view('tasks.index');
    }

    public function getAll()
    {
        return $this->task->latest()->get();
    }

    public function store(Request $request)
    {
        $task = $this->task->create($request->all());
        $users = $this->user->all();
        $user = $this->user->first();

        event(new TaskCreated($task, $user));

        Notification::send($users, new TaskCreatedNotification($task, $user));

        Session::flash('notice', 'Task Successfully created! Check your mail.');
        return redirect()->back();
    }

    public function show($id)
    {
        $task = $this->task->findOrFail($id);
        return view('tasks.show', compact('task'));
    }
}
