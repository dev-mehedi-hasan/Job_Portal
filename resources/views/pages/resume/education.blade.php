@extends('layouts.apps')
@section('title', 'Resume-Education')
@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
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
                <div class="card-header">{{ __('Education') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form method="POST" action="{{ route('education.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                                    <div class="col-md-6">
                                        <select id="degree" class="form-control @error('degree') is-invalid @enderror" name="degree" required autocomplete="degree" autofocus>
                                            <option value="SSC/Equivalent">SSC/Equivalent</option>
                                            <option value="HSC/Equivalent">HSC/Equivalent</option>
                                            <option value="B.Sc./Honours">B.Sc./Honours</option>
                                            <option value="M.Sc./Masters">M.Sc./Masters</option>
                                          </select>
                                        @error('degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                                    <div class="col-md-6">
                                        <select id="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" required autocomplete="subject" autofocus>
                                            <option value="Science">Science</option>
                                            <option value="Business Studies">Business Studies</option>
                                            <option value="Huminities">Huminities</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="Statistics">Statistics</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Applied Physics">Applied Physics</option>
                                            <option value="Huminities">Law</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Civil Engineering">Civil Engineering</option>
                                            <option value="Architecture">Architecture</option>
                                            <option value="Electrical and Electronic Engineering">Electrical and Electronic Engineering</option>
                                            <option value="Textile Engineering">Textile Engineering</option>
                                            <option value="Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
                                            <option value="BBA">BBA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="Software Engineering">Software Engineering</option>
                                            <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                                          </select>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="institute" class="col-md-4 col-form-label text-md-right">{{ __('Institute') }}</label>

                                    <div class="col-md-6">
                                        <input id="institute" type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" value="{{ old('institute') }}" required autocomplete="institute">
                                        @error('institute')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GPA" class="col-md-4 col-form-label text-md-right">{{ __('GPA') }}</label>

                                    <div class="col-md-6">
                                        <input id="GPA" type="number" class="form-control @error('GPA') is-invalid @enderror" name="GPA" value="{{ old('GPA') }}" required autocomplete="GPA">
                                        @error('GPA')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passing_year" class="col-md-4 col-form-label text-md-right">{{ __('Passing Year') }}</label>

                                    <div class="col-md-6">
                                        <input class="date-own form-control @error('passing_year') is-invalid @enderror" type="text" id="passing_year" name="passing_year" value="{{ old('passing_year') }}" required>

                                        @error('passing_year')
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
                        <div class="col-md-7">
                            <table style="border: solid 1px;" class="table">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Degree</th>
                                    <th scope="col">Institute</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Passing Year</th>
                                    <th scope="col">GPA</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @if($education !=='')
                                @foreach($education as $key =>$educations)
                                  <tr>
                                    <td>{{ $educations['degree'] }}</td>
                                    <td>{{ $educations['institute'] }}</td>
                                    <td>{{ $educations['subject'] }}</td>
                                    <td>{{ $educations['passing_year'] }}</td>
                                    <td>{{ $educations['GPA'] }}</td>
                                    <td>
                                        <form action="{{ route('education.destroy', $educations->id)}}" method="post">
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
                            <form action="{{ route('project.index')}}" method="get">
                                @csrf
                                <button type="submit" class="genric-btn info circle">
                                    {{ __('Next') }}
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
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $('.date-own').datepicker({
       minViewMode: 2,
       format: 'yyyy'
     });
</script>
@endpush
