<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// Alerts
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class AuthController extends Controller
{

    /**
    * login
    */
    public function login(Request $request)
    {
       $fields = $request->validate([
           'email' => 'required|string|email',
           'password' => 'required|string'
       ]);

       $user = User::with(['role','status'])->where('email', $fields['email'])->first();
       if(!$user || !Hash::check($fields['password'], $user->password)){
           return response([
               'status' => 'failed',
               'message' => 'Incorrect credentials',
           ],200);

       }

       // token
       $token = $user->createToken('token')->plainTextToken;
       $data = [
           'user' => $user,
           'token' => $token,
       ];

       return response([
           'status' => 'success',
           'message' => 'Login successful',
           'data' => $data
       ],201);
    }


    /**
    * register
    */
    public function register(Request $request)
    {
       $fields = $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|email',
           'password' => 'required|string|confirmed'
       ]);

       $verification_code = rand(1000,9999);
       $user = User::create([
           'name' => $fields['name'],
           'email' => $fields['email'],
           'password' => Hash::make($fields['password']),
           'remember_token' => Str::random(50),
           'verification_code' => $verification_code,
       ]);

        // Email
        $email = $user->email;
        $message = "<div>
            <p>Your new account verification code is: {$verification_code}</p>
            <p>Click the button below to verify your email address.</p>
        </div>";
        $data = array(
            'name' => $user->name,
            'subject' => "Account Registration",
            'url' => '/#/auth/login',
            'btn-text' => 'Login',
            'message' => $message,
            'file' => null,
            'file_name' => null
        );
        Mail::to($email)->send(new AlertMail($data));

       // token
       $token = $user->createToken('token')->plainTextToken;
       $data = [
           'user' => $user,
           'token' => $token,
       ];

       return response([
           'status' => 'success',
           'message' => 'Registration successful',
           'data' => $data
       ],201);
    }




    /**
    * logout
    */
   public function logout(Request $request)
   {
        $user = auth()->user();
        $user->update([
            'is_otp_verified' => false,
            // 'is_otp_used' => true,
        ]);

        //Revoke current session token
        // auth()->user()->tokens()->delete();
        $user->tokens()->delete();

        return response([
            'status' => 'success',
            'message' => 'Logged out successfully',
        ],201);
   }


    /**
    * resetPassword
    */
   public function resetPassword(Request $request)
   {
        $fields = $request->validate([
            'email' => 'required|email'
        ]);

       $user = User::where('email', $fields['email'])->first();
       // return $user;
       if(!$user){
           return response([
               'status' => 'failed',
               'message' => 'User not found'
           ],201);

       }else{

            $email = $request['email'];
            $message =
            "<div>
                <p>We have just received a password reset request for <a href='mailto:{$email}'>{$email}<a></p>
                <p>Please click the button below to reset your password.<p>
                <p>If you didn't request for password reset, no further action is required.</p>
            </div>";

            //Email
            $data = array(
                'name' =>  $user->first_name,
                'subject' => "Password Reset",
                'url' => '/#/auth/recover-password/'.$user->id,
                'btn-text' => 'Update Password',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($email)->send(new AlertMail($data));

           return response([
               'status' => 'success',
               'message' => 'Reset successful, check your email for further instructions'
           ],200);
       }
   }

   // recoverPassword
   public function recoverPassword(Request $request, $id)
   {
       $fields = $request->validate([
           'password' => 'required|string|min:6|confirmed',
       ]);

       $user = User::find($id);
        if(!$user){
            return response([
                'status' => 'failed',
                'message' => 'Failed to update password'
            ],201);

        }else{
            $user->password = Hash::make($fields['password']);
            $user->save();

            return response([
                'status' => 'success',
                'message' => 'Password updated successfully'
            ],201);
        }
   }


    /**
     * changePassword
     */
    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $mCurrentUser = auth()->user();
        $user = User::find($mCurrentUser->id);
        $user->password = Hash::make($fields['password']);
        $user->save();

        return response([
            'status' => 'success',
            'message' => 'Password updated successfully'
        ],200);
    }

}
