<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Settings\Profile;
use App\Models\Settings\Role;
use App\Models\Others\Country;
use App\Models\Others\County;
use App\Models\Others\SubCounty;
use App\Models\Others\Ward;
use App\Models\Others\LegalStatus;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::with(['user','country','county','ward'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            // Basic
            'role_id' => 'required|integer',
            'id_number' => 'required|string',
            'country_code' => 'required|string',
            'phone_number' => 'required|string',
            'country_id' => 'required|integer',
            // General
            'legal_status_id' => 'required|integer',
            'company_registration_number' => 'nullable|string',
            'company_establishment_date' => 'nullable|date|before_or_equal:today',
            'kra_pin' => 'nullable|string',
            'postal_address' => 'required|string',
            'physical_address' => 'required|string',
            // Location
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

        $mCurrentUser = auth()->user();
        // $item = Profile::create([
        $item = Profile::updateOrCreate(['user_id' => $mCurrentUser->id],[
            'user_id' => $mCurrentUser->id,
            // Basic
            'role_id' => $fields['role_id'],
            'id_number' => $fields['id_number'],
            'country_code' => $fields['country_code'],
            'phone_number' => $fields['phone_number'],
            'country_id' => $fields['country_id'],
            // General
            'legal_status_id' => $fields['legal_status_id'],
            'company_registration_number' => $fields['company_registration_number'],
            'company_establishment_date' => $fields['company_establishment_date'],
            'kra_pin' => $fields['kra_pin'],
            'postal_address' => $fields['postal_address'],
            'physical_address' => $fields['physical_address'],
            // Location
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
        ]);

        $item = User::findOrFail($mCurrentUser->id);
        $item->role_id = $fields['role_id'];
        $item->save();

        $response = [
            'status' => 'success',
            'message' => 'Profile created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Profile::with(['user','country','county','ward'])->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            // Basic
            'role_id' => 'required|integer',
            'id_number' => 'required|string',
            'country_code' => 'required|string',
            'phone_number' => 'required|string',
            'country_id' => 'required|integer',
            // General
            'legal_status_id' => 'required|integer',
            'company_registration_number' => 'nullable|string',
            'company_establishment_date' => 'nullable|date|before_or_equal:today',
            'kra_pin' => 'nullable|string',
            'postal_address' => 'required|string',
            'physical_address' => 'required|string',
            // Location
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

        $item = Profile::where('id', $id)->update([
            // Basic
            'role_id' => $fields['role_id'],
            'id_number' => $fields['id_number'],
            'country_code' => $fields['country_code'],
            'phone_number' => $fields['phone_number'],
            'country_id' => $fields['country_id'],
            // General
            'legal_status_id' => $fields['legal_status_id'],
            'company_registration_number' => $fields['company_registration_number'],
            'company_establishment_date' => $fields['company_establishment_date'],
            'kra_pin' => $fields['kra_pin'],
            'postal_address' => $fields['postal_address'],
            'physical_address' => $fields['physical_address'],
            // Location
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
        ]);

        // $mCurrentUser = auth()->user();
        // $item = User::findOrFail($mCurrentUser->id);
        // $item = User::findOrFail($mCurrentUser->id);
        // $item->role_id = $fields['role_id'];
        // $item->save();

        $response = [
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Profile::find($id);
        $item->delete();

        $response = [
            'message' => 'Profile removed successfully',
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
        $items = Profile::with(['user','country','county','ward'])->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
            $query->orWhereHas('user', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('email', 'LIKE', '%' . $term . '%');
                });
            });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Profile search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $countries = Country::orderBy('id', 'asc')->get();
        $counties = County::orderBy('id', 'asc')->get();
        $sub_counties = SubCounty::orderBy('id', 'asc')->get();
        $wards = Ward::orderBy('id', 'asc')->get();
        $legal_statuses = LegalStatus::orderBy('id', 'asc')->get();
        $roles = Role::where('type_id', 2)->orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'countries' => $countries,
                'counties' => $counties,
                'sub_counties' => $sub_counties,
                'legal_statuses' => $legal_statuses,
                'wards' => $wards,
                'roles' => $roles,
            ]
        ];
        return response($response, 200);
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
