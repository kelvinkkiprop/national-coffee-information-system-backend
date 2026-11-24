<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Add
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
// Add
use App\Models\Main\UserDealershipService;
use App\Models\Settings\Role;
use App\Models\Settings\Profile;
use App\Models\Settings\CommitteeMember;
use App\Models\Others\UserStatus;
use App\Models\Others\DealerRegistrationStatus;
use App\Models\Others\GrowerType;
use App\Models\Others\Country;
use App\Models\Others\County;
use App\Models\Others\SubCounty;
use App\Models\Others\Ward;

class User extends Authenticatable
{

    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasUuids, SoftDeletes;

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
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'id_number',
        'password',
        'role_id',
        'status_id',
        'remember_token',
        'verification_code',

        'otp_code',
        'otp_expires_at',
        'otp_verified',
        'otp_used',

        'country_id',
        'legal_status_id',
        'company_registration_number',
        'company_establishment_date',
        'kra_pin',
        'postal_code',
        'postal_address',
        'region_id',
        'county_id',
        'sub_county_id',
        'ward_id',
        'location',
        'sub_location',
        'village',
        'town',
        'street_name',
        'building_name',
        'plot_number',
        'gender_id',

        'grower_type_id',
        'dealership_id',
        'dealership_registration_status_id',

        // Temporary
        'county_name',
        'sub_county_name',
        'ward_name',
        'society_name',
        'factory',
        'grower_code',
        'estate_name',
        'estate_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * role
     */
    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * status
     */
    public function status(){
        return $this->hasOne(UserStatus::class, 'id', 'status_id');
    }

    /**
     * dealerRegistrationStatus
     */
    public function dealerRegistrationStatus(){
        return $this->hasOne(DealerRegistrationStatus::class, 'id', 'dealership_registration_status_id');
    }

    /**
     * growerType
     */
    public function growerType(){
        return $this->hasOne(GrowerType::class, 'id', 'grower_type_id');
    }

    /**
     * dealershipServices
     */
    public function dealershipServices(){
        return $this->hasMany(UserDealershipService::class, 'user_id', 'id');
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
     * subCounty
     */
    public function subCounty(){
        return $this->hasOne(SubCounty::class, 'id', 'sub_county_id');
    }

    /**
     * ward
     */
    public function ward(){
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }

    /**
     * committees
     */
    public function committees(){
        return $this->hasMany(CommitteeMember::class, 'user_id', 'id');
    }

}
