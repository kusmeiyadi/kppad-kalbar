<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    protected $table ="regulasi";
    protected $fillable = ['deskripsi','slug','kategori','file','upload_by'];
}
