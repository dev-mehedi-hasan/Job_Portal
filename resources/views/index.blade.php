@extends('layouts.apps')
@section('title', 'Home')
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
    <section class="banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 px-0">
                    <div class="banner-bg"></div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-text">
                        <h1>find your dream <span>job</span> here</h1>
                        <p class="py-3">Belive in yourself.Gather skills and the jobs will offer you to hire.Please be in touch with us.</p>
                        <a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="d-md-flex justify-content-between" method="POST" action="{{ route('job.search') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="search_keyword" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" required>
                            <button type="submit" class="template-btn">find job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <section class="jobs-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jobs-title">
                    <h2>Browse recent circular</h2>
                </div>
            </div>
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
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($recent_job as $recent_jobs)
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <a href="{{ route('job.show',$recent_jobs->id) }}">
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
                                    <button class="genric-btn success circle arrow">Recent</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach($full_time_job as $full_time_jobs)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('job.show',$full_time_jobs->id) }}">
                                        <h4>{{ $full_time_jobs->position }}</h4>
                                        </a>
                                        <ul class="mt-4">
                                            <li class="mb-3"><h5><i class="fa fa-building"></i> {{ $full_time_jobs->office_name }}</h5></li>
                                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{ $full_time_jobs->required_education }}</h5></li>
                                            <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($full_time_jobs->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $full_time_jobs->dead_line }}</span>@else {{ $full_time_jobs->dead_line }} @endif</h5></li>
                                        </ul>
                                    </div>
                                    <div class="job-img align-self-center">
                                        <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                    </div>
                                    <div class="job-btn align-self-center">
                                        <button class="genric-btn info circle arrow">Full Time</button>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="tab-pane fade" id="part-time" role="tabpanel" aria-labelledby="contact-tab">
                            @foreach($part_time_job as $part_time_jobs)
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <a href="{{ route('job.show',$part_time_jobs->id) }}">
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
                                        <button class="genric-btn warning circle arrow">Part Time</button>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="tab-pane fade" id="intern" role="tabpanel" aria-labelledby="contact-tab2s">
                        @foreach($internship as $internships)
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <a href="{{ route('job.show',$internships->id) }}">
                                    <h4>{{ $internships->position }}</h4>
                                    </a>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5><i class="fa fa-building"></i>{{ $internships->office_name }}</h5></li>
                                        <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{ $internships->required_education }}</h5></li>
                                        <li><h5><i class="fa fa-clock-o"></i>Deadline: @if($internships->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $internships->dead_line }}</span>@else {{ $internships->dead_line }} @endif</h5></li>
                                    </ul>
                                </div>
                                <div class="job-img align-self-center">
                                    <img class="company_img" src="/../Job_Portal/public/assets/images/logo.png" alt="job">
                                </div>
                                <div class="job-btn align-self-center">
                                    <button class="genric-btn primary circle arrow">Internship</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="more-job-btn mt-5 text-center">
            <a href="{{ route('job.index') }}" class="template-btn">more circular</a>
        </div>
    </div>
</section>
    <section id="blog" class="news-area section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>Technology News</h2>
                        <p>Powered by Techcrunch</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($newsdata as $key =>$newsdatas)
                      <?php if ($key>2) break;?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-news mb-5 mb-lg-0">
                            <div style="background-image : url(<?php print_r(($newsdatas->urlToImage)); ?>);" class="news-img news-img1"></div>
                            <div class="news-tag">
                                <ul class="my-4">
                                    <li><h5><i class="fa fa-calendar-o"></i> <?php print_r(($newsdatas->publishedAt)); ?></h5></li>
                                    <li class="separator mx-2"><span></span></li>
                                    <li><h5><i class="fa fa-folder-open-o"></i><?php print_r(($newsdatas->author)); ?></h5></li>
                                </ul>
                            </div>
                            <div class="news-title">
                                <h4><a href="<?php print_r(($newsdatas->url)); ?>"><?php print_r(($newsdatas->title)); ?></a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
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
