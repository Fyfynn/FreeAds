<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;




class User extends Model implements Authenticatable
{
    use HasFactory;
    use BasicAuthenticatable;

    protected $fillable = ['name', 'email', 'password'];
    
}
