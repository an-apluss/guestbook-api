<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'message'];
    protected $hidden = ['updated_at'];
}
