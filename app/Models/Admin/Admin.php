<?php

namespace App\Models\Admin;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity;

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    protected $guarded = [];

    // protected static $ignoreChangedAttributes = ['password', 'updated_at'];

    protected static $logAttributes = ['name','email','password'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'admin';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} User";
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pengaduan()
    {
        return $this->hasMany('App\Models\User\Pengaduan');
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Admin.'.$this->id;
    }
}
