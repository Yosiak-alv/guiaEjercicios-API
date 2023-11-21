<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Health;
use Illuminate\Http\Request;
use App\Http\Resources\V1\HealthResource;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HealthResource::collection(
            Health::where('user_id',request()->user()->id)->get()
        );
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedHealth();
        if(Health::create($attributes)){
            return response()->json([
                'message' => 'Health Data added successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while adding the health"
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Health $health)
    {
        return new HealthResource($health->load(['health']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Health $health)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Health $health)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedHealth();
        $date = new \DateTime($attributes['date']);
        if($health->update($attributes)){
            return response()->json([
                'message' => 'Health Data updated successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while updating the prescription"
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Health $health)
    {
        if($health->delete()){
            return response()->json([
                'message' => 'Health data deleted successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while deleting the data"
        ], 500);
    }
}
