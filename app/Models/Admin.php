<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model implements AuthAuthenticatable
{
    use HasFactory;
    use Authenticatable;
    use Notifiable;
    // protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
