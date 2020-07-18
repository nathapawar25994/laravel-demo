<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HiringOrganization extends Model
{
    protected $table = 'hiring_organization';

    protected $fillable = [
        'id',
        'name',
        'website',
        'logo',
        'status',
    ];
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}