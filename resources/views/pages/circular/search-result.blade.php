@extends('layouts.apps')
@section('title', 'Job Search')
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
        @if($search_job !== null)
            <div class="row">
                    @foreach ($search_job as $search_jobs)
                        <div class="col-lg-12">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <a href="{{ route('job.show',$search_jobs->id) }}">
                                        <h4>{{ $search_jobs->position }}</h4>
                                    </a>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5><i class="fa fa-building"></i> {{$search_jobs->office_name}}</h5></li>
                                        <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{$search_jobs->required_education}}</h5></li>
                                        <li><h5><i class="fa fa-clock-o"></i> Deadline: @if($search_jobs->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $search_jobs->dead_line }}</span>@else {{$search_jobs->dead_line }} @endif</h5></li>
                                    </ul>
                                </div>
                                <div class="job-img align-self-center">
                                    <img class="company_img" src="/../Job_portal/public/assets/images/logo.png" alt="job">
                                </div>
                                <div class="job-btn align-self-center">
                                        <button class="genric-btn @if($search_jobs->employment_status = 'Full Time') info circle arrow @elseif($search_jobs->employment_status = 'Part Time') warning circle arrow @elseif($search_jobs->employment_status = 'Internship') primary circle arrow @else job-btn4 @endif " disabled>{{ $search_jobs->employment_status }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination">
                    {{ $search_job->links() }}
                    </div>
            </div>
        @else
        <div class="alert alert-warning">No Result Found</div>
        @endif
        </div>
    </section>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection
