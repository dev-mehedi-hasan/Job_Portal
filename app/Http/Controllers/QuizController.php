<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Quiz;
use App\QuizQuestion;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $quizquestion = QuizQuestion::all();
        return view('pages.quiz.quiz', compact('quizquestion'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $quizquestion = QuizQuestion::where('id',$request->quizquestion_id)->first();
        $mark = 0;
            if ($request->answer1 == $quizquestion->a1) {
                $mark = $mark+1;
            }
            if ($request->answer2 == $quizquestion->a2) {
                $mark = $mark+1;
            }
            if ($request->answer3 == $quizquestion->a3) {
                $mark = $mark+1;
            }
            if ($request->answer4 == $quizquestion->a4) {
                $mark = $mark+1;
            }
            if ($request->answer5 == $quizquestion->a5) {
                $mark = $mark+1;
            }

        $quiz = quiz::updateOrCreate(
            ['quizquestion_id' => $request->quizquestion_id,'participant_id' => Auth::user()->id],
            ['status' => '1','mark' => $mark]
        );
            if ($mark >= 3) {
                Session::flash('quiz_submit_ok', "Congratutaion you have got {$mark}");
                return Redirect::back();
            }
            if ($mark < 3) {
                Session::flash('quiz_submit_not_ok', "Ohho! You just have got {$mark}. Better luck next time");
                return Redirect::back();
            }

    }

    public function show($id)
    {
        $quiz = Quiz::where('quizquestion_id',$id)->where('participant_id',Auth::user()->id)->first();
        $quizquestion= QuizQuestion::where('id',$id)->first();
        return view('pages.quiz.form', compact('quiz','quizquestion'));
    }

    public function edit(Quiz $quiz)
    {
        //
    }

    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    public function destroy(Quiz $quiz)
    {
        //
    }
}
