@extends('layouts.apps')
@section('title', 'My Job Circular')
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
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="d-flex justify-content-end">
                <form action="{{ route('myjob.create')}}" method="get">
                    @csrf
                    <button type="submit" class="genric-btn info radius">
                        {{ __('Create My Job') }}
                    </button>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-tab tab-item">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="home" aria-selected="true">recent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#full-time" role="tab" aria-controls="profile" aria-selected="false">full time</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#part-time" role="tab" aria-controls="part-time" aria-selected="false">part time</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#intern" role="tab" aria-controls="intern" aria-selected="false">intern</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                            @foreach($recent_job as $recent_jobs)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$recent_jobs->id) }}">
                                        <h4>{{ $recent_jobs->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $recent_jobs->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>{{ $recent_jobs->required_education }}</h5></li>
                                            <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($recent_jobs->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $recent_jobs->dead_line }}</span>@else {{ $recent_jobs->dead_line }} @endif</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="#" class="genric-btn success circle arrow">Recent</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$recent_job->fragment('recent')->links(("pagination::bootstrap-4"))}}
                        </div>
                        <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach($full_time_job as $full_time_jobs)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$full_time_jobs->id) }}">
                                        <h4>{{ $full_time_jobs->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $full_time_jobs->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>{{ $full_time_jobs->required_education }}</h5></li>
                                            <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($full_time_jobs->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $full_time_jobs->dead_line }}</span>@else {{ $full_time_jobs->dead_line }} @endif</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="#" class="genric-btn info circle arrow">Full Time</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$full_time_job->fragment('full-time')->links(("pagination::bootstrap-4"))}}
                        </div>
                        <div class="tab-pane fade" id="part-time" role="tabpanel" aria-labelledby="contact-tab">
                            @foreach($part_time_job as $part_time_jobs)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$part_time_jobs->id) }}">
                                        <h4>{{ $part_time_jobs->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $part_time_jobs->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>{{ $part_time_jobs->required_education }}</h5></li>
                                            <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($part_time_jobs->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $part_time_jobs->dead_line }}</span>@else {{ $part_time_jobs->dead_line }} @endif</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="#" class="genric-btn warning circle arrow">Part Time</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$part_time_job->fragment('part-time')->links(("pagination::bootstrap-4"))}}
                        </div>
                        <div class="tab-pane fade" id="intern" role="tabpanel" aria-labelledby="contact-tab2s">
                            @foreach($internship as $internships)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$internships->id) }}">
                                        <h4>{{ $internships->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $internships->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>{{ $internships->required_education }}</h5></li>
                                            <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($internships->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $internships->dead_line }}</span>@else {{ $internships->dead_line }} @endif</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="#" class="genric-btn primary circle arrow">Internship</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$internship->fragment('intern')->links(("pagination::bootstrap-4"))}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mt-5 mt-lg-0">
                        <div class="single-item mb-4">
                            <h4 class="mb-4">jobs type</h4>
                            <button href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Full Time</span>
                                <span class="text-right">{{ $full_time_job->count() }}</span>
                            </button>
                            <button href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                <span>Part Time</span>
                                <span class="text-right">{{ $part_time_job->count() }}</span>
                            </button>
                            <button href="#" class="sidebar-btn d-flex justify-content-between">
                                <span>Internship</span>
                                <span class="text-right">{{ $internship->count() }}</span>
                            </button>
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
