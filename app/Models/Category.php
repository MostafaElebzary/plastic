<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{

    public function parent() {
        return $this->belongsToOne(static::class, 'parent');
    }

    public function children() {
        return $this->hasMany(static::class, 'parent');
    }

    public function parents() {
        return $this->belongsTo(self::class, 'parent');
    }

    public function childrens() {
        return $this->hasMany(self::class, 'id','parent');
    }

    public function getAppendNameAttribute()
    {
        if ($locale = App::getLocale() == "en") {
            return $this->name_en;
        } else {
            return $this->name;
        }
    }

    protected $fillable = ['name'];
}
