<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\Permit;
use App\Models\Main\License;
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
            'licenses' => License::count(),
            'permits' => Permit::count(),
            'revenues' => Payment::where('status_id',2)->sum('amount'),
            'recent_users' => User::with(['role','status'])->orderBy('id', 'desc')->limit(5)->get(),
            // Other
            'my_licenses' => License::where('user_id', $mCurrentUser->id)->count(),
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


    /**
     * formsAndResourcesItem
     */
    public function formsAndResourcesItem()
    {
        $forms = [
            ['id'=>1, 'type_id'=>1, 'name'=>'Self-Declaration Form', 'filename'=>'FORM M - SELF-DECLARATION FORM.pdf'],
            ['id'=>2, 'type_id'=>1, 'name'=>'Notification of Coffee Events', 'filename'=>'FORM H - NOTIFICATION OF COFFEE EVENTS.pdf'],
        ];
        $other_resources = [
            ['id'=>1, 'type_id'=>2, 'name'=>'User Manual', 'filename'=>'USER MANUAL.pdf'],
        ];

        $data = [
            'forms' => $forms,
            'other_resources' => $other_resources,
        ];

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ];
        return response($response, 201);
    }

    /**
    * downloadFormsAndResourcesItemItem
    */
    public function downloadFormsAndResourcesItemItem(string $type_id, string $filename)
    {
        if($type_id==1){ //Forms
            $filepath = public_path('downloads/Forms/'.$filename);
            return response()->file($filepath);
            // return Response::download($filepath);
        }elseif($type_id==2){
            $filepath = public_path('downloads/OtherResources/'.$filename);
            return response()->file($filepath);
            // return Response::download($filepath);
        }
    }

}
