<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\Permit;
use App\Models\Main\Payment;
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
            'permits' => Permit::count(),
            'revenues' => Payment::where('status_id',2)->sum('amount'),
            'recent_users' => User::with(['role','status'])->orderBy('id', 'desc')->limit(5)->get(),
            // Other
            'my_licenses' => User::count(),
            'my_permits' => Permit::where('user_id', $mCurrentUser->id)->count(),
            'my_payments' => Payment::where('user_id', $mCurrentUser->id)->where('status_id',2)->sum('amount'),
            'my_exams' => Permit::where('user_id', $mCurrentUser->id)->count(),
            'my_recent_permits' => Permit::with('status')->where('user_id', $mCurrentUser->id)->orderBy('id', 'desc')->limit(5)->get(),
        ];

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ];
        return response($response, 201);
    }

}
