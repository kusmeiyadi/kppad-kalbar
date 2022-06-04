<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    // public function pengaduan(){
    //     return $this->belongsTo('App\Model\User\Pengaduan');
    // }

    public function pengaduan(){
        return $this->hasOne('App\Models\User\Pengaduan');
    }

    public function korban(){
        return $this->hasMany('App\Models\User\Korban');
    }

    public function terlapor(){
        return $this->hasMany('App\Models\User\Terlapor');
    }

    protected $guarded = [];

    public static function boot(){
        parent::boot();
        self::deleting(function($pelapor){
            $pelapor->pengaduan()->each(function($pengaduan){
                $pengaduan->delete();
            });
        });
    }
}
