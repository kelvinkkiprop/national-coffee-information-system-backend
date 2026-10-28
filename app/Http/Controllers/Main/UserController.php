<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Settings\Role;
use App\Models\Others\UserStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with(['role','status'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|integer',
            'password' => 'required|string|min:8',
        ]);

        // OTP
        $verification_code = rand(1000,9999);
        $otp_code = rand(100000, 999999);
        $mPassword = $fields['password'];
        $item = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'role_id' => $fields['role_id'],
            'password' => Hash::make($mPassword),
            'verification_code' => $verification_code,
            'otp_code' => $otp_code,
            'otp_expires_at' => now()->addMinutes(5),
            'remember_token' => Str::random(50),
        ]);

        // Notification
        $email = $fields['email'];
        $subject = 'Account Registration and Login Details';
        $message = "<div>
            <p>Your account has been created successfully.</p>
            <p>
                <strong>Email:</strong> {$email} <br>
                <strong>Verification Code:</strong> {$verification_code} <br>
                <strong>OTP:</strong> {$otp_code} <br>
                <strong>Default Password:</strong> {$mPassword} <br>
            </p>
            <p>Please log in and change your default password immediately.</p>
        </div>";
        $data = array(
            'name' =>  $fields['name'],
            'subject' => $subject,
            'url' => config('app.url').'/#/auth/login',
            'btn-text' => 'Login',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

        $response = [
            'status' => 'success',
            'message' => 'User created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::with(['role','status'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$id,
            'role_id' => 'required|integer',
            'status_id' => 'required|integer',
            'password' => 'required_if:reset_password,true|nullable|string|min:8',
            'reset_password' => 'required|boolean',
        ]);

        $item = User::where('id', $id)->update([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'role_id' => $fields['role_id'],
            'status_id' => $fields['status_id'],
        ]);

        $resetPassword = $fields['reset_password'];
        if($resetPassword==true){
            $mPassword = $fields['password'];
            $item = User::find($id);
            $item->password = Hash::make($mPassword);
            $item->save();
            // Notification
            $email = $fields['email'];
            $subject = 'Updated Account Details';
            $message = "<div>
                <p>Your account has been updated successfully.</p>
                <p>
                    <strong>Email:</strong> {$email} <br>
                    <strong>Updated Password:</strong> {$mPassword} <br>
                </p>
                <p>Please log in using your updated credentials.</p>
            </div>";
            $data = array(
                'name' =>  $fields['name'],
                'subject' => $subject,
                'url' => config('app.url').'/#/auth/login',
                'btn-text' => 'Login',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($email)->send(new AlertMail($data));
        }

        $response = [
            'status' => 'success',
            'message' => 'User updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();

        $response = [
            'message' => 'User removed successfully',
            'data' => $item
        ];
        return response($response, 200);
    }




    /**
     * searchItems
     */
    public function searchItems(Request $request)
    {
        $fields = $request->validate([
            'search_term' => 'required|string'
        ]);

        $term = $fields['search_term'];
        $items = User::with(['role','status'])->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('email','LIKE','%'.$term.'%');
            $query->orWhereHas('role', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
            $query->orWhereHas('status', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Users search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        $user_statuses = UserStatus::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'roles' => $roles,
                'user_statuses' => $user_statuses,
            ]
        ];
        return response($response, 200);
    }
}
