<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\BusinessLocationPermit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessLocationPermitController extends Controller
{
    public function index()
    {
        $permits = Auth::user()->businessLocationPermits()->latest()->get();
        return view('business-location-permits.index', compact('permits'));
    }

    public function create()
    {
        return view('business-location-permits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'permit_number' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        $resident = Auth::user();
        $resident->businessLocationPermits()->create($request->all());

        return redirect()->route('business-location-permits.index')
            ->with('success', 'Business location permit requested successfully!');
    }
}
