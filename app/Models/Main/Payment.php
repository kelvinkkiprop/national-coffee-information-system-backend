<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Other\PaymentStatus;

class Payment extends Model
{
    use HasUuids, SoftDeletes;


    /**
    * The attributes that are mass assignable.
    */
    protected $fillable = [
        'id',
        'user_id',
        'booking_id',
        'amount',
        'convenience_fee',
        'currency',
        'payment_method',
        'pesaflow_ref_no',
        'pesaflow_invoice_number',
        'pesaflow_invoice_link',
        'status_id',

        'secure_hash',
        'service_id',
        'picture_url',
        'notification_url',
        'callback_url_on_success',
        'api_client_id',
        'format',
        'account_number',
        'settled_at',
    ];


    /**
     * appends
     */
    protected $appends = [
        'grand_total',
    ];


    /**
     * getGrandTotalAttribute
     */
    public function getGrandTotalAttribute()
    {
        $value = $this->amount + $this->convenience_fee;
        return $value;
    }



    /**
     * user
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(PaymentStatus::class, 'id', 'status_id');
    }

}
