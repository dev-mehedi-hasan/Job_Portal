<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Skill;
use Illuminate\Support\Facades\Auth;
class SkillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $skill = Skill::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('pages.resume.skill', compact('skill'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        for($i=0;$i<sizeof($request->skill_name); $i++)
        {
            $skill = Skill::updateOrCreate(
                ['user_id' => Auth::user()->id,'skill_name' => $request->skill_name[$i]]
            );
        }
        return Redirect::route('skill.index');
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
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->route('skill.index');
    }
}
