<?php

namespace App\Http\Controllers;

use App\Models\Task;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function welcome()
    {
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $aFazer = [];
        $feitas = [];

        for ($month = 1; $month <= 12; $month++) {
            $aFazer[] = DB::table('tasks')
                ->where('completed', 'pending')
                ->whereMonth('due_date', $month)
                ->where('user_id', auth()->id())
                ->count();

            $feitas[] = DB::table('tasks')
                ->where('completed', 'completed')
                ->whereMonth('due_date', $month)
                ->where('user_id', auth()->id())
                ->count();
        }

        return view('welcome', compact('labels', 'feitas', 'aFazer'));
    }

    public function index()
    {
        $tasks = DB::table('tasks')->where('user_id', auth()->id())->paginate(10);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'due_date' => 'required',
            'completed' => 'required',
        ]);

        Task::create(array_merge($input, ['user_id' => auth()->id()]));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit()
    {
        return view('tasks.edit');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
