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
        $actions = Action::all();

        return response()->json([
            'success' => true,
            'message' => 'Actions retrieved successfully.',
            'data' => $actions
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | string | max:255 | unique:actions',
            'description' => 'string ',
            'type' => 'string',
            'status' => 'string',
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
    public function show(Action $action, $id)
    {
        try {
            $action = Action::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Action retrieved successfully.',
                'data' => $action
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ], 402);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action, $id)
    {
        try {

            $action = Action::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => "required | string | max:255 | unique:actions,name," . request()->id,
                'description' => 'string ',
                'type' => 'string',
                'status' => 'string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error.',
                    'data' => $validator->errors()
                ], 400);
            }

            $action->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Action updated successfully.',
                'data' => $action
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ], 402);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action, $id)
    {
        try {
            $action = Action::findById($id);
            $action->delete();

            return response()->json([
                'success' => true,
                'message' => 'Action deleted successfully.',
                'data' => $action
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ], 402);
        }
    }
}
