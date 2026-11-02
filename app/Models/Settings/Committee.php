<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use App\Models\User;
use App\Models\Settings\CommitteeMember;

class Committee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'alias'
    ];


        /**
    * appends
    */
    protected $appends = [
        'total_members',
    ];



    /**
    * getters_and_setters
    */
    public function getTotalMembersAttribute()
    {
        $value = $this->id;
        if(is_null($value)){
            return null;
        }else{
            return CommitteeMember::where('committee_id', $value)->count();
        }
    }


    /**
     * members
     */
    public function members(){
        return $this->hasMany(CommitteeMember::class, 'committee_id', 'id');
    }

}
