@extends('layouts.apps')
@section('title', 'Job Circular Detail')
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
                <div class="col-lg-8">
                    <div class="main-content">
                        <div class="single-content2 py-4">
                            <h4>{{ $job->position }}<br><br>{{ $job->office_name }}</h4>
                            <p>@if($job->description !==''){{ $job->description }}@else Not Available @endif</p>
                        </div>
                        <div class="single-content3 py-4">
                            <h4>vacancy</h4>
                            <span class="ml-4">{{ $job->vacancy }}</span>
                        </div>
                        <div class="single-content4 py-4">
                            <h4>job responsibility</h4>
                            <p>@if($job->responsibilities !==''){{ $job->responsibilities }}@else Not Available @endif</p>
                        </div>
                        <div class="single-content5 py-4">
                            <h4>Educational Requirements</h4>
                            <p>{{ $job->required_education }}</p>
                            <p>Skills Required: {{ $job->skill_name }}</p>
                        </div>
                        <div class="single-content6 py-4">
                            <h4>employment status</h4>
                            <span>{{ $job->employment_status }}</span>
                        </div>
                        <div class="single-content7 py-4">
                            <h4>other benifits</h4>
                            <p>@if($job->other_benifits !==''){{ $job->other_benifits }}@else As per office policy @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="single-item mb-4">
                        	<a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Salary</span>
                                <span class="text-right">@if($job->salary !==''){{ $job->salary }}@else negotiable @endif</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Location</span>
                                <span class="text-right">@if($job->location !==''){{ $job->location }}@else Remote Job @endif</span>
                            </a>
                            <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Deadline</span>
                                <span class="text-right"> @if($job->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $job->dead_line }}</span>@else {{ $job->dead_line }} @endif</span>
                            </a>
                             <div class="single-table text-center">
                                @auth
                                    @if((auth()->user()->is_admin == 1)&&(auth()->user()->id == $job->user_id))
                                    <form action="{{ route('job.destroy', $job->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="genric-btn danger-border" type="submit">Delete</button>
                                    </form>
                                    @elseif((auth()->user()->is_admin == 1)&&(auth()->user()->id !== $job->user_id))
                                        <a href="mailto:authority@gmail.com" class="genric-btn success-border">Email to authority&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    @elseif(auth()->user()->is_admin == 0)
                                    @if($application !== null)
                                        <button type="button" class="genric-btn success-border" disabled>Applied</button>
                                    @else
                                        @if($job->dead_line <=  Carbon\Carbon::yesterday())
                                            <button type="button" class="genric-btn danger-border" disabled>Deadline Expired</button>
                                        @else
                                        <form method="POST" action="{{ route('application.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input name="job_id" type="hidden" value="{{$job->id}}">
                                            <button type="submit" class="genric-btn info-border">Apply Now</button>
                                        </form>
                                        @endif
                                    @endif
                                    @endif
                                @endauth
                                @guest
                                @if($job->dead_line <=  Carbon\Carbon::yesterday())
                                    <button type="button" class="genric-btn danger-border" disabled>Deadline Expired</button>
                                @else
                                <form method="POST" action="{{ route('application.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input name="job_id" type="hidden" value="{{$job->id}}">
                                    <button type="submit" class="genric-btn info-border">Apply Now</button>
                                </form>
                                @endif
                                @endguest
                                @if (Session::has('apply_success'))
                                <div class="alert alert-success">{{ Session::get('apply_success') }}</div>
                                @endif
	                        </div>
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
