@extends('layouts.apps')
@section('title', 'Resume-Project')
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
                <div class="card-header">{{ __('Project') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="project_title" class="col-md-4 col-form-label text-md-right">{{ __('Project Title') }}</label>
                                    <div class="col-md-6">
                                        <input id="project_title" type="text" class="form-control @error('project_title') is-invalid @enderror" name="project_title" value="{{ old('project_title') }}" required autocomplete="project_title">
                                        @error('project_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="project_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="project_description" type="text" class="form-control @error('project_description') is-invalid @enderror" name="project_description" required autocomplete="project_description">{{ old('project_description') }}</textarea>
                                        @error('project_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="project_link" class="col-md-4 col-form-label text-md-right">{{ __('Project Link') }}</label>
                                    <div class="col-md-6">
                                        <input id="project_link" type="text" class="form-control @error('project_link') is-invalid @enderror" name="project_link" value="{{ old('project_link') }}" autocomplete="project_link">
                                        @error('project_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-6">
                                        <button type="submit" class="genric-btn info">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <table style="border: solid 1px;" class="table">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @if($project !=='')
                                @foreach($project as $key =>$projects)
                                  <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $projects['project_title'] }}</td>
                                    <td>{{ $projects['project_description'] }}</td>
                                    <td>{{ $projects['project_link'] }}</td>
                                    <td>
                                        <form action="{{ route('project.destroy', $projects->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="genric-btn danger radius" type="submit">X</button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach
                                @endif
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content">
                            <form action="{{ route('skill.index')}}" method="get">
                                @csrf
                                <button type="submit" class="genric-btn info circle">
                                    {{ __('Previous') }}
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <form action="{{ route('preview.show', auth()->user()->id) }}" method="get">
                                @csrf
                                <button type="submit" class="genric-btn info circle">
                                    {{ __('Preview Resume') }}
                                </button>
                            </form>
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
