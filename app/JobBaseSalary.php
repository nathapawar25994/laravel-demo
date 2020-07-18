<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobBaseSalary extends Model
{
    protected $table = 'job_base_salary';

    protected $fillable = [
        'id',
        'job_id',
        'currency_id',
        'salary_period_id',
        'is_range',
        'value',
        'min_value',
        'max_value',
        'status',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}