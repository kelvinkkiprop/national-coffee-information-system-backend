<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\CoffeePlot;
use App\Models\Main\UserDealershipService;
use App\Models\Settings\CoffeeSpecies;
use App\Models\Others\County;
use App\Models\Others\Country;

class CoffeePlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoffeePlot::with(['owner','coffeeSpecies'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'owner_id' => 'required|string',
            'size' => 'required|numeric',
            'soil_profile' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'cooperative_society_id' => 'nullable|integer',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'geo_json_geometry' => 'nullable|string',
        ]);

        $item = CoffeePlot::create([
            'owner_id' => $fields['owner_id'],
            'size' => $fields['size'],
            'soil_profile' => $fields['soil_profile'],
            'coffee_species_id' => $fields['coffee_species_id'],
            'cooperative_society_id' => $fields['cooperative_society_id'],
            'country_id' => $fields['country_id'],
            'county_id' => $fields['county_id'],
            'latitude' => $fields['latitude'],
            'longitude' => $fields['longitude'],
            'greater_than_4ha' => $fields['size']>4 ? true : false,
            'geo_json_geometry' => $fields['geo_json_geometry'],
            // 'geo_json_geometry' => json_encode($fields['geo_json_geometry']),
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Plot created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CoffeePlot::with('owner')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'owner_id' => 'required|string',
            'size' => 'required|numeric',
            'soil_profile' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'cooperative_society_id' => 'nullable|integer',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'geo_json_geometry' => 'nullable|string',
        ]);

        $item = CoffeePlot::where('id', $id)->update([
            'owner_id' => $fields['owner_id'],
            'size' => $fields['size'],
            'soil_profile' => $fields['soil_profile'],
            'coffee_species_id' => $fields['coffee_species_id'],
            'cooperative_society_id' => $fields['cooperative_society_id'],
            'country_id' => $fields['country_id'],
            'county_id' => $fields['county_id'],
            'latitude' => $fields['latitude'],
            'longitude' => $fields['longitude'],
            'greater_than_4ha' => $fields['size']>4 ? true : false,
            'geo_json_geometry' => $fields['geo_json_geometry'],
            // 'geo_json_geometry' => json_encode($fields['geo_json_geometry']),
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Plot updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = CoffeePlot::find($id);
        $item->delete();

        $response = [
            'message' => 'Plot removed successfully',
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
        $items = CoffeePlot::with('owner')->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
            $query->orWhereHas('owner', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Plots search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        // $coffee_plots = CoffeePlot::orderBy('id', 'asc')->limit(2)->get();
        $coffee_plots = CoffeePlot::with(['coffeeSpecies'])->get();
        $users = User::orderBy('name', 'asc')->get();
        $coffee_species = CoffeeSpecies::orderBy('id', 'asc')->get();
        $counties = County::orderBy('id', 'asc')->get();
        $countries = Country::where('id',110)->orderBy('id', 'asc')->get();//Kenya
        $cooperative_societies = User::whereIn('id', function ($query) {
            $query->select('user_id')->from('user_dealership_services')->where('category_id', 13);
        })->orderBy('name', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'coffee_plots' => $coffee_plots,
                'users' => $users,
                'coffee_species' => $coffee_species,
                'counties' => $counties,
                'cooperative_societies' => $cooperative_societies,
                'countries' => $countries,
            ]
        ];
        return response($response, 200);
    }

}
