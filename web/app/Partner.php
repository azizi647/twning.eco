<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> origin/master
=======

>>>>>>> origin/master

class Partner extends Model
{
    protected $table = 'partners';

    protected $fillable = ['partner_id','lang','title','image','order','status'];

    protected $hidden   = ['updated_at', 'created_at'];

    public function scopeLang($query)
    {
        return $query->where('lang', Lang::getLocale());
    }
}
