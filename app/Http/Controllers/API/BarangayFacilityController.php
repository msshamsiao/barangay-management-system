<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\BarangayFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangayFacilityController extends Controller
{
    public function index()
    {
        $facilities = Auth::user()->barangayFacilities()->latest()->get();
        return view('barangay-facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('barangay-facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'facility_name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $resident = Auth::user();
        $resident->barangayFacilities()->create($request->all());

        return redirect()->route('barangay-facilities.index')
            ->with('success', 'Barangay facility requested successfully!');
    }
}
