<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitlistSignup extends Model
{
    protected $fillable = ['project', 'email'];
}
