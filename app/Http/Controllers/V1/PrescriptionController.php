<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrescriptionRequest;
use App\Http\Resources\V1\PrescriptionResource;
use App\Models\Prescription;
use DateInterval;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PrescriptionResource::collection(
            Prescription::with(['disease'])->where('user_id',request()->user()->id) ->orderByRaw('ABS(UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(next_dose))')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrescriptionRequest $request)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedPrescription();
        $date = new \DateTime($attributes['date']);
        $attributes['next_dose'] = $date->add(new DateInterval('PT' . $attributes['each'] . 'H'));
        if(Prescription::create($attributes)){
            return response()->json([
                'message' => 'prescription added successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while adding the prescription"
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        return new PrescriptionResource($prescription->load(['disease']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrescriptionRequest $request, Prescription $prescription)
    {
        $request->merge(['user_id' => request()->user()->id]);
        $attributes = $request->validatedPrescription();
        $date = new \DateTime($attributes['date']);
        $attributes['next_dose'] = $date->add(new DateInterval('PT' . $attributes['each'] . 'H'));
        if($prescription->update($attributes)){
            return response()->json([
                'message' => 'prescription updated successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while updating the prescription"
        ], 500);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        if($prescription->delete()){
            return response()->json([
                'message' => 'prescription deleted successfully',
            ]);
        }
        return response()->json([
            'message' => "An error occurred while deleting the prescription"
        ], 500);
    }
}
