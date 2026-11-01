<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
// use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\Main\DealershipCategory;

class UserDealershipService extends Model
{
    // use HasUuids, SoftDeletes;
    use HasUuids;

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
        'category_id',

        'created_at',
        'updated_at',
    ];


        /**
    * appends
    */
    protected $appends = [
        'name',
    ];


    /**
    * getters_and_setters
    */
    public function getNameAttribute()
    {
        $value = $this->category_id;
        if(is_null($value)){
            return null;
        }else{
            return DealershipCategory::find($value)->name;
        }
    }


    /**
     * category
     */
    public function category(){
        return $this->hasOne(DealershipCategory::class, 'id', 'category_id');
    }

}
