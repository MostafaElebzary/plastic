<?php

namespace App;

use App\Models\Service;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function client()
    {
       return $this->belongsTo(Subscriber::class, 'subscriber_id')->withDefault([
           'name'=>'<span style="color: red">لا يوجد</span>'
       ]);
    }

    public function doctor()
    {
      return  $this->belongsTo(Service::class, 'doctor_id')->withDefault([
          'title'=>'<span style="color: red">لا يوجد</span>'
      ]);
    }

    public function admin()
    {
       return $this->belongsTo(Admin::class, 'admin_id')->withDefault([
           'name'=>'<span style="color: red">لا يوجد</span>'
       ]);
    }
}
