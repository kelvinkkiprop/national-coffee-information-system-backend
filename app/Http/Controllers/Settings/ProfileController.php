<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Settings\Profile;
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
        return Profile::with(['user'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:roles',
            'type_id' => 'required|integer',
        ]);

        $item = Profile::create([
            'id' => $fields['id'],
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
        ]);

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
        return Profile::with('type')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:roles,name,'.$id,
            'type_id' => 'required|integer',
        ]);

        $item = Profile::where('id', $id)->update([
            'id' => $fields['id'],
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
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
        $items = Profile::with(['user'])->where(function($query) use($term){
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
        // $sub_counties = SubCounty::orderBy('id', 'asc')->get();
        // $wards = Ward::orderBy('id', 'asc')->get();

        $response =[
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'countries' => $countries,
                'counties' => $counties,
                // 'sub_counties' => $sub_counties,
                // 'wards' => $wards,
            ]
        ];
        return response($response, 200);
    }
}
