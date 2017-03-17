<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Discuss extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discuss';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $rules = array('username' => 'required',
        'password' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'name' => 'required|min:5'
    );
    protected $fillable = ['discuss_title', 'discuss_content'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
