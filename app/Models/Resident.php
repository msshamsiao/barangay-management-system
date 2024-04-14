<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Resident extends Eloquent
{
    use HasFactory;

    public function barangayCertificates()
    {
        return $this->hasMany(BarangayCertificate::class);
    }

    public function barangayIDs()
    {
        return $this->hasMany(BarangayID::class);
    }
}
