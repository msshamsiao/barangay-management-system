<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BarangayCertificate;

class BarangayCertificateController extends Controller
{
    public function index()
    {
        $certificates = Auth::user()->barangayCertificates()->latest()->get();
        return view('barangay-certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('barangay-certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'certificate_number' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        $resident = Auth::user();
        $resident->barangayCertificates()->create($request->all());

        return redirect()->route('barangay-certificates.index')
            ->with('success', 'Barangay certificate requested successfully!');
    }
}
