<?php

// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    public function create($id)
    {
        $job = JobPost::where('is_active', true)->findOrFail($id);

        return view('jobs.apply', compact('job'));
    }

    public function store(Request $request, $jobId)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $job = JobPost::where('is_active', true)->findOrFail($jobId);

        // Prevent multiple applications
        if (Application::where('user_id', Auth::id())->where('job_post_id', $jobId)->exists()) {
            return back()->with('error', 'You have already applied to this job.');
        }

        $cvPath = $request->file('cv')->store('cvs', 'public');

        Application::create([
            'user_id' => Auth::id(),
            'job_post_id' => $jobId,
            'phone' => $request->phone,
            'address' => $request->address,
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('jobPost.show', $jobId)->with('success', 'Applied successfully!');
    }


    public function showApplicants($jobId)
    {
        $job = JobPost::where('user_id', auth()->id())->findOrFail($jobId);
        $applications = $job->applications()->with('user')->paginate(10);
        

        return view('jobApplication.employer.applicants', compact('job', 'applications'));
    }

    public function showApplicationForCandidate()
    {
        $applications = Application::where('user_id', auth()->id())
            ->with(['job' => function ($query) {
                $query->where('is_active', true);
            }])
            ->whereHas('job', function ($query) {
                $query->where('is_active', true);
            })
            ->get();

        return view('jobApplication.candidate.myApplications', compact('applications'));
    }

    public function downloadCV(Application $application)
    {
        // Check if user is authorized to view this CV
        // Either the user is the job owner (employer) or the applicant themselves
        $job = $application->job;
        
        if (auth()->id() !== $job->user_id && auth()->id() !== $application->user_id) {
            abort(403, 'Unauthorized to view this CV');
        }

        $filePath = storage_path('app/public/' . $application->cv_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'CV file not found');
        }

        return response()->file($filePath);
    }

    public function updateStatus(Request $request, Application $application)
    {
        // Check if user is authorized (only job owner can update status)
        $job = $application->job;
        
        if (auth()->id() !== $job->user_id) {
            abort(403, 'Unauthorized to update this application status');
        }

        $request->validate([
            'status' => 'required|in:pending,shortlisted,rejected'
        ]);

        $application->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Application status updated successfully!');
    }

}

