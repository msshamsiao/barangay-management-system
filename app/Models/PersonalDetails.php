<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PersonalDetails extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    
    protected $table = 'personal_details';
    
    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'gender', 
        'birthdate', 
        'birthplace', 
        'civil_status', 
        'blood_type'
    ];

    public function educationalDetails()
    {
        return $this->hasOne(EducationalDetails::class);
    }

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class);
    }

    public function addressDetails()
    {
        return $this->hasOne(AddressDetails::class);
    }

    public function employmentDetails()
    {
        return $this->hasOne(EmploymentDetails::class);
    }
}
