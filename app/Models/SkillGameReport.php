<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SkillGameReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question','answer','comment','date','user_id'
    ];
}
