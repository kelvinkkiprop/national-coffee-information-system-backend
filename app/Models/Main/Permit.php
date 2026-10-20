<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\User;
use App\Models\Settings\PermitType;
use App\Models\Settings\CoffeeSpecies;
use App\Models\Settings\CoffeeForm;
use App\Models\Others\PermitStatus;
use App\Models\Others\PaymentStatus;

class Permit extends Model
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

        'application_number',
        'type_id',
        'mark',
        'coffee_species_id',
        'coffee_form_id',
        'number_of_bags',
        'vehicle_registration_number',
        'origin',
        'destination',
        'distance',
        'driver_name',
        'driver_id_number',
        'warehouse_receipt_number',
        'date_of_issue',
        'effective_date',
        'duration',
        'expiry_date',
        'payment_id',
        'payment_status_id',
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
     * type
     */
    public function type(){
        return $this->hasOne(PermitType::class, 'id', 'type_id');
    }

    /**
     * paymentStatus
     */
    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'id', 'payment_status_id');
    }

    /**
     * coffeeSpecies
     */
    public function coffeeSpecies(){
        return $this->hasOne(CoffeeSpecies::class, 'id', 'coffee_species_id');
    }

    /**
     * coffeeForm
     */
    public function coffeeForm(){
        return $this->hasOne(CoffeeForm::class, 'id', 'coffee_form_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(PermitStatus::class, 'id', 'status_id');
    }

}
