<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Slider extends Model
{
    protected $fillable = [
        'title1'
    ];

    public  function getPhoto(){
        return url('public/uploads/'.$this->photo);
    }

    protected $appends = ['append_title1','append_title2'];


    public function getAppendTitle1Attribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->title1_en;
        } else {
            return $this->title1;
        }
    }

    public function getAppendTitle2Attribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->title2_en;
        } else {
            return $this->title2;
        }
    }
}
