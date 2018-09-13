<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
