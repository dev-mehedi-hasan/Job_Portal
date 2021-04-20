<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Application;
use App\Job;

class JobController extends Controller
{

    public function index()
    {
        $recent_job = Job::orderBy('id', 'desc')->paginate(3);
        $full_time_job = Job::where('employment_status', 'Full Time')->orderBy('id', 'desc')->paginate(5);
        $part_time_job = Job::where('employment_status', 'Part Time')->orderBy('id', 'desc')->paginate(5);
        $internship = Job::where('employment_status', 'Internship')->orderBy('id', 'desc')->paginate(5);
        return view('pages.circular.job', compact('recent_job', 'full_time_job', 'part_time_job', 'internship'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $job = Job::find($id);
            if (Auth::check()) {
                $application = Application::where('job_id', $id)->where('applicant_id', Auth::user()->id)->first();
                    return view('pages.circular.detail', compact('job','application'));
            }
            else{
                return view('pages.circular.detail', compact('job'));
            }
    }

    public function edit(Job $job)
    {
        //
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return Redirect::route('myjob.index');
    }
}
