<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function store(HttpRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'request_type' => 'required|integer',
            'description' => 'required|string',
            'date_request' => 'required|date',
            'date_approve' => 'nullable|date',
            'purpose' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create a new request
        $newRequest = Request::create($validatedData);

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Request created successfully!',
            'request' => $newRequest,
        ], 201);
    }

    public function getRequestType() 
    {
        $requestType = DB::table('request_type')->get();
        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved!',
            'request' => $requestType
        ]);
    }

    public function getBarangayCertificate()
    {
        $requestType = DB::table('request_type')->where('name', 'Barangay Clearance')->first();
        $getBrgyCert = DB::table('request')->where('request_type', $requestType)->get();

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved!',
            'request' => $getBrgyCert
        ]);
    }


}
