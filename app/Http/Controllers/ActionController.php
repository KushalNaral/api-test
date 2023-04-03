<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'description' => 'string',
            'type' => 'string',
            'status' => 'string',
            'priority' => 'string',
            'due_date' => 'string',
            'user_id' => 'string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'data' => $validator->errors()
            ], 400);
        }

        $action = Action::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Action created successfully.',
            'data' => $action
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action)
    {
        $action = Action::find(Action::latest()->first()->id);
        $action->delete();

        return response()->json([
            'success' => true,
            'message' => 'Action deleted successfully.',
            'data' => $action
        ], 200);
    }
}
