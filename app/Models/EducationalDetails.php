<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class EducationalDetails extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'educational_attainment', 'school_attended', 'course_taken', 'year_graduated'
    ];

    public function personalDetails()
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
