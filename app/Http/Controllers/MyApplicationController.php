<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Application;
use App\Job;


class MyApplicationController extends Controller
{

    public function index()
    {
        $my_application = Application::where('applicant_id', Auth::user()->id)->paginate(5);
        return view('pages.circular.my-application', compact('my_application'));
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
