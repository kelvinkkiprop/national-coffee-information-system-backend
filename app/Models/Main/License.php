<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
// Add
use App\Models\User;
use App\Models\Main\Payment;
use App\Models\Settings\LicenseType;
use App\Models\Settings\LicenseCategory;
use App\Models\Others\LicenseStatus;
use App\Models\Others\PaymentStatus;

class License extends Model
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
        'category_id',
        'coffee_tasting_expert_certificate',
        'commitment_declaration',
        'date_of_gazettement_intent',
        'date_of_issue',
        'effective_date',
        // 'duration',
        'expiry_date',
        'payment_id',
        'payment_status_id',
        'status_id',

        'created_at',
        'updated_at',
    ];

     /**
    * appends
    */
    protected $appends = [
        'coffee_tasting_expert_certificate_url',
    ];


    /**
    * getters_and_setters
    */
    public function getCoffeeTastingExpertCertificateUrlAttribute()
    {
        $value = $this->coffee_tasting_expert_certificate;
        if(is_null($value)){
            return null;
        }else{
            $path = config('app.asset_url').config('app.paths.file_download');
            return $path.$value;
        }
    }


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
        return $this->hasOne(LicenseType::class, 'id', 'type_id');
    }

    /**
     * paymentStatus
     */
    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'id', 'payment_status_id');
    }

    /**
     * category
     */
    public function category(){
        return $this->hasOne(LicenseCategory::class, 'id', 'category_id');
    }


    /**
     * payment
     */
    public function payment(){
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(LicenseStatus::class, 'id', 'status_id');
    }

}
