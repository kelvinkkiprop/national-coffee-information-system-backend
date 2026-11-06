<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\CoffeeDelivery;
use App\Models\Main\CoffeePlot;
use App\Models\Settings\CoffeeSpecies;

class CoffeeDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoffeeDelivery::with(['user','coffeeSpecies'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'farmer_id' => 'required|string',
            'plot_id' => 'required|string',
            // 'cooperative_society_id' => 'required|string',
            // 'collection_centre_id' => 'required|string',
            'coffee_species_id' => 'required|integer',
            'harvest_date' => 'required|date',
            'harvest_season' => 'required|string',
            'delivery_date' => 'required|date|after_or_equal:harvest_date',
            'number_of_bags' => 'required|integer',
            'quantity' => 'required|numeric',
            'price_per_kg' => 'required|numeric',
        ]);

        $mCurrentUser = auth()->user();
        // WithSoftDelete
        $nextNumber = CoffeeDelivery::withTrashed()->count()+1;
        $mDeliveryNumber = 'DLV-'.date('Y').'-'.$nextNumber;
        $item = CoffeeDelivery::create([
            'delivery_number' => $mDeliveryNumber,
            'user_id' => $mCurrentUser->id,
            'farmer_id' => $fields['farmer_id'],
            'plot_id' => $fields['plot_id'],
            // 'cooperative_society_id' => $fields['cooperative_society_id'],
            // 'collection_centre_id' => $fields['collection_centre_id'],
            'coffee_species_id' => $fields['coffee_species_id'],
            'harvest_date' => $fields['harvest_date'],
            'harvest_season' => $fields['harvest_season'],
            'delivery_date' => $fields['delivery_date'],
            'number_of_bags' => $fields['number_of_bags'],
            'quantity' => $fields['quantity'],
            'price_per_kg' => $fields['price_per_kg'],
            'recorded_by' => $mCurrentUser->id
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Delivery captured successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CoffeeDelivery::with('user','farmer','coffeeSpecies','plot','lot')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:CoffeePlots,name,'.$id,
            'type_id' => 'required|integer',
        ]);

        $item = CoffeeDelivery::where('id', $id)->update([
            'id' => $fields['id'],
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Delivery updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = CoffeeDelivery::find($id);
        $item->delete();

        $response = [
            'message' => 'Delivery removed successfully',
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
        $items = CoffeeDelivery::with('user')->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
            $query->orWhereHas('user', function($q) use ($term) {
                $q->where(function($q) use ($term) {
                    $q->where('name', 'LIKE', '%' . $term . '%');
                    $q->orWhere('alias', 'LIKE', '%' . $term . '%');
                });
            });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Deliveries search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $farmers = User::where('role_id',10)->orderBy('id', 'asc')->get();
        $coffee_plots = CoffeePlot::with(['coffeeSpecies'])->orderBy('id', 'asc')->get();
        $coffee_species = CoffeeSpecies::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'farmers' => $farmers,
                'coffee_plots' => $coffee_plots,
                'coffee_species' => $coffee_species,
            ]
        ];
        return response($response, 200);
    }




    /**
     * filterFarmerPlots
     */
    public function filterFarmerPlots($farmer_id)
    {
        return CoffeePlot::where('owner_id', $farmer_id)->orderBy('size', 'asc')->get();
    }

}
