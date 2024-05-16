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
     * NB: including employee in API call to be able to filter
     */


    /**
     * Pulls employess from API to display
     * 
     * Doesn't use client for cleanliness
     * @param none
     * @return View
     */
    public function index() {
        $response = Http::withToken(env('ACCESS_TOKEN'))->get('https://api.wonde.com/v1.0/schools/'.env('SCHOOL_ID').'/employees')->json();
        
        return view('index')->with('employees', $response['data']);
    }

    /**
     * Request and display lessons based on employee ID
     * 
     * @param Request $request - Laravel request object
     * @param string $id - Employee ID
     */
    public function show(Request $request, $id) {
        $response = Http::withToken(env('ACCESS_TOKEN'))->get('https://api.wonde.com/v1.0/schools/'.env('SCHOOL_ID').'/lessons?include=employee,employees,class')->json();
        $response = $response['data'];
        
        $lessons = [];
        foreach ($response as $lesson) {
            if (isset($lesson['employee']['data']) && $lesson['employee']['data']['id'] == $id) {
                array_push($lessons, $lesson);
            }
        }

        return view('lessons')->with('lessons', $lessons)->with('employee_id', $id);
    }
}
