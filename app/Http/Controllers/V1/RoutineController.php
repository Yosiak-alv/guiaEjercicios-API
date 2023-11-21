<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;
use App\Http\Resources\V1\RoutineResource;
use App\Http\Requests\RoutineRequest;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoutineResource::collection(
            Routine::where('user_id',request()->user()->id)->get()
        );
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
    public function store(RoutineRequest $request)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedRoutine();
        if(Routine::create($attributes)){
            return response()->json([
                'message' => 'Exercise routine added successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while adding the routine"
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Routine $routine)
    {
        return new RoutineResource($routine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Routine $routine)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedHealth();
        if($routine->update($attributes)){
            return response()->json([
                'message' => 'Exercise routine updated successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while updating the routine"
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routine $routine)
    {
        if($routine->delete()){
            return response()->json([
                'message' => 'routine deleted successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while deleting the routine"
        ], 500);
    }
}
