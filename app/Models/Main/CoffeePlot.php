<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Settings\CoffeeSpecies;

class CoffeePlot extends Model
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
        'owner_id',
        'size',
        'soil_profile',
        'number_of_coffee_trees',
        'coffee_species_id',
        'cooperative_society_id',
        'country_id',
        'county_id',
        'latitude',
        'longitude',
        'geo_json_geometry',
        'greater_than_4ha',
        'deforestation_free',
        'legal_compliance_status_id',
        'status_id',

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'greater_than_4ha' => 'boolean',
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

}
