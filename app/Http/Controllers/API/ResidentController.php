<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PersonalDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use MongoDB\Client;

class ResidentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female,Other',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'civil_status' => 'required|string|in:Single,Married,Divorced,Widowed',
            'blood_type' => 'nullable|string|max:10',

            // EducationalDetails validation rules
            'educational_attainment' => 'required|string|max:255',
            'school_attended' => 'required|string|max:255',
            'course_taken' => 'required|string|max:255',
            'year_graduated' => 'required|integer|digits:4',

            // ContactInformation validation rules
            'telephone_number' => 'nullable|string|max:20',
            'mobile_number' => 'required|string|max:20',
            'email' => 'nullable|string|email|max:255',

            // AddressDetails validation rules
            'street_address' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',

            // EmploymentDetails validation rules
            'employment_status' => 'nullable|string|max:255',
            'employer_name' => 'nullable|string|max:255',
            'family_income_monthly' => 'nullable|integer|min:0',
        ]);

        $resident = PersonalDetails::create([
            'first_name' => $request->first_name, 
            'middle_name' => $request->middle_name, 
            'last_name' => $request->last_name, 
            'gender' => $request->gender, 
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace, 
            'civil_status' => $request->civil_status, 
            'blood_type' => $request->blood_type
        ]);

        $resident->educationalDetails()->create([
            'educational_attainment' => $request->educational_attainment, 
            'school_attended' => $request->school_attended, 
            'course_taken' => $request->course_taken, 
            'year_graduated' => $request->year_graduated
        ]);

        $resident->contactInformation()->create([
            'telephone_number' => $request->telephone_number, 
            'mobile_number' => $request->mobile_number, 
            'email' => $request->email
        ]);

        $resident->addressDetails()->create([
            'street_address' => $request->street_address, 
            'nationality' => $request->nationality
        ]);

        $resident->employmentDetails()->create([
            'employment_status' => $request->employment_status, 
            'employer_name' => $request->employer_name, 
            'family_income_monthly' => $request->family_income_monthly
        ]);

        $responseData = [
            'success' => true,
            'message' => 'Resident created successfully!',
            'resident' => $resident, 
        ];

        return Response::json($responseData, 201);
    }
}
