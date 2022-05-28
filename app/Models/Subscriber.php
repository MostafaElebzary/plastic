<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Subscriber extends Authenticatable
{

    protected $table = 'subscribers';
    protected $guard_name = 'subscribers';
    protected $guarded = [];

    protected $hidden = ['password'];

    public static function getSubscriber()
    {
        $records = DB::table('subscribers')->orderBy("id", "asc")->get()->toArray();
        return $records;
    }



    public function Points()
    {
        return $this->hasMany(Point::class, 'subscriber_id');
    }


//
}
