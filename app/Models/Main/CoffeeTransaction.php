<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Others\CoffeeTransactionStage;

class CoffeeTransaction extends Model
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
        'serial_no',

        'grade',
        'quantity',
        'processed_at',
        'shipment_ref',
        'buyer_name',
        'shipped_on',
        'stage_id',

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
        return $this->hasOne(CoffeeTransactionStage::class, 'id', 'stage_id');
    }


}
