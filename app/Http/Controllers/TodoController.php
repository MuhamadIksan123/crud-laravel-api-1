<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        // return response()->json(['data' => $todos]);
        return TodoResource::collection($todos);
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return new TodoResource($todo);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $todo = Todo::create($request->all());
        $todo->refresh();

        return response()->json(['data' => $todo], 201);
    }

    public function update(Request $request, int $id) {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->name = $request->name;
        $todo->save();

        return new TodoResource($todo);
    }

    public function destroy(int $id) {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return new TodoResource($todo);
    }
}
