<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    public function pengaduan()
    {
        return $this->hasOne('App\Pengaduan');
    }

    protected $fillable = ['nama_kasus'];
}
