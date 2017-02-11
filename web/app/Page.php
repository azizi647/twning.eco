<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['id','parent','page_id','menupage_id','lang','title','subtitle','text','keywords','link','file','order','status'];

    protected $hidden   = ['updated_at', 'created_at'];

    public function scopeLang($query)
    {
        return $query->where('lang', LaravelLocalization::setLocale());
    }
}
