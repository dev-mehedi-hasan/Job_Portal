<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Job;


class MyJobController extends Controller
{

    public function index()
    {
        $recent_job = Job::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(3);
        $full_time_job = Job::where('user_id', Auth::user()->id)->where('employment_status', 'Full Time')->orderBy('id', 'desc')->paginate(3);
        $part_time_job = Job::where('user_id', Auth::user()->id)->where('employment_status', 'Part Time')->orderBy('id', 'desc')->paginate(3);
        $internship = Job::where('user_id', Auth::user()->id)->where('employment_status', 'Internship')->orderBy('id', 'desc')->paginate(3);
        return view('pages.circular.my-job', compact('recent_job', 'full_time_job', 'part_time_job', 'internship'));
    }

    public function create()
    {
    return view('pages.circular.create-my-job');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_name' => 'string|required|max:255',
            'position' => 'string|required|max:255',
            'vacancy' => 'numeric|required',
            'skill_name' => 'required|max:500',
            'required_education' => 'string|required|max:255',
            'employment_status' => 'string|required||max:255',
            'salary' => 'numeric|required',
            'dead_line' => 'date|required|after_or_equal:today',
        ]);
        $skill_name= implode(', ', $request->skill_name);
        $job = new Job;
        $job->user_id       = Auth::user()->id;
        $job->office_name      = $request->office_name;
        $job->position = $request->position;
        $job->description       = $request->description;
        $job->vacancy      = $request->vacancy;
        $job->responsibilities = $request->responsibilities;
        $job->skill_name       = $skill_name;
        $job->required_education      = $request->required_education;
        $job->employment_status = $request->employment_status;
        $job->salary       = $request->salary;
        $job->other_benifits      = $request->other_benifits;
        $job->location = $request->location;
        $job->dead_line       = $request->dead_line;
        $job->save();
        Session::flash('job_create', "The Circular has been created successfully");
        return Redirect::back();

    }

    public function show($id)
    {
        $job = Job::find($id);
        return view('pages.circular.detail', compact('job'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
