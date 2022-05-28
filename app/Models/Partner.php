<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public  function getPhoto(){
        return url('public/uploads/'.$this->photo);
    }
}
