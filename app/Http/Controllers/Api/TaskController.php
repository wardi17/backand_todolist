<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function calldatatrend(Request $request){

        die(print_r($request));
        try {
            // Panggil stored procedure dengan parameter
            $result = DB::select('EXEC sp_get_user_by_id @tahun = ?', [$tahun]);

            // Return hasil sebagai JSON
            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            // Jika error
            return response()->json([
                'success' => false,
                'message' => 'Gagal memanggil stored procedure',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function index()
    {
       
        return response()->json(Task::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jamKerja' => 'required|date_format:H:i',
            'namaProyek' => 'required|string|max:255',
            'taskList' => 'nullable|string',
            'deadlineTask' => 'required|date',
            'status' => 'nullable|string',
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task, 200);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $validated = $request->validate([
            'tanggal' => 'sometimes|required|date',
            'jamKerja' => 'sometimes|required|date_format:H:i',
            'namaProyek' => 'sometimes|required|string|max:255',
            'taskList' => 'nullable|string',
            'deadlineTask' => 'sometimes|required|date',
            'status' => 'nullable|string',
        ]);

        $task->update($validated);
        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
