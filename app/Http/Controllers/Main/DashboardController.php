<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\ParcelAllocationWorksheet;
use App\Models\Settings\Profile;

class DashboardController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $mCurrentUser = auth()->user();
        $data = [
            // Admin
            'users' => User::count(),
            'insitutions' => User::count(),
            'selections' => User::count(),
            'placements' => User::count(),
            // Other
        ];

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ];
        return response($response, 201);
    }

}
