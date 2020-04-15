<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_application';

    protected $fillable = [
        'id',
        'job_id',
        'name',
        'email',
        'comments',
        'refered_from_id',
        'resume_file',
        'job_status',
        'status',
        'verified_by',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}