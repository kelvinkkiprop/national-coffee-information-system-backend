<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use Illuminate\Support\Facades\Http;
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
        return CoffeePlot::with(['farmer','coffeeSpecies','riskLevel'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'farmer_id' => 'required|string',
            'size' => 'required|numeric',
            'soil_profile' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'cooperative_society_id' => 'nullable|string',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'geo_json_geometry' => 'nullable|string',
        ]);

        $item = CoffeePlot::create([
            'farmer_id' => $fields['farmer_id'],
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
        return CoffeePlot::with('farmer')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'farmer_id' => 'required|string',
            'size' => 'required|numeric',
            'soil_profile' => 'nullable|string',
            'coffee_species_id' => 'required|integer',
            'cooperative_society_id' => 'nullable|string',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'geo_json_geometry' => 'nullable|string',
        ]);

        $item = CoffeePlot::where('id', $id)->update([
            'farmer_id' => $fields['farmer_id'],
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

        $mCurrentUser = auth()->user();
        $mCurrentUser->loadMissing('role');

        $term = $fields['search_term'];
        $items = CoffeePlot::with(['farmer','coffeeSpecies','riskLevel'])->when($mCurrentUser->role?->type_id != 1, fn($q) =>
                $q->where('user_id', $mCurrentUser->id)
            )->where(function($query) use($term){
            $query->where('size','LIKE','%'.$term.'%');
            $query->orWhere('tree_count','LIKE','%'.$term.'%');
            $query->orWhere('object_id','LIKE','%'.$term.'%');
            $query->orWhere('farm_id','LIKE','%'.$term.'%');
            $query->orWhereHas('farmer', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('email', 'LIKE', '%' . $term . '%');
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





    /**
     * syncGisCoffeePlotItems
     */
    public function syncGisCoffeePlotItems(Request $request)
    {
        $fields = $request->validate([
            'category_id' => 'required|integer',
            'data_source_id' => 'required|integer',
        ]);
        $mCategoryId = $fields['category_id'];
        $mDataSourceId = $fields['data_source_id'];

        $mToken = $this->authGIS();
        if(!$mToken){
            $response = [
                'status' => 'failed',
                'message' => 'Failed to generate token',
            ];
            return response($response, 200);
        }
        // $response = [
        //     'status' => 'failed',
        //     'message' => 'Token generated successfully!',
        //     'data' => $mToken,
        // ];
        // return response($response, 201);

        // TODO
        // CoffeePlot::truncate();
        CoffeePlot::where('data_source_id', $mDataSourceId)->delete();
        $base_url = config('app.ARC_GIS.base_url');
        $url=null;
        if($mDataSourceId==1){//GPS Surveys
            if($mCategoryId==1){//GreaterThan4ha
                $url = $base_url."/server/rest/services/Kenya_Coffee_Geospatial_Data_Map/MapServer/5/query"; //GreaterThan4H
            }else{//LessThan4ha
                $url = $base_url."/server/rest/services/Kenya_Coffee_Geospatial_Data_Map/MapServer/4/query"; //LessThan4H
            }

        }elseif($mDataSourceId==2){//Remote Sensing
            if($mCategoryId==1){//GreaterThan4ha
                $url = $base_url."/server/rest/services/Kenya_Coffee_Geospatial_Data_Map/MapServer/9/query"; //GreaterThan4H
            }else{//LessThan4ha
                $url = $base_url."/server/rest/services/Kenya_Coffee_Geospatial_Data_Map/MapServer/10/query"; //GreaterThan4H
            }
        }else{
            $response = [
                'status' => 'failed',
                'message' => 'Unknown data source',
            ];
            return response($response, 201);
        }

        // Get
        $response = Http::withOptions([
            'verify' => false,
        ])->accept('application/json')->get($url, [
            'where'    => 'OBJECTID>0',
            'f'        => 'json',
            'outFields'=> '*',
            'token'    => $mToken,
        ]);
        // return $response;
        $mData = $response->json();
        $mFeatures=$mData['features'];
        $mRows=[];
        foreach($mFeatures as $mFeature) {
            $mAttributes = $mFeature['attributes'];
            $farmerId = $mAttributes['uuid'];
            $mGeometry   = $mFeature['geometry'];
            // return $mGeometry['rings'][0];
            // $mRings = $mGeometry['rings'][0];

            $mGeoJsonGeometry = null;
            if(isset($mGeometry['rings'])) {
                // Polygon
                $mGeoJsonGeometry = [
                    'type' => 'Polygon',
                    'coordinates' => $mGeometry['rings'],
                ];
            }elseif(isset($mGeometry['x'], $mGeometry['y'])) {
                // Point
                $mGeoJsonGeometry = [
                    'type' => 'Point',
                    'coordinates' => [
                        $mGeometry['x'],
                        $mGeometry['y'],
                    ],
                ];
            }else{
                // Unsupported_geometry
                continue;
            }

            $mRows[] = [
                'farmer_id' => $farmerId,
                'object_id' => $mAttributes['OBJECTID'],//GIS
                'farm_id' => $mAttributes['fid'],//GIS
                'size' => $mAttributes['area_ha'],
                'tree_count' => $mAttributes['TreeCount'],
                // 'latitude' => $mAttributes['latitude'] ?? null,
                // 'longitude' => $mAttributes['longitude'] ?? null,
                'data_source_id' => $mDataSourceId,
                'risk_level_id' => $mAttributes['risk_score'] ?? null,
                'geo_json_geometry' => json_encode($mGeoJsonGeometry),
            ];
        }

        if(!empty($mRows)) {
            // Atomic_UPSERT_prevents_duplicates_and_race_conditions
            CoffeePlot::upsert($mRows,  ['object_id', 'farm_id'], [
                'farmer_id',
                // 'object_id',
                // 'farm_id',
                'size',
                'tree_count',
                'data_source_id',
                // 'latitude',
                // 'longitude',
                'risk_level_id',
                'geo_json_geometry',
            ]);
        }

        $response = [
            'status' => 'success',
            'message' => count($mRows).' plots synchronized successfully',
        ];
        return response($response, 201);

    }


    /**
     * authGIS
     */
    public function authGIS()
    {
        // Shared
        $base_url = config('app.ARC_GIS.base_url');
        $username = config('app.ARC_GIS.username');
        $password = config('app.ARC_GIS.password');
        $url = $base_url."/portal/sharing/rest/generateToken";

        $response = Http::withOptions([
            'verify' => false, //OnDevOnly
        ])
        ->withHeaders([
            'Content-Type' => 'application/ecmascript',
        ])
        ->asForm() // still sends body as x-www-form-urlencoded
        ->acceptJson()
        ->post($url, [
            'username'   => $username,
            'password'   => $password,
            'client'     => 'referer',
            'f'          => 'json',
            'expiration' => 60,
            'referer'    => $base_url,
        ]);

        $mData = $response->json();
        $mToken = $mData['token'];
        return $mToken;
    }

}
