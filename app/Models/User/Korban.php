<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Korban extends Model
{
    public function pelapor(){
      return $this->belongsTo('App\Models\User\Pelapor');
    }

    protected $guarded = [];
}
