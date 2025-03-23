<?php

namespace App\Models;  
  
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Relations\HasMany;  
  
class User extends Authenticatable  
{  
    use HasFactory;  
  
    protected $fillable = [  
        'name',  
        'email',  
        'password',  
    ];  
  
    protected $hidden = [  
        'password',  
        'remember_token',  
    ];  
  
    public function links(): HasMany  
    {  
        return $this->hasMany(Link::class);  
    }  
}  
