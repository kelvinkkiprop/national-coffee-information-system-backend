<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Settings\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:roles',
        ]);

        $item = Role::create([
            'id' => $fields['id'],
            'name' => $fields['name'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Role created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Role::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:roles,name,'.$id,
        ]);

        $item = Role::where('id', $id)->update([
            'id' => $fields['id'],
            'name' => $fields['name'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Role updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Role::find($id);
        $item->delete();

        $response =[
            'message' => 'Role removed successfully',
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
        $items = Role::where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
            // $query->orWhereHas('status', function($q) use ($term) {
            //     $q->where(function($q) use ($term) {
            //         $q->where('name', 'LIKE', '%' . $term . '%');
            //         $q->orWhere('alias', 'LIKE', '%' . $term . '%');
            //     });
            // });
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Roles search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        // $venue_statuses = VenueStatus::orderBy('id', 'asc')->get();

        // $response =[
        //     'status' => 'success',
        //     'message' => 'Data retrieved successfully',
        //     'data' => [
        //         'venue_statuses' => $venue_statuses,
        //     ]
        // ];
        // return response($response, 200);
    }
}
