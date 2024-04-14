<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\BarangayID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangayIDController extends Controller
{
    public function index()
    {
        $ids = Auth::user()->barangayIDs()->latest()->get();
        return view('barangay-ids.index', compact('ids'));
    }

    public function create()
    {
        return view('barangay-ids.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        $resident = Auth::user();
        $resident->barangayIDs()->create($request->all());

        return redirect()->route('barangay-ids.index')
            ->with('success', 'Barangay ID requested successfully!');
    }
}
