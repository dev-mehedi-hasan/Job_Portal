
@extends('layouts.apps')
@section('title', 'Applicant')
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-tab tab-item">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="home" aria-selected="true">Selected Application</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#full-time" role="tab" aria-controls="profile" aria-selected="false">Disqualified Application</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                            @foreach($selected_application as $selected_applications)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$selected_applications->job->id) }}">
                                        <h4>{{ $selected_applications->job->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $selected_applications->job->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>Applicant: {{ $selected_applications->applicant->name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-clock-o"></i> Deadline: @if($selected_applications->job->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $selected_applications->job->dead_line }}</span>@else {{ $selected_applications->job->dead_line }} @endif</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-clock-o"></i> Application Date: {{ $selected_applications->created_at }}</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="{{ route('preview.show', $selected_applications->applicant->id) }}" class="genric-btn info circle arrow">Applicant Resume</a>
                                        <a href="{{ route('application.disqualify', $selected_applications->id) }}" class="genric-btn danger circle arrow">Disqualify</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$selected_application->fragment('recent')->links(("pagination::bootstrap-4"))}}
                        </div>
                        <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach($disqualified_application as $disqualified_applications)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('myjob.show',$disqualified_applications->job->id) }}">
                                        <h4>{{ $disqualified_applications->job->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $disqualified_applications->job->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>Applicant: {{ $disqualified_applications->applicant->name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-clock-o"></i> Deadline: @if($disqualified_applications->job->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $disqualified_applications->job->dead_line }}</span>@else {{ $disqualified_applications->job->dead_line }} @endif</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-clock-o"></i> Application Date: {{ $disqualified_applications->created_at }}</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <a href="{{ route('preview.show', $disqualified_applications->applicant->id) }}" class="genric-btn info circle arrow">Applicant Resume</a>
                                        <a href="{{ route('application.select', $disqualified_applications->id) }}" class="genric-btn danger circle arrow">Select</a>
                                    </div>
                                </div>
                            @endforeach
                            {{$disqualified_application->fragment('full-time')->links(("pagination::bootstrap-4"))}}
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

