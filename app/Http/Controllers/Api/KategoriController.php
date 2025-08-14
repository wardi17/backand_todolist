<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

        //fungsi untuk testing
        private function testhasil($data){
               return response()->json(['message' => 'wardi ini'.$data], 200);
        }
    //and
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return response()->json(Kategori::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
$this->testhasil('wardi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  return response()->json([
        // 'input' => $request->all()
        // ]);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'Deskripsi' => 'nullable|string|max:500',
        ]);

         $task = Kategori::create($validated);
        return response()->json($task, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Kategori::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $task = Kategori::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

         $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'Deskripsi' => 'nullable|string|max:500',
        ]);



        $task->update($validated);
       // $this->testhasil($task);
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $task = Kategori::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
