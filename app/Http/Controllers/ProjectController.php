<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;


class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $project = Project::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('pages.resume.project', compact('project'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'string|required|max:255',
            'project_description' => 'required|max:500',
            'project_link' => 'string|required|max:255',
        ]);
        $project = Project::updateOrCreate(
            ['user_id' => Auth::user()->id,'project_title' => $_REQUEST['project_title']],
            ['project_description' => $_REQUEST['project_description'],'project_link' => $_REQUEST['project_link']]
        );
        return Redirect::route('project.index');
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
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('project.index');
    }
}
