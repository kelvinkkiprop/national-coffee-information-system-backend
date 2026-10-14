<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\User;
use App\Models\Others\Country;
use App\Models\Others\County;
use App\Models\Others\Ward;

class Profile extends Model
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
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'id_number',
        'phone_number',

        'country_id',
        'county_id',
        'sub_county_id',
        'ward_id',
        'postal_address',
        'physical_address',

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
     * country
     */
    public function country(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    /**
     * county
     */
    public function county(){
        return $this->hasOne(County::class, 'id', 'county_id');
    }

    /**
     * ward
     */
    public function ward(){
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }

}
