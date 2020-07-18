<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Currency extends Model
{
    protected $table = 'currency';

    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}