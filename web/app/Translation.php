<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    const STATUS_SAVED = 0;
    const STATUS_CHANGED = 1;

    protected $table = 'translations';

    protected $fillable = ['status', 'locale' ,'group','key','value'];

    protected $hidden = ['updated_at', 'created_at'];
}
