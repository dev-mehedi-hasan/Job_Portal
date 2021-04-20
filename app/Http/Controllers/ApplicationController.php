<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $application = new Application;
        $application->applicant_id= Auth::user()->id;
        $application->job_id= $request->job_id;
        $application->save();
        Session::flash('apply_success', "You have applied successfully");
        return Redirect::back();
    }

    public function show(Application $application)
    {
        //
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        //
    }

    public function destroy(Application $application)
    {

        $application->delete();
        return Redirect::back();
    }
}
