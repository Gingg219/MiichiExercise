<?php

namespace App\Models;

use App\Observers\UserObserver;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthAuthenticatable
{
    use HasFactory;
    use Authenticatable;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
