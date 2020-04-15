<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    protected $fillable = [
        'id',
        'job_code',
        'title',
        'sub_title',
        'last_date_to_submit',
        'job_category_id',
        'job_type_id',
        'country_id',
        'state_id',
        'city_id',
        'status',
        'created_by',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}