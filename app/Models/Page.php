<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    public  function getPhoto(){
        return url('public/uploads/'.$this->photo);
    }

    protected $appends = ['append_title','append_content'];


    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }

    public function getAppendContentAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->content_en;
        } else {
            return $this->content;
        }
    }

}
