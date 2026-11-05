<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\User;
use App\Models\Settings\Committee;
use App\Models\Settings\CommitteeMember;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Committee::with('members')->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:committees',
        ]);

        $item = Committee::create([
            'id' => $fields['id'],
            'name' => $fields['name'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Committee created successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Committee::with('members.user')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|unique:committees,name,'.$id,
        ]);

        $item = Committee::where('id', $id)->update([
            'id' => $fields['id'],
            'name' => $fields['name'],
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Committee updated successfully',
            'data' => $item
        ];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Committee::find($id);
        $item->delete();

        $response = [
            'message' => 'Committee removed successfully',
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
        $items = Committee::with('members')->where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
        })->get();

        $response = [
            'status' => 'success',
            'message' => 'Committees search complete',
            'data' => $items
        ];

        return response($response, 200);
    }

    /**
     * unpaginatedItems
     */
    public function unpaginatedItems()
    {
        $users = User::with('role')->whereHas('role', function ($query) {
            $query->where('type_id', 1);
        })->orderBy('id', 'asc')->get();

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'users' => $users,
            ]
        ];
        return response($response, 200);
    }




    /**
     * addMember
     */
    public function addMember(Request $request)
    {
        $fields = $request->validate([
            'committee_id' => 'required|integer',
            'user_id' => 'required|string',
        ]);

        $item = CommitteeMember::updateOrCreate([
            'committee_id' => $fields['committee_id'],
            'user_id' => $fields['user_id'],
        ],[
            'committee_id' => $fields['committee_id'],
            'user_id' => $fields['user_id'],
        ]);

        $item = Committee::with(['members.user'])->find($fields['committee_id']);
        return response([
            'status' => 'success',
            'message' => 'Member added successfully',
            'data' => $item
        ],201);
    }

    /**
     * removeMember
     */
    public function removeMember($id)
    {
        $item = CommitteeMember::find($id);
        $item->delete();

        $item = Committee::with(['members'])->find($item->committee_id);
        $response =[
            'message' => 'Member removed successfully',
            'data' => $item
        ];
        return response($response, 201);
    }


}
