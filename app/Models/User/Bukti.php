<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    public function pengaduan()
    {
      return $this->belongsTo('App\Models\User\Pengaduan');
    }

    protected $guarded = [];
}
