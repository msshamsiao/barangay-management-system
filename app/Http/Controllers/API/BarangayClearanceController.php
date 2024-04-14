<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\BarangayClearance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangayClearanceController extends Controller
{
    public function index()
    {
        $clearances = Auth::user()->barangayClearances()->latest()->get();
        return view('barangay-clearances.index', compact('clearances'));
    }

    public function create()
    {
        return view('barangay-clearances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'purpose' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        $resident = Auth::user();
        $resident->barangayClearances()->create($request->all());

        return redirect()->route('barangay-clearances.index')
            ->with('success', 'Barangay clearance requested successfully!');
    }
}
