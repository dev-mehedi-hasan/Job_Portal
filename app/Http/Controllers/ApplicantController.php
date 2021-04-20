<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Application;
use App\Skill;

class ApplicantController extends Controller
{
    public function index()
    {
        $myjobapplication= Application::whereHas('job', function($q) {$q->where('user_id', Auth::user()->id);})->get();

            foreach ($myjobapplication as $key => $myjobapplications)
            {
                $userskill= Skill::where('user_id',$myjobapplications->applicant->id)->get();

                    foreach ($userskill as $key => $userskills)
                    {
                        $jobskill = explode(",",trim($myjobapplications->job->skill_name));
                            if(in_array($userskills->skill_name,$jobskill))
                                {
                                    $update_application_status = Application::where('id',$myjobapplications->id)->update(['status'=>'1']);
                                }
                    }

            }
        $selected_application= Application::where('status','1')->paginate(5);
        $disqualified_application= Application::where('status','0')->paginate(5);
        return view('pages.circular.applicant', compact('selected_application','disqualified_application'));

    }

    public function select($application_id)
    {
        $update_application_status = Application::where('id',$application_id)->update(['status'=>'1']);
        return Redirect::back();
    }
    public function disqualify($application_id)
    {
        $update_application_status = Application::where('id',$application_id)->update(['status'=>'0']);
        return Redirect::back();
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
        //
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
