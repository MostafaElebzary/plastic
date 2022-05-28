<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Service extends Authenticatable
{
    use Notifiable;

    protected $guard_name = 'doctors';

    protected $guarded = [];

    protected $hidden = ['password'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
