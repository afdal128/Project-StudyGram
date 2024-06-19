<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Notification;
use Carbon\Carbon;

class getTask extends Controller
{
    
    public function showTasks(Request $request)
    {
        $taskType = $request->input('task_type');
        $tasks = tugas::where('status', $taskType)
            ->where('user_id', Auth::id())
            ->get();
        return view('home', compact('tasks', 'taskType'), ["title"=>"home"]);
    }

    public function showTaskDetail(Request $request)
    {
        $taskId = $request->input('task_id');
        $taskType = $request->input('task_type');
        $selectedTask = tugas::where('id', $taskId)
            ->where('user_id', Auth::id())
            ->first();;
        $tasks = tugas::where('status', $taskType)
            ->where('user_id', Auth::id())
            ->get();
        return view('home', compact('tasks', 'selectedTask', 'taskType'), ["title"=>"home"]);
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $tugas = tugas::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id()]);

        Notification::create([
            'tugas_id' => $tugas->id,
            'user_id' => Auth::id(),
            'message' => 'Tugas "' . $tugas->name . '" akan dikumpulkan pada ' . $tugas->due_date . '.'
        ]);


        return redirect()->route('showTasks', ['task_type' => $request->input('task_type')])
                         ->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function editTask(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tugas,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task = tugas::where('id',$request->input('task_id'))
            ->where('user_id', Auth::id())
            ->first();

        $task->update($request->all());

        $notification = Notification::where('tugas_id', $task->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($task->status === 'completed') {
            if ($notification) {
                $notification->update([
                    'message' => 'Tugas "' . $task->name . '" telah selesai pada ' . Carbon::now()->toDateString() . '.'
                ]);
            }
        } else {
            if ($notification) {
                $notification->update([
                    'message' => 'Tugas "' . $task->name . '" telah diupdate dan akan dikumpulkan pada ' . $task->due_date . '.'
                ]);
            } else {
                Notification::create([
                    'task_id' => $task->id,
                    'message' => 'Tugas "' . $task->name . '" telah diupdate dan akan dikumpulkan pada ' . $task->due_date . '.'
                ]);
            }
        }

        return redirect('/')->with('success', 'Tugas berhasil diperbarui!');
    }

        
    public function deleteTask($taskId)
    {
        $task = tugas::findOrFail($taskId);
        $task->notifications()->delete();
        $task->delete();
        return redirect()->route('showTasks')->with('success', 'Tugas berhasil dihapus!');
    }

    public function showNotifications(Request $request)
    {
        $notifications = Notification::where('user_id', Auth::id())->pluck('message');
        return view('activity', compact('notifications'), ["title"=>"activity"]);
        // $notifications = Notification::()->pluck('message');
        // return view('activity', compact('notifications'), ["title"=>"activity"]);
    
    }
}

