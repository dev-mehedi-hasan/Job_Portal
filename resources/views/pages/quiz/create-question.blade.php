@extends('layouts.apps')
@section('title', 'Create Quiz Question')
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
            <div class="d-flex justify-content-end">
                <form action="{{ route('quizquestion.index')}}" method="get">
                    @csrf
                    <button type="submit" class="genric-btn info radius">
                        {{ __('Quiz question') }}
                    </button>
                </form>
            </div>
            <br>
            @if (Session::has('quizquestion_create'))
            <div class="alert alert-success">{{ Session::get('quizquestion_create') }}</div>
            @endif
            <form method="POST" action="{{ route('quizquestion.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-content">
                            <div class="single-content5 py-4">
                                <h4>Quiz Subject</h4>
                                <p>
                                    <select id="quiz_subject_id" class="form-control @error('quiz_subject_id') is-invalid @enderror" name="quiz_subject_id" required>
                                        @foreach ($quizsubject as $quizsubjects)
                                        <option value="{{$quizsubjects->id}}">{{$quizsubjects->subject_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quiz_subject_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <p>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question1 : <input id="q1" type="text" class="form-control @error('q1') is-invalid @enderror" name="q1" value="{{ old('q1') }}" placeholder="Question number one" required></h4>
                                        @error('q1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                <span class="ml-4">
                                    Answer :
                                    <input id="a1" type="text" class="form-control @error('a1') is-invalid @enderror" name="a1" value="{{ old('a1') }}" placeholder="Answer the above question" required>
                                        @error('a1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question2 : <input id="q2" type="text" class="form-control @error('q2') is-invalid @enderror" name="q2" value="{{ old('q2') }}" placeholder="Question number two" required></h4>
                                        @error('q2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                <span class="ml-4">
                                    Answer :
                                    <input id="a2" type="text" class="form-control @error('a2') is-invalid @enderror" name="a2" value="{{ old('a2') }}" placeholder="Answer the above question" required>
                                        @error('a2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question3 : <input id="q3" type="text" class="form-control @error('q3') is-invalid @enderror" name="q3" value="{{ old('q3') }}" placeholder="Question number three" required></h4>
                                        @error('q3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                <span class="ml-4">
                                    Answer :
                                    <input id="a3" type="text" class="form-control @error('a3') is-invalid @enderror" name="a3" value="{{ old('a3') }}" placeholder="Answer the above question" required>
                                        @error('a3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question4 : <input id="q4" type="text" class="form-control @error('q4') is-invalid @enderror" name="q4" value="{{ old('q4') }}" placeholder="Question number four" required></h4>
                                        @error('q4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                <span class="ml-4">
                                    Answer :
                                    <input id="a4" type="text" class="form-control @error('a4') is-invalid @enderror" name="a4" value="{{ old('a4') }}" placeholder="Answer the above question" required>
                                        @error('a4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>Question5 : <input id="q5" type="text" class="form-control @error('q5') is-invalid @enderror" name="q5" value="{{ old('q5') }}" placeholder="Question number five" required></h4>
                                        @error('q5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                <span class="ml-4">
                                    Answer :
                                    <input id="a5" type="text" class="form-control @error('a5') is-invalid @enderror" name="a5" value="{{ old('a5') }}" placeholder="Answer the above question" required>
                                        @error('a5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-table text-center">
                                <button type="submit" class="genric-btn info-border">Submit</button>
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
