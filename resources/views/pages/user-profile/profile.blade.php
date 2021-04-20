@extends('layouts.apps')
@section('title', 'Profile')
@push('style')
<style type="text/css">
    .img-fluid{
        height: 150px;
        width: 150px;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="sidebar">
                                    <div class="single-item mb-4">
                                        <!--Avatar-->
                                        @if(auth()->user()->pic !== null )
                                        <div class="sidebar-btn d-flex justify-content-center">
                                            <img src="{{ $user->pic }}" alt="avatar mx-auto white" class="img-fluid">
                                        </div>
                                        @endif

                                        <div class="card-body">
                                            <!--Name-->
                                            <a href="#" class="sidebar-btn d-flex justify-content-center">
                                            {{ $user->name }}
                                            </a>
                                            <hr>
                                            <!--Quotation-->
                                            @if(auth()->user()->is_admin == 0)
                                            <a href="#" class="sidebar-btn d-flex justify-content-center">
                                            Job seeker
                                            </a>
                                            @endif
                                            @if(auth()->user()->is_admin == 1)
                                            <a href="#" class="sidebar-btn d-flex justify-content-center">
                                            Employer
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="single-job mb-4 d-lg-flex justify-content-between">
                                    <div class="job-text">
                                        <ul class="mt-4">
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-envelope"></i>Email</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-phone-square"></i>Phone</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-address-card"></i>Address</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-calendar"></i>Date of birth</a></li>
                                        </ul>
                                    </div>
                                    <div class="job-text">
                                        <ul class="mt-4">
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-center">{{ $user->email }}</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-center">{{ $user->phone_number }}</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-center">{{ $user->address }}</a></li>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-center">{{ $user->date_of_birth }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-job mb-4 d-lg-flex justify-content-center">
                                    <form method="get" action="{{ url('profile/' . $user->id . '/edit') }}" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="genric-btn info radius">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
 <br>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection

