<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\QuizQuestion;
use App\QuizSubject;

class QuizQuestionController extends Controller
{

    public function index()
    {
        $quizquestion = QuizQuestion::paginate(5);
        return view('pages.quiz.question', compact('quizquestion'));
    }

    public function create()
    {
        $quizsubject = QuizSubject::all();
        return view('pages.quiz.create-question', compact('quizsubject'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quiz_subject_id' => 'integer|required',
            'q1' => 'string|required',
            'a1' => 'string|required',
            'q2' => 'string|required',
            'a2' => 'string|required',
            'q3' => 'string|required',
            'a3' => 'string|required',
            'q4' => 'string|required',
            'a4' => 'string|required',
            'q5' => 'string|required',
            'a5' => 'string|required',
        ]);
        $quizQuestion = QuizQuestion::updateOrCreate(
            ['quiz_subject_id' => $request->quiz_subject_id],
            ['q1' => $_REQUEST['q1'],'a1' => $_REQUEST['a1'],'q2' => $_REQUEST['q2'],'a2' => $_REQUEST['a2'],'q3' => $_REQUEST['q3'],'a3' => $_REQUEST['a3'],'q4' => $_REQUEST['q4'],'a4' => $_REQUEST['a4'],'q5' => $_REQUEST['q5'],'a5' => $_REQUEST['a5']]
        );
        Session::flash('quizquestion_create', "A quiz question has been modified successfully");
        return Redirect::back();

    }

    public function show($id)
    {
        $quizquestionsetail = QuizQuestion::where('id',$id)->first();
        return view('pages.quiz.question-detail', compact('quizquestionsetail'));
    }

    public function edit(QuizQuestion $quizQuestion)
    {
        //
    }

    public function update(Request $request, QuizQuestion $quizQuestion)
    {
        //
    }

    public function destroy($id)
    {
        $quizQuestion = QuizQuestion::find($id);
        $quizQuestion->delete();
        return Redirect::route('quizquestion.index');
    }
}
