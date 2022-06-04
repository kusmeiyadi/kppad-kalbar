<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Status extends Model
{
    use SoftDeletes, LogsActivity;

    public function pengaduan(){
        return $this->belongsTo('App\Models\User\Pengaduan');
    }

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['pengaduan.kode','pengaduan.provinsi','pengaduan.slug','pengaduan.pelapor.nama_p','pengaduan.kronologi', 'status'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'pengaduan';
}
