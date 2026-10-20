<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// Notifications
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

       $user = User::with(['role','status','profile'])->where('email', $fields['email'])->first();
       if(!$user || !Hash::check($fields['password'], $user->password)){
           return response([
               'status' => 'failed',
               'message' => 'Incorrect credentials',
           ],200);

       }

        // OTP
        $code = rand(100000, 999999);
        $item = User::where('id', $user->id)->update([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(5),
            'otp_used' => false,
            'otp_verified' => false,
        ]);
        $message = "Your OTP is {$code}";
        $data = array(
            'name' => $user->name,
            'subject' => "Verify OTP",
            'url' => config('app.url').'/auth/verify-otp',
            'btn-text' => 'Verify',
            'message' => "<div>{$message}</div>",
            'file' => null,
            'file_name' => null
        );
        Mail::to($user->email)->send(new AlertMail($data));

       // token
       $token = $user->createToken('token')->plainTextToken;
       $data = [
           'user' => $user,
           'token' => $token,
       ];

       return response([
           'status' => 'success',
        //    'message' => 'Login successful',
           'message' => 'An OTP has been sent to '.$user->email,
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

       $verification_code = rand(10000,99999);
       $otp_code = rand(10000,99999);
       $user = User::create([
           'name' => $fields['name'],
           'email' => $fields['email'],
           'password' => Hash::make($fields['password']),
           'remember_token' => Str::random(50),
           'verification_code' => $verification_code,
           'otp_code' => $otp_code,
       ]);

        // Email
        $email = $user->email;
        $message = "<div>
            <p>Your new account verification code is {$verification_code} and {$otp_code}</p>
            <p>Click the button below to verify your email address.</p>
        </div>";
        $data = array(
            'name' => $user->name,
            'subject' => "Account Registration",
            'url' => '/auth/login',
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



   /**
    * verifyEmail
    */
   public function verifyEmail(Request $request)
   {
       $fields = $request->validate([
           'verification_code' => 'required|integer',
       ]);

       $user = auth()->user();
       $token = $user->createToken('token')->plainTextToken;
       $verification_code = $fields['verification_code'];

       if($verification_code!=$user->verification_code){
            return response([
                'status' => 'failed',
                'message' => 'Incorrect verification code'
            ],201);

       }else{
            $item = User::with('role')->find($user->id);
            $item->verification_code = $verification_code;
            $item->email_verified_at = date('Y-m-d H:i:s');
            $item->save();

            $data = [
                'user' => $item,
                'token' => $token,
            ];

            return response([
                'status' => 'success',
                'message' => 'Verification successful',
                'data' => $data
            ],201);

       }

   }

    /**
    * resendVerificationCode
    */
    public function resendVerificationCode()
    {
        $user = auth()->user();
        $verification_code = rand(100000, 999999);

        $item = User::find($user->id);
        $item->verification_code = $verification_code;
            //Email
            $email = $user->email;
            $message = "<div>
                <p>Your  verification code is: {$verification_code}</p>
                <p>Click the button below to verify your email address.</p>
            </div>";

            // Email
            $data = array(
                'name' => $user->name,
                'subject' => "Verification Code",
                // 'url' => '/#/account/verify-email',
                'url' => config('app.url').'/#/account/verify-email',
                'btn-text' => 'Verify',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($email)->send(new AlertMail($data));

        $item->save();

        //token
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $item,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'Code resent successfully',
            'data' => $data
        ], 201);

    }




    /**
     * verifyOtp
     */
    public function verifyOtp(Request $request)
    {
        $fields = $request->validate([
            'otp_code' => 'required|integer',
        ]);

        $otp_code = $fields['otp_code'];
        $mCurrentUser = auth()->user();

        $item = User::where('id', $mCurrentUser->id)->where('otp_code', $otp_code)->where('otp_used', false)->where('otp_expires_at', '>', now())->first();
        if(!$item){
            return response([
                'status' => 'failed',
                'message' => 'Invalid OTP'
            ],201);
        }

        $item->update([
            'otp_verified' => true,
            'otp_used' => true,
        ]);

        // token
       $mUser = User::with(['role', 'status'])->find($mCurrentUser->id);
       $token = $mUser->createToken('token')->plainTextToken;
       $data = [
           'user' => $mUser,
           'token' => $token,
       ];
       return response([
           'status' => 'success',
            'message' => 'OTP verified successfully',
           'data' => $data
       ],201);

    }

    /**
    * resendOTP
    */
    public function resendOTP()
    {
        $user = auth()->user();
        $otp_code = rand(100000, 999999);

        $item = User::find($user->id);
        $item->otp_code = $otp_code;
         $item->otp_expires_at = now()->addMinutes(5);
         $item->otp_used = false;
         $item->otp_verified = false;
            //Email
            $email = $user->email;
            $message = "<div>
                <p>Your new OTP is: {$otp_code}</p>
                <p>Click the button below to verify your email address.</p>
            </div>";

            // Email
            $data = array(
                'name' => $user->name,
                'subject' => "Resent OTP",
                'url' => config('app.url').'/account/verify-otp',
                'btn-text' => 'Verify',
                'message' => $message,
                'file' => null,
                'file_name' => null
            );
            Mail::to($email)->send(new AlertMail($data));

        $item->save();

        //token
        $token = $user->createToken('token')->plainTextToken;
        $data = [
            'user' => $item,
            'token' => $token,
        ];
        return response([
            'status' => 'success',
            'message' => 'OTP resent successfully',
            'data' => $data
        ], 201);

    }


}
