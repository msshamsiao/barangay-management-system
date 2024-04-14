<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ContactInformation extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'telephone_number', 'mobile_number', 'email'
    ];

    public function personalDetails()
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
