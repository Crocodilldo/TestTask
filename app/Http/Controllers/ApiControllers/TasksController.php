<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TasksRequest;
use App\Models\Tasks;
use App\Http\Resources\TasksResource;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $result = Tasks::all();
        return TasksResource::collection($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TasksRequest $request)
    {
        $result = Tasks::create($request->all());
        return new TasksResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Tasks::findOrFail($id);
        return new TasksResource($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TasksRequest $request, string $id)
    {
        $result = Tasks::findOrFail($id);
        $result->update($request->all());
        return new TasksResource($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Tasks::findOrFail($id);
        $result->delete();
        return response()->json(['message' => 'Task was deleted.'], 200);
    }
}
