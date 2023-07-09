<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends BaseModel
{
    use SoftDeletes;

    protected $table = "task";

    protected $fillable = [
        'id', 'name', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];
}
