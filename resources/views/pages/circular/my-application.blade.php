@extends('layouts.apps')
@section('title', 'My Job Application')
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
            <div class="row">
                @foreach ($my_application as $my_applications)
                    <div class="col-lg-12">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <a href="{{ route('job.show',$my_applications->job->id) }}">
                                    <h4>{{ $my_applications->job->position }}</h4>
                                </a>
                                <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-building"></i> {{$my_applications->job->office_name}}</h5></li>
                                    <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> {{$my_applications->job->required_education}}</h5></li>
                                    <li><h5><i class="fa fa-clock-o"></i> Deadline: @if($my_applications->job->dead_line <=  Carbon\Carbon::yesterday())<span style="color:red;">{{ $my_applications->job->dead_line }}</span>@else {{$my_applications->job->dead_line }} @endif</h5></li>
                                    <li class="mb-3"><h5><i class="fa fa-calendar-o"></i> Application Time: {{$my_applications->created_at }}</h5></li>
                                </ul>
                            </div>
                            <div class="job-img align-self-center">
                                <img class="company_img" src="/../Job_portal/public/assets/images/logo.png" alt="job">
                            </div>
                            <div class="job-btn align-self-center">
                                <form action="{{ route('application.destroy', $my_applications->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="genric-btn danger radius" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pagination">
                {{ $my_application->links() }}
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
