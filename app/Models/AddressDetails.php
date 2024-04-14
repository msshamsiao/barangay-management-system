<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AddressDetails extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'street_address', 'nationality'
    ];

    public function personalDetails()
    {
        return $this->belongsTo(PersonalDetails::class);
    }
}
