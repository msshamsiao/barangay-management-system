<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;

class BarangayCertificate extends Model
{
    use HasFactory;

    protected $fillable = ['resident_id', 'certificate_number', 'issued_date'];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
