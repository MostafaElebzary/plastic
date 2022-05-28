<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'photo', 'is_active', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
        
    }



    public function hasAbility($permissions){
        $role = $this->role;

        

        if(!$role) {
            return false;
        }

        foreach($role->permissions as $permission) {
            if(is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if(is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }

        return false;
    }
    
}
