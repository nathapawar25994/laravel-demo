<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'job_type';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'status',
        'created_by',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}