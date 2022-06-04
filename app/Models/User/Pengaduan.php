<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pengaduan extends Model
{
    public function jenis_kasus(){
        return $this->belongsTo('App\Models\Admin\JenisKasus');
    }

    // public function pelapor(){
    //     return $this->hasMany('App\Model\User\Pelapor');
    // }

    public function pelapor(){
        return $this->belongsTo('App\Models\User\Pelapor');
    }

    public function komisioner(){
      return $this->belongsTo('App\Models\Admin\Admin');
    }

    public function bukti(){
        return $this->hasMany('App\Models\User\Bukti');
    }

    public function status(){
        return $this->hasMany('App\Models\User\Status');
    }

    protected $guarded = ['komisioner_id'];
    
}
