@extends('layouts.apps')
@section('title', 'Quiz')
@section('style')
    @parent
@endsection
@section('preloader')
    @parent
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
<div class="page-title text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Job Circular</h2>
                <p>All kind of government and non government job circular</p>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Quiz Subject') }}</div>
                    <div class="card-body">
                        <div class="row">
                           @foreach ($quizquestion as $quizquestions)
                             <div class="col-lg-3 col-md-6">
                               <div class="single-category text-center mb-4">
                                  <img src="/../Job_Portal/public/assets/images/quiz/@if($quizquestions->quiz_subject->id='1')programming.png @elseif($quizquestions->quiz_subject->id='2')networking.png @elseif($quizquestions->quiz_subject->id='3')graphics-design.png @elseif($quizquestions->quiz_subject->id='4')accounting.png @elseif($quizquestions->quiz_subject->id='5')marketing.png @elseif($quizquestions->quiz_subject->id='6')hardware.png  @endif" alt="category">
                                  <a href="{{ route('quiz.show',$quizquestions->id) }}">
                                     <h4>{{$quizquestions->quiz_subject->subject_name}}</h4>
                                  </a>
                                </div>
                             </div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection
