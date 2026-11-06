<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Settings\CoffeeSpecies;
use App\Models\Main\CoffeeLot;
use App\Models\Main\CoffeeDelivery;

class CoffeeLot extends Model
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
        'user_id',
        'lot_number',

        'transaction_id',
        'parent_lot_id',
        'grade',
        'quantity',
        'stage_id',
        'status_id',

        'created_at',
        'updated_at',
    ];


    /**
     * user
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * stage
     */
    public function stage(){
        return $this->hasOne(CoffeeTransactionStage::class, 'id', 'coffee_species_id');
    }


    /**
     * deliveries
     */
    public function deliveries(){
        return $this->hasMany(CoffeeDelivery::class, 'lot_id', 'id');
    }


    /**
     * parentLots
     */
    public function parentLots(){
        return $this->hasMany(CoffeeLot::class, 'parent_lot_id', 'id');
    }


}
