<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;


class ApiController extends Controller
{
    //

    public function index()
    {
        $task = Task::select(['id', 'name'])->get();
        return response()->json($task);
    }


    public function taskUser($idUser)
    {
        $task = Task::select(['id', 'name'])->where('user_id', $idUser)->get();
        return response()->json($task);
    }
    
    
    public function update(Request $request, $idTask)
    {
        $task = Task::find($idTask);

        if (!$task) {
            return response()->json(['error' => 'La tarea no existe'], 404);
        }

        $task->name = $request->name;
        $task->save();

        return response()->json(['message' => 'Tarea actualizada correctamente']);
    }


    public function delete($idTask)
    {
        $task = Task::find($idTask);

        if (!$task) {
            return response()->json(['error' => 'La tarea no existe'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Tarea eliminada correctamente']);
    }




    
   

}
