@extends('layouts.apps')
@section('title', 'Quiz Form')
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
    <section class="job-single-content section-padding">
        <div class="container">
            @if (Session::has('quiz_submit_ok'))
            <div class="alert alert-success">{{ Session::get('quiz_submit_ok') }}</div>
            @endif
            @if (Session::has('quiz_submit_not_ok'))
            <div class="alert alert-warning">{{ Session::get('quiz_submit_not_ok') }}</div>
            @endif
            <form method="POST" action="{{ route('quiz.store') }}" enctype="multipart/form-data">
                @csrf
                <input name="quizquestion_id" type="hidden" value="{{$quizquestion->id}}">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-content">
                            <div class="single-content2 py-4">
                                <h2>{{$quizquestion->quiz_subject->subject_name}}</h2>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question1: {{$quizquestion->q1}}</h4>
                                <span class="ml-4">
                                    <input id="answer1" type="text" class="form-control @error('answer1') is-invalid @enderror" name="answer1" value="{{ old('answer1') }}" placeholder="Ans to the question no one">
                                        @error('answer1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question2: {{$quizquestion->q2}}</h4>
                                <span class="ml-4">
                                    <input id="answer2" type="text" class="form-control @error('answer2') is-invalid @enderror" name="answer2" value="{{ old('answer2') }}" placeholder="Ans to the question no two">
                                        @error('answer2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question3: {{$quizquestion->q3}}</h4>
                                <span class="ml-4">
                                    <input id="answer3" type="text" class="form-control @error('answer3') is-invalid @enderror" name="answer3" value="{{ old('answer3') }}" placeholder="Ans to the question no three">
                                        @error('answer3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question4: {{$quizquestion->q4}}</h4>
                                <span class="ml-4">
                                    <input id="answer4" type="text" class="form-control @error('answer4') is-invalid @enderror" name="answer4" value="{{ old('answer4') }}" placeholder="Ans to the question no four">
                                        @error('answer4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question5: {{$quizquestion->q5}}</h4>
                                <span class="ml-4">
                                    <input id="answer5" type="text" class="form-control @error('answer5') is-invalid @enderror" name="answer5" value="{{ old('answer5') }}" placeholder="Ans to the question no five">
                                        @error('answer5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                        </div>
                        <div class="single-table text-center">
                            <button type="submit" class="genric-btn info-border">Submit</button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="single-item mb-4">
                                <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                    <span>Mark &nbsp;</span>
                                    <span class="text-right">
                                        @if($quiz !== null) {{$quiz->mark}} @else No Participation. @endif
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('footer')
    @parent
@endsection

