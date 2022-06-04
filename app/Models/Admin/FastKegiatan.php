<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FastKegiatan extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','start','end','color'];
}
