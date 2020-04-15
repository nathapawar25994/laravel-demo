<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferedFrom extends Model
{
    protected $table = 'refered_from';

    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
        'created_by',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}