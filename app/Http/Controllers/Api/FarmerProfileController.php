<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerProfileController extends Controller
{
    // CREATE or UPDATE farmer profile
    public function store(Request $request)
    {
        $request->validate([
            'region'   => 'required|string',
            'district' => 'required|string',
            'crop'     => 'required|string',
        ]);

        // Farmer kwako ni STUDENT
        if (Auth::user()->role !== 'student') {
            return response()->json([
                'message' => 'Access denied. Only farmers (students) allowed.'
            ], 403);
        }

        $profile = FarmerProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'region'   => $request->region,
                'district' => $request->district,
                'crop'     => $request->crop,
            ]
        );

        return response()->json([
            'message' => 'Farmer profile saved successfully',
            'data' => $profile
        ], 200);
    }

    // GET farmer profile
    public function show()
    {
        if (Auth::user()->role !== 'student') {
            return response()->json([
                'message' => 'Access denied.'
            ], 403);
        }

        $profile = FarmerProfile::where('user_id', Auth::id())->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found'
            ], 404);
        }

        return response()->json($profile, 200);
    }
}
