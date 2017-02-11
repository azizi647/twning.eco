<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['menu_id','parent_id', 'order','status','title','description','type','menu_type','status','lang'];

    protected $hidden = ['updated_at', 'created_at'];

    public function scopeLang($query)
    {
        return $query->where('menus.lang', Lang::getLocale());
    }
}
