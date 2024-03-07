<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function create(CreateTaskRequest $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // revisa el límite de tareas
        $user_id = $validatedData['user_id'];
        $pending_tasks_count = Task::where('user_id', $user_id)->where('is_completed', 0)->count();

        if ($pending_tasks_count < 5) {
            // se crea nueva tarea
            $task = Task::create([
                'company_id' => $validatedData['company_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'user_id' => $validatedData['user_id'],
            ]);

            return response()->json($task);
        } else {
            return response()->json(['error' => 'El usuario ha alcanzado el límite de tareas pendientes'], 422);
        }
    }
}

