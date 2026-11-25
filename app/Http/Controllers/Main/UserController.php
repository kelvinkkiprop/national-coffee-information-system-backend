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
use App\Models\Others\Country;
use App\Models\Others\Region;
use App\Models\Others\County;
use App\Models\Others\SubCounty;
use App\Models\Others\Ward;
use App\Models\Others\LegalStatus;
// Notifications
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;
// import
use App\Imports\ImportRegisteredFarmer;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with(['role','growerType','status'])->orderBy('created_at', 'desc')->paginate(10);
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
        $items = User::with(['role','growerType','status'])->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('id_number','LIKE','%'.$term.'%');
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
        $countries = Country::orderBy('id', 'asc')->get();
        $regions = Region::orderBy('id', 'asc')->get();
        $counties = County::orderBy('id', 'asc')->get();
        $sub_counties = SubCounty::orderBy('id', 'asc')->get();
        $wards = Ward::orderBy('id', 'asc')->get();
        $legal_statuses = LegalStatus::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'roles' => $roles,
                'user_statuses' => $user_statuses,
                'countries' => $countries,
                'counties' => $counties,
                'regions' => $regions,
                'sub_counties' => $sub_counties,
                'legal_statuses' => $legal_statuses,
                'wards' => $wards,
            ]
        ];
        return response($response, 200);
    }


    /**
     * importFarmerItems
     */
    public function importFarmerItems(Request $request)
    {

        $fields = $request->validate([
            'attachment' => 'required|mimes:xlsx,csv,xls'
        ]);

        // // import
        $file = $request['attachment'];
        // // Excel::import(new ImportRegisteredFarmer, $file);
        // $file = $request->file('attachment');
        // Excel::import(new ImportRegisteredFarmer(), $file);

        // $response = [
        //     'status' => 'success',
        //     'message' => 'Registered farmers imported successfully',
        // ];
        // return response($response, 201);

        $path = $file->store('imports', 'local');
        Excel::queueImport(new ImportRegisteredFarmer(), $path, 'local')->allOnQueue('imports');
        // Excel::import(new ImportRegisteredFarmer(), $path, 'local', \Maatwebsite\Excel\Excel::XLSX )->allOnQueue('imports');

        $response = [
            'status' => 'success',
            'message' => 'Farmer data has been queued successfully for import',
            'data' => null
        ];
        return response($response, 201);
    }


    /**
     * profileItem
     */
    public function profileItem(Request $request, string $id)
    {
        $fields = $request->validate([
            // Basic
            'phone' => 'required|string',
            'country_id' => 'required|integer',
            // General
            'legal_status_id' => 'required|integer',
            'id_number' => 'nullable|required_if:legal_status_id,1|string',
            'company_registration_number' => 'nullable|required_unless:legal_status_id,1|string',
            'company_establishment_date' => 'nullable|required_unless:legal_status_id,1|before_or_equal:today',
            'kra_pin' => 'nullable|string',
            'postal_code' => 'required|string',
            'postal_address' => 'required|string',
            // Location
            'region_id' => 'nullable|integer',
            'county_id' => 'nullable|integer',
            'sub_county_id' => 'nullable|integer',
            'ward_id' => 'nullable|integer',
            'location' => 'nullable|string',
            'sub_location' => 'nullable|string',
            'village' => 'nullable|string',
            'town' => 'nullable|string',
            'street_name' => 'nullable|string',
            'building_name' => 'nullable|string',
            'plot_number' => 'nullable|string',
        ]);

        $item = User::updateOrCreate(['id' => $id],[
            // Basic
            'country_id' => $fields['country_id'],
            'phone' => $fields['phone'],
            // General
            'id_number' => $fields['id_number'],
            'legal_status_id' => $fields['legal_status_id'],
            'company_registration_number' => $fields['company_registration_number'],
            'company_establishment_date' => $fields['company_establishment_date'],
            'kra_pin' => $fields['kra_pin'],
            'postal_code' => $fields['postal_code'],
            'postal_address' => $fields['postal_address'],
            // Location
            'region_id' => $fields['region_id'],
            'county_id' => $fields['county_id'],
            'sub_county_id' => $fields['sub_county_id'],
            'ward_id' => $fields['ward_id'],
            'location' => $fields['location'],
            'sub_location' => $fields['sub_location'],
            'village' => $fields['village'],
            'town' => $fields['town'],
            'street_name' => $fields['street_name'],
            'building_name' => $fields['building_name'],
            'plot_number' => $fields['plot_number'],
            'status_id' => 2,//Active
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $item
        ];
        return response($response, 201);
    }

    /**
     * filterCounties
     */
    public function filterCounties($region_id)
    {
        return County::where('region_id', $region_id)->orderBy('name', 'asc')->get();
    }

    /**
     * filterSubCounties
     */
    public function filterSubCounties($county_id)
    {
        return SubCounty::where('county_id', $county_id)->orderBy('name', 'asc')->get();
    }

    /**
     * filterWards
     */
    public function filterWards($sub_county_id)
    {
        return Ward::where('sub_county_id', $sub_county_id)->orderBy('name', 'asc')->get();
    }

}
