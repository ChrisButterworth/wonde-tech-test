<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LessonsController extends Controller
{

    /**
     * Proposed structure
     * 
     * index
     *  - displays list of employees
     * 
     * show
     * - displays calendar for current week
     * 
     * NB: including employeed
     */


    /**
     * Pulls employess from API to display
     * 
     * Doesn't use client for cleanliness
     * no params
     */
    public function index() {
        // $response = Http::withToken(env('ACCESS_TOKEN'))->get('https://api.wonde.com/v1.0/schools/'.env('SCHOOL_ID').'/lessons?include=employee,employees,class')->json();
        $response = Http::withToken(env('ACCESS_TOKEN'))->get('https://api.wonde.com/v1.0/schools/'.env('SCHOOL_ID').'/employees')->json();

        // dd($response['data']);
        
        return view('index')->with('employees', $response['data']);
    }

    public function show(Request $request, $id) {
        $response = Http::withToken(env('ACCESS_TOKEN'))->get('https://api.wonde.com/v1.0/schools/'.env('SCHOOL_ID').'/lessons?include=employee,employees,class')->json();
        $response = $response['data'];
        // dd($response);
        $lessons = [];
        
        foreach ($response as $lesson) {
            if (isset($lesson['employee']['data']) && $lesson['employee']['data']['id'] == $id) {
                array_push($lessons, $lesson);
            }
        }

        // dd($lessons);

        return view('lessons')->with('lessons', $lessons)->with('employee_id', $id);
    }
}
