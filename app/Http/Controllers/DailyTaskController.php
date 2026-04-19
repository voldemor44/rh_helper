<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DailyTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class DailyTaskController extends Controller
{
    public function listDailyTask($id)
    {

        if (Auth::user()->roles->contains('nom', 'Administrateur')) {
            $user_tasked = User::where('id', $id)->first();
            $daily_tasks = DailyTask::where('user_id', $id)->get();

            return view('daily-tasks.list-dailyTask', compact('daily_tasks', 'user_tasked'));

        } elseif (Auth::user()->roles->contains('nom', 'Manager')) {

            $user_tasked = User::where('id', $id)->first();
            $daily_tasks = DailyTask::where('user_id', $id)->where('assigned_by', Auth::user()->name)->get();

            return view('daily-tasks.list-dailyTask', compact('daily_tasks', 'user_tasked'));
        } else {

            $daily_tasks = DailyTask::where('user_id', $id)->get();
            return view('daily-tasks.list-dailyTask', compact('daily_tasks')); 
        }
    }

    public function addDailyTask(Request $request, $id)
    {

        DailyTask::create([
            'id' => Uuid::uuid4()->toString(),
            'titre' => $request->title,
            'contenu' => $request->content,
            'assigned_by' => Auth::user()->name,
            'statut' => "non accomplie",
            'date_delai' => $request->date,
            'user_id' => $id
        ]);

        return redirect()->back();
    }
}
