<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use SoftDeletes;

    protected $connection= 'mysql';
    protected $table= 'users';
    protected $guarded = [
        'id'
    ];
}
