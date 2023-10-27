<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Authenticated',
            'user' => request()->user()
        ]);
    }
}
