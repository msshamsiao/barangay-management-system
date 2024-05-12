<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Request extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = "request";
    
    protected $guarded = [];

    protected $fillable = [
        'request_type', 
        'description', 
        'date_request', 
        'date_approve', 
        'purpose', 
        'status'
    ];
}

