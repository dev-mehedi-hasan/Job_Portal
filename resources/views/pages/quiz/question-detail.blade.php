@extends('layouts.apps')
@section('title', 'Quiz Question Detail')
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
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="single-content2 py-4">
                            <h2>{{ $quizquestionsetail->quiz_subject->subject_name }}</h2>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>Question1: {{ $quizquestionsetail->q1 }}</h4>
                            <span class="ml-4">Answer: {{ $quizquestionsetail->a1 }}</span>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>Question2: {{ $quizquestionsetail->q2 }}</h4>
                            <span class="ml-4">Answer: {{ $quizquestionsetail->a2 }}</span>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>Question3: {{ $quizquestionsetail->q3 }}</h4>
                            <span class="ml-4">Answer: {{ $quizquestionsetail->a3 }}</span>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>Question4: {{ $quizquestionsetail->q4 }}</h4>
                            <span class="ml-4">Answer: {{ $quizquestionsetail->a4}}</span>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>Question5: {{ $quizquestionsetail->q5 }}</h4>
                            <span class="ml-4">Answer: {{ $quizquestionsetail->a5 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection
