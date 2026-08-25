<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use SoftDeletes;
}
