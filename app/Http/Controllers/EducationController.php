<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $education = Education::where('user_id', Auth::user()->id)->get();
        return view('pages.resume.education', compact('education'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'institute' => 'string|required',
            'GPA' => 'numeric|required|between:2.00,5.00',
            'passing_year' => 'numeric|required|max:2019',
        ]);
        $education = Education::updateOrCreate(
            ['user_id' => Auth::user()->id,'degree' => $_REQUEST['degree']],
            ['institute' => $_REQUEST['institute'],'subject' => $_REQUEST['subject'],'passing_year' => $_REQUEST['passing_year'],'GPA' => $_REQUEST['GPA']]
        );
        return Redirect::route('education.index');
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
        $education = Education::find($id);
        $education->delete();

        return redirect()->route('education.index');
    }
}
