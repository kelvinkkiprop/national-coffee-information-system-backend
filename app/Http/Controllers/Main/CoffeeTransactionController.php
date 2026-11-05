<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Main\CoffeeTransaction;
use App\Models\Main\CoffeeDelivery;
use App\Models\Main\CoffeeLot;
use App\Models\Others\CoffeeTransactionStage;

class CoffeeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoffeeTransaction::with(['user','stage','lot.lots.deliveries.plot'])->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'stage_id' => 'required|integer',
            'grade' => 'required|string',
            'quantity' => 'required|numeric',
            // 'processed_at' => 'required|date',
            // 'shipped_on' => 'required|date',
            'delivery_ids' => 'required_if:stage_id,1|array',
            'delivery_ids.*' => 'required|string|uuid',
            'lot_ids' => 'required_if:stage_id,2,3|array',
            'lot_ids.*' => 'required|string|uuid',
        ]);

        $mCurrentUser = auth()->user();
        $mStage = CoffeeTransactionStage::find($fields['stage_id']);
        if($mStage->id==1){//Aggregation
            $nextNumber = CoffeeTransaction::withTrashed()->count()+1;
            $mTransactionNumber = 'TR/'.$mStage->index_number_prefix.'/'.date('Y').'/'.$nextNumber;
            $item = CoffeeTransaction::create([
                'serial_no' => $mTransactionNumber,
                // 'user_id' => $fields['user_id'],
                'user_id' => $mCurrentUser->id,
                'grade' => $fields['grade'],
                'quantity' => $fields['quantity'],
                // 'processed_at' => $fields['processed_at'],
                // 'shipped_on' => $fields['shipped_on'],
                'stage_id' => $fields['stage_id'],
            ]);

            // DeleteOld
            // CoffeeLot::where('user_id', $userId)->delete();
            // WithSoftDelete
            $nextNumber = CoffeeLot::withTrashed()->count()+1;
            $mLotNumber = $mStage->index_number_prefix.'/LO/'.date('Y').'/'.$nextNumber;
            $item = CoffeeLot::create([
                'transaction_id' => $item->id,
                'cooperative_society_id' => $mCurrentUser->id,
                'lot_number' => $mLotNumber,
                'stage_id' => $mStage->id,
                'quantity' => $fields['quantity'],
                'grade' => $fields['grade'],
            ]);
            $deliveryIds = $request->delivery_ids;
            foreach ($deliveryIds as $deliveryId) {
                CoffeeDelivery::where('id', $deliveryId)->update([
                    'lot_id' => $item->id,
                ]);
            }
        }else{//Milling/Export
            // WithSoftDelete
            $nextNumber = CoffeeTransaction::withTrashed()->count()+1;
            $mTransactionNumber = 'TR/'.$mStage->index_number_prefix.'/'.date('Y').'/'.$nextNumber;
            $item = CoffeeTransaction::create([
                'serial_no' => $mTransactionNumber,
                // 'user_id' => $fields['user_id'],
                'user_id' => $mCurrentUser->id,
                'grade' => $fields['grade'],
                'quantity' => $fields['quantity'],
                // 'processed_at' => $fields['processed_at'],
                // 'shipped_on' => $fields['shipped_on'],
                'stage_id' => $fields['stage_id'],
            ]);
            // WithSoftDelete
            $nextNumber = CoffeeLot::withTrashed()->count()+1;
            $mLotNumber = $mStage->index_number_prefix.'/LO/'.date('Y').'/'.$nextNumber;
            // ParentLot
            $mItem = CoffeeLot::create([
                'transaction_id' => $item->id,
                'cooperative_society_id' => $mCurrentUser->id,
                'lot_number' => $mLotNumber,
                'stage_id' => $fields['stage_id'],
                'grade' => $fields['grade'],
                'quantity' => $fields['quantity'],
            ]);
            // UpdateChildren
            $lotsIds = $request->lot_ids;
            foreach ($lotsIds as $lotId) {
                CoffeeLot::where('id', $lotId)->update([
                    'parent_lot_id' => $mItem->id,
                ]);
            }
        }

        $response = [
            'status' => 'success',
            'message' => 'Transaction created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CoffeeTransaction::with('owner')->find($id);
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

        $item = CoffeeTransaction::where('id', $id)->update([
            'id' => $fields['id'],
            'name' => $fields['name'],
            'type_id' => $fields['type_id'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Transaction updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = CoffeeTransaction::find($id);
        $item->delete();

        $response = [
            'message' => 'Transaction removed successfully',
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
        $items = CoffeeTransaction::with('owner')->where(function($query) use($term){
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
            'message' => 'Transactions search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $stages = CoffeeTransactionStage::orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'stages' => $stages,
            ]
        ];
        return response($response, 200);
    }




    /**
     * filterLotsAndDeliveries
     */
    public function filterLotsAndDeliveries($stage_id)
    {
        $mCurrentUser = auth()->user();
        $coffee_deliveries = null;
        $coffee_lots = null;

        if($stage_id==1){//Aggregation
            $coffee_deliveries = CoffeeDelivery::where('lot_id', null)->orderBy('created_at', 'desc')->get();
            // $coffee_deliveries = CoffeeDelivery::orderBy('created_at', 'desc')->get();
        }elseif($stage_id==2){//Milling
            // $coffee_lots = CoffeeLot::where('parent_lot_id', null)->where('stage_id', 1)->orderBy('created_at', 'desc')->get();
            $coffee_lots = CoffeeLot::where('stage_id', 1)->orderBy('created_at', 'desc')->get();
        }elseif($stage_id==3){//Export
            // $coffee_lots = CoffeeLot::where('transaction_id', null)->where('stage_id', 2)->orderBy('created_at', 'desc')->get();
            $coffee_lots = CoffeeLot::where('stage_id', 2)->orderBy('created_at', 'desc')->get();
        }

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'coffee_deliveries' => $coffee_deliveries,
                'coffee_lots' => $coffee_lots,
            ]
        ];
        return response($response, 200);

    }





    /**
     * traceItem
     */
    public function traceItem(Request $request)
    {
        $fields = $request->validate([
            'serial_number' => 'required|string',
        ]);


        $mSerialNumber=$fields['serial_number'];
        $item = CoffeeTransaction::with(['stage','lot.lots.deliveries.plot'])->where('serial_no', $mSerialNumber)->first();
        if(!$item){
            $response = [
                'status' => 'failed',
                'message' => 'Incorrect serial number or no records found',
                'data' => null
            ];
            return response($response, 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Record retrieved successfully',
            'data' => $item
        ];
        return response($response, 200);
    }


}
