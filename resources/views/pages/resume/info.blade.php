@extends('layouts.apps')
@section('title', 'Resume-Information')
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('info.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="career_objective" class="col-md-4 col-form-label text-md-right">{{ __('Career Objective') }}</label>

                            <div class="col-md-6">
                                <textarea id="career_objective" class="form-control @error('career_objective') is-invalid @enderror" name="career_objective" required autocomplete="career_objective" autofocus>@if($info !== null)  {{ $info['career_objective'] }} @endif</textarea>

                                @error('career_objective')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work_experience" class="col-md-4 col-form-label text-md-right">{{ __('Work Experience') }}</label>

                            <div class="col-md-6">
                                <input id="work_experience" type="number" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" value="@if($info !== null){{ $info['work_experience'] }}@else{{ old('work_experience') }}@endif" autocomplete="work_experience">

                                @error('work_experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label href="#" class=" col-md-1 col-form-label text-md-center">Year</label>
                        </div>

                        <div class="form-group row">
                            <label for="current_position" class="col-md-4 col-form-label text-md-right">{{ __('Current Job Position') }}</label>

                            <div class="col-md-6">
                                <input id="current_position" type="text" class="form-control @error('current_position') is-invalid @enderror" name="current_position" value="@if($info !== null){{ $info['current_position'] }}@else{{ old('current_position') }}@endif" autocomplete="current_position">

                                @error('current_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="current_company" class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>

                            <div class="col-md-6">
                                <input id="current_company" type="text" class="form-control" name="current_company" value="@if($info !== null){{ $info['current_company'] }}@else{{ old('current_company') }}@endif" autocomplete="current_company">
                                @error('current_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="genric-btn info circle">
                                    {{ __('Next') }}
                                </button>
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
