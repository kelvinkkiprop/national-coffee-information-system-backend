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
            'role_id' => 'required|integer',
            'id_number' => 'required|string',
            'phone_number' => 'required|string',

            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'sub_county_id' => 'required|integer',
            'ward_id' => 'required|integer',
            'postal_address' => 'required|string',
            'physical_address' => 'required|string',
        ]);

        $mCurrentUser = auth()->user();
        // $item = Profile::create([
        $item = Profile::updateOrCreate(['user_id' => $mCurrentUser->id],[
            'id_number' => $fields['id_number'],
            'phone_number' => $fields['phone_number'],
            'country_id' => $fields['country_id'],
            'county_id' => $fields['county_id'],
            'sub_county_id' => $fields['sub_county_id'],
            'ward_id' => $fields['ward_id'],
            'postal_address' => $fields['postal_address'],
            'physical_address' => $fields['physical_address'],
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
            'role_id' => 'required|integer',
            'id_number' => 'required|string',
            'phone_number' => 'required|string',

            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'sub_county_id' => 'required|integer',
            'ward_id' => 'required|integer',
            'postal_address' => 'required|string',
            'physical_address' => 'required|string',
        ]);

        $item = Profile::where('id', $id)->update([
            'id_number' => $fields['id_number'],
            'phone_number' => $fields['phone_number'],
            'country_id' => $fields['country_id'],
            'county_id' => $fields['county_id'],
            'sub_county_id' => $fields['sub_county_id'],
            'ward_id' => $fields['ward_id'],
            'postal_address' => $fields['postal_address'],
            'physical_address' => $fields['physical_address'],
        ]);

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

        $response =[
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
        $roles = Role::where('type_id', 2)->orderBy('id', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'countries' => $countries,
                'counties' => $counties,
                'sub_counties' => $sub_counties,
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
