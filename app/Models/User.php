<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function topic()
    {
        return $this->hasOne(Topic::class, 'user_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\hasOne
    */
    public function response()
    {
        return $this->hasOne(Response::class, 'user_id');
    }

}
