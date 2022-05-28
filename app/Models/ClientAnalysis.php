<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAnalysis extends Model
{
    protected $guarded =[];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }

    public function getFile()
    {
        return url('public/uploads/' . $this->file);
    }
}
