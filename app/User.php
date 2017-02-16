<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'user_first_name',
        'user_last_name',
        'user_photo',
        'user_phone',
        'user_address',
        'department_id',
        'city_id',
        'company_id',
        'user_email',
        'user_password',
        'remember_token',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    public function Department(){
        return $this->belongsTo('App\Department', 'department_id', 'department_id');
    }

    public function City(){
        return $this->belongsTo('App\City', 'city_id', 'city_id');
    }

    public function Role(){
        return $this->belongsTo('App\Role', 'role_id', 'role_id');
    }

    public function Company(){
        return $this->belongsTo('App\Company', 'company_id', 'company_id');
    }
}
