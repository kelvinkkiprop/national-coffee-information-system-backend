<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\SoftDeletes;

class PermitType extends Model
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

}
