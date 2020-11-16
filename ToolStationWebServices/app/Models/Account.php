<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $connection= 'mysql';
    protected $table= 'accounts';
    protected $guarded = [
        'id'
    ];
}
