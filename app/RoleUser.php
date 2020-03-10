<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";

    protected $primaryKey='id';

    protected $fillable = ['user_id', 'role_id','created_at','updated_at'];
}
