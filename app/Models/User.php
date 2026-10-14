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
use App\Models\Settings\Role;
use App\Models\Settings\Profile;
use App\Models\Settings\UserStatus;

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
        'email',
        'password',
        'role_id',
        'status_id',
        'remember_token',
        'verification_code',


        'otp_code',
        'otp_expires_at',
        'otp_verified',
        'otp_used',
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
     * profile
     */
    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

}
