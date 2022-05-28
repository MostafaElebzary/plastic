<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{

    protected $appends =['append_title','append_meta_description','append_address'];
    public function getAppendTitleAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->title_en;
        } else {
            return $this->title;
        }
    }
    public function getAppendMetaDescriptionAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->meta_description_en;
        } else {
            return $this->meta_description;
        }
    }
    public function getAppendAddressAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->address_en;
        } else {
            return $this->address;
        }
    }

}
