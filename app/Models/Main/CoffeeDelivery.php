<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Main\CoffeePlot;
use App\Models\Settings\CoffeeSpecies;

class CoffeeDelivery extends Model
{
   use HasUuids, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid();
            }
        });
    }


    /**
    * The attributes that are mass assignable.
    */
    protected $fillable = [
        'id',
        'delivery_number',

        'farmer_id',
        'plot_id',
        'cooperative_society_id',
        'collection_centre_id',
        'coffee_species_id',
        'delivery_date',
        'quantity',
        'lot_id',
        'recorded_by',

        'status_id',

        'created_at',
        'updated_at',
    ];


    /**
     * owner
     */
    public function owner(){
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    /**
     * coffeeSpecies
     */
    public function coffeeSpecies(){
        return $this->hasOne(CoffeeSpecies::class, 'id', 'coffee_species_id');
    }



    /**
     * plot
     */
    public function plot(){
        return $this->hasOne(CoffeePlot::class, 'id', 'plot_id');
    }



}
