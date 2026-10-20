<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Settings\RoleType;

class Role extends Model
{
    use SoftDeletes;

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
     * type
     */
    public function type(){
        return $this->hasOne(RoleType::class, 'id', 'type_id');
    }

}
