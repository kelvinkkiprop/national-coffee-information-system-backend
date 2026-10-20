<?php

namespace App\Models\Others;

use Illuminate\Database\Eloquent\Model;
// Add
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use SoftDeletes;
}
