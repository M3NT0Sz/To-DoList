<?php

namespace App\Http\Controllers;

use App\Models\Task;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function welcome()
    {
        $anos = DB::table('tasks')
            ->selectRaw('YEAR(due_date) as ano')
            ->distinct()
            ->pluck('ano')
            ->toArray();

        $labels = [];
        $feitas = [];
        $aFazer = [];
        $atrasadas = [];

        foreach ($anos as $ano) {
            for ($month = 1; $month <= 12; $month++) {
                $label = sprintf('%04d-%02d', $ano, $month); // Exemplo: 2025-01
                $labels[] = $label;

                // Tarefas atrasadas (pendentes e vencidas)
                $atrasadasCount = DB::table('tasks')
                    ->where('completed', 'pending')
                    ->whereYear('due_date', $ano)
                    ->whereMonth('due_date', $month)
                    ->where('due_date', '<', now())
                    ->where('user_id', auth()->id())
                    ->count();
                $atrasadas[] = $atrasadasCount;

                // Tarefas a fazer (pendentes e não vencidas)
                $aFazerCount = DB::table('tasks')
                    ->where('completed', 'pending')
                    ->whereYear('due_date', $ano)
                    ->whereMonth('due_date', $month)
                    ->where('due_date', '>=', now())
                    ->where('user_id', auth()->id())
                    ->count();
                $aFazer[] = $aFazerCount;

                $feitas[] = DB::table('tasks')
                    ->where('completed', 'completed')
                    ->whereYear('due_date', $ano)
                    ->whereMonth('due_date', $month)
                    ->where('user_id', auth()->id())
                    ->count();
            }
        }

        return view('welcome', compact('labels', 'feitas', 'aFazer', 'atrasadas'));
    }

    public function index()
    {
        $tasks = \App\Models\Task::with('tags')->where('user_id', auth()->id())->paginate(10);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $tags = \App\Models\Tag::all();
        return view('tasks.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'due_date' => 'required',
            'completed' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $task = Task::create(array_merge($input, ['user_id' => auth()->id()]));
        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        }
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $tags = \App\Models\Tag::all();
        return view('tasks.edit', compact('task', 'tags'));
    }

    public function update(Request $request, Task $task)
    {
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'due_date' => 'required',
            'completed' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $task->update($input);
        if ($request->has('tags')) {
            $task->tags()->sync($request->tags);
        } else {
            $task->tags()->detach();
        }
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
