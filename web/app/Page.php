<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['parent','page_id','menu_id','lang','title','subtitle','text','keywords','link','file','order','status'];

    protected $hidden   = ['updated_at', 'created_at'];

    public function scopeLang($query)
    {
        /*--*/
        return $query->where('pages.lang', Lang::getLocale());
    }
}
