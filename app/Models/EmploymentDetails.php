<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class EmploymentDetails extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'employment_status', 'employer_name', 'family_income_monthly'
    ];

    public function personalDetails()
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
