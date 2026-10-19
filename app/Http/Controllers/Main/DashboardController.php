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
            'licenses' => User::count(),
            'permits' => User::count(),
            'revenues' => User::sum('status_id'),
            'recent_users' => User::with(['role','status'])->orderBy('id', 'desc')->limit(5)->get(),
            // Other
            'my_licenses' => User::count(),
            'my_permits' => User::count(),
            'my_recent_licenses' => User::orderBy('id', 'desc')->limit(5)->get(),
        ];

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ];
        return response($response, 201);
    }

}
