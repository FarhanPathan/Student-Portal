<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DashboardController extends Controller
{
    //
    public function index(){
        if(empty(auth()->user()->id)){
            return redirect()->route('login');
        }
        $courses = Course::all();
        $enrolled_courses = Enrollment::where('student_id', auth()->user()->id)->pluck('course_id')->toArray();
        return view('dashboard', 
        ['courses' => $courses],
        ['enrolled_courses' => $enrolled_courses]
        );
    }

    public function enroll(Request $request){
        if(empty(auth()->user()->id)){
            return redirect()->route('login');
        }
        $enrollment = new Enrollment;
        $enrollment->student_id = auth()->user()->id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        // Student enrollment logic here
        $studentId = auth()->user()->student_id;
        $amount = $request->input('course_fee');
        
        // Call Finance portal API to generate invoice
        $client = new Client();
        $response = $client->post('http://localhost:8888/api/generate_invoice/' . $studentId . '/' . $amount);
        
        if ($response->getStatusCode() == 201) {
            $invoice = json_decode($response->getBody());
            $invoiceId = $invoice->invoice->invoice_ref;
            
            // Store invoice ID in student portal database
            // ...
            
            return redirect()->route('dashboard')->with('success', 'You have successfully enrolled in the course. Please visit Payment Portal to pay invoice reference number: ' . $invoiceId);
            // return response()->json(['message' => 'Course enrolled successfully', 'invoice_id' => $invoiceId], 200);
        } else {
            return response()->json(['message' => 'Failed to enroll course'], 400);
        }

    }
