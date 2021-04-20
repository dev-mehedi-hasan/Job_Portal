<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Info;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $info = Info::where('user_id', Auth::user()->id)->first();
       return view('pages.resume.info', compact('info'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'career_objective' => 'required|max:300',
            'work_experience' => 'numeric',
            'current_position' => 'string|max:255',
            'current_company' => 'string|max:255',
        ]);

        $info = Info::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['career_objective' => $_REQUEST['career_objective'],'work_experience' => $_REQUEST['work_experience'],'current_position' => $_REQUEST['current_position'],'current_company' => $_REQUEST['current_company']]
        );
        return Redirect::route('skill.index');

    }

    public function show(Info $info)
    {
        //
    }

    public function edit(Info $info)
    {
        //
    }

    public function update(Request $request, Info $info)
    {
        //
    }

    public function destroy(Info $info)
    {
        //
    }
}
