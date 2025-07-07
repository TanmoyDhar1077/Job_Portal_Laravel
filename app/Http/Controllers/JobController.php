<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobPost::orderBy("created_at", "desc")->paginate(10);
        return view("jobs.list", [
            "jobs" => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|min:3|max:255',
            'job_description' => 'nullable|string',
            'company_name'=> 'required|string|min:3|max:255',
            'salary_range' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|in:full-time,part-time,internship,contract',
            'job_level' => 'nullable|in:entry,mid,senior',
            'experience_required' => 'nullable|integer|min:0',
            'education_level' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date|after_or_equal:today',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->passes()) {

            JobPost::create([
                'job_title' => $request->job_title,
                'job_description' => $request->job_description,
                'salary_range' => $request->salary_range,
                'location' => $request->location,
                'company_name'=>$request->company_name,
                'job_type' => $request->job_type,
                'job_level' => $request->job_level,
                'experience_required' => $request->experience_required,
                'education_level' => $request->education_level,
                'application_deadline' => $request->application_deadline,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            return redirect()->route('jobPost.index')->with('success', 'Job post created successfully.');

        } else {
            return redirect()->route('jobPost.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = JobPost::findOrFail($id);
        return view('jobs.show', ['job'=> $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|min:3|max:255',
            'job_description' => 'nullable|string',
            'company_name'=> 'required|string|min:3|max:255',
            'salary_range' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|in:full-time,part-time,internship,contract',
            'job_level' => 'nullable|in:entry,mid,senior',
            'experience_required' => 'nullable|integer|min:0',
            'education_level' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date|after_or_equal:today',
            'is_active' => 'nullable|boolean',
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
