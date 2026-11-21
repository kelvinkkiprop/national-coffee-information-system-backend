<?php

namespace App\Models\Others;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\SoftDeletes;

class PlotRiskLevel extends Model
{
   use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    */
    protected $fillable = [
        'id',
        'name',
        'alias',

        'created_at',
        'updated_at',
    ];




}
