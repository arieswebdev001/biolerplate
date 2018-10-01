<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $casts = [
        'level_data'=>'object'
    ];
}
