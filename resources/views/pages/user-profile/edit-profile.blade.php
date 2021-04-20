@extends('layouts.apps')
@section('title', 'Edit Profile')
@push('style')
<style type="text/css">
    input{
        text-align: center;
    }
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
                    <form action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                    @method('PATCH')
                    @csrf
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

                                        <a href="#" class="sidebar-btn d-flex justify-content-center">
                                           <input style="padding-left:30%;" id="pic" type="file" class="@error('pic') is-invalid @enderror" name="pic" autofocus>
                                        </a>

                                        @error('pic')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="card-body">
                                            <!--Name-->
                                            <a href="#" class="sidebar-btn d-flex justify-content-center">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                                            <br>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-phone-square"></i>Phone</a></li>
                                            <br>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-address-card"></i>Address</a></li>
                                            <br>
                                            <li class="mb-3"><a href="#" class="sidebar-btn d-flex justify-content-start"><i class="fa fa-calendar"></i>Date of birth</a></li>
                                        </ul>
                                    </div>
                                    <div class="job-text">
                                        <ul class="mt-4">
                                            <li class="mb-3">
                                                <a href="#" class="sidebar-btn d-flex justify-content-center">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autofocus>
                                                </a>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </li>
                                            <li class="mb-3">
                                                <a href="#" class="sidebar-btn d-flex justify-content-center">
                                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" autofocus>
                                                </a>
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </li>
                                            <br>
                                            <li class="mb-3">
                                                <a href="#" class="sidebar-btn d-flex justify-content-center">
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" autofocus>
                                                </a>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </li>
                                            <li class="mb-3">
                                                <a href="#" class="sidebar-btn d-flex justify-content-center">
                                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $user->date_of_birth }}" autofocus>
                                                </a>
                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-job mb-4 d-lg-flex justify-content-center">
                                        <button type="submit" class="genric-btn primary radius">Update</button>
                                </div>
                                @error('update')
                                    <span style="text-align: center;" class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
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

