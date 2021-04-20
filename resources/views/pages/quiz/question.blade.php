@extends('layouts.apps')
@section('title', 'Quiz Question')
@push('style')
<style type="text/css">
    .company_img{
        height: 50px;
        width: 50px;
    }
</style>
@endpush
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
    <section class="jobs-area section-padding">
        <div class="container">
            <div class="d-flex justify-content-end">
                <form action="{{ route('quizquestion.create')}}" method="get">
                    @csrf
                    <button type="submit" class="genric-btn info radius">
                        {{ __('Create Quiz Question') }}
                    </button>
                </form>
            </div>
            <br>
            <div class="row">
                @foreach ($quizquestion as $quizquestions)
                    <div class="col-lg-12">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <a href="{{ route('quizquestion.show',$quizquestions->id) }}">
                                    <h4>{{ $quizquestions->quiz_subject->subject_name }}</h4>
                                </a>
                                <ul class="mt-4">
                                    <li><h5><i class="fa fa-clock-o"></i> Created at: {{$quizquestions->created_at }}</h5></li>
                                </ul>
                            </div>
                            <div class="job-img align-self-center">
                                <img class="company_img" src="/../Job_portal/public/assets/images/logo.png" alt="job">
                            </div>
                            <div class="job-btn align-self-center">
                                <form action="{{ route('quizquestion.destroy', $quizquestions->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="genric-btn danger radius" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pagination">
                {{ $quizquestion->links() }}
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
