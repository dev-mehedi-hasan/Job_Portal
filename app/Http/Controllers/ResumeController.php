<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Education;
use App\Project;
use App\Skill;
use App\User;
use App\Info;

class ResumeController extends Controller
{

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
        //
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
        $info = Info::where('user_id',$id)->first();
        $skill = Skill::where('user_id',$id)->get();
        $education = Education::where('user_id',$id)->get();
        $project = Project::where('user_id',$id)->get();
        return view('pages.resume.preview', compact('user','info','skill','education','project'));
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
