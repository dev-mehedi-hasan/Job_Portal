@extends('layouts.apps')
@section('title', 'Create My Job Circular')
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
    <section class="job-single-content section-padding">
        <div class="container">
            <div class="d-flex justify-content-end">
                <form action="{{ route('myjob.index')}}" method="get">
                    @csrf
                    <button type="submit" class="genric-btn info radius">
                        {{ __('My Jobs') }}
                    </button>
                </form>
            </div>
            <br>
            @if (Session::has('job_create'))
            <div class="alert alert-success">{{ Session::get('job_create') }}</div>
            @endif
            <form method="POST" action="{{ route('myjob.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main-content">
                            <div class="single-content2 py-4">
                                <h4>
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" placeholder="Job Position" required>
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <br>
                                    <input id="office_name" type="text" class="form-control @error('office_name') is-invalid @enderror" name="office_name" value="{{ old('office_name') }}" placeholder="Office Name" required>
                                        @error('office_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </h4>
                                <p>
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"></textarea>
                                </p>
                            </div>
                            <div class="single-content3 py-4">
                                <h4>vacancy</h4>
                                <span class="ml-4">
                                    <input id="vacancy" type="number" class="form-control @error('vacancy') is-invalid @enderror" name="vacancy" value="{{ old('vacancy') }}" placeholder="Number of vacancy" required>
                                        @error('vacancy')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </span>
                            </div>
                            <div class="single-content4 py-4">
                                <h4>job responsibility</h4>
                                <p>
                                    <textarea id="responsibilities" class="form-control @error('responsibilities') is-invalid @enderror" name="responsibilities"></textarea>
                                </p>
                            </div>
                            <div class="single-content5 py-4">
                                <h4>Skills Requirements</h4>
                                <p>
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="text" name="skill_name[]" placeholder="Skill Name" class="form-control name_list"  required/></td>
                                            <td><button type="button" name="add" id="add" class="genric-btn success radius">Add More</button></td>
                                        </tr>
                                        <tr>
                                            @error('skill_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </tr>
                                    </table>
                                </p>
                            </div>
                            <div class="single-content5 py-4">
                                <h4>Educational Requirements</h4>
                                <p>
                                    <select id="required_education" class="form-control @error('required_education') is-invalid @enderror" name="required_education" required>
                                        <option value="M.SC./Masters">M.SC./Masters</option>
                                        <option value="B.Sc./Honours">B.Sc./Honours</option>
                                        <option value="HSC/Equivalent">HSC/Equivalent</option>
                                        <option value="SSC/Equivalent">SSC/Equivalent</option>
                                    </select>
                                    @error('required_education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <p>
                            </div>
                            <div class="single-content6 py-4">
                                <h4>employment status</h4>
                                <p>
                                    <select id="employment_status" class="form-control @error('employment_status') is-invalid @enderror" name="employment_status" required>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                    @error('employment_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <p>
                            </div>
                            <div class="single-content7 py-4">
                                <h4>other benifits</h4>
                                <textarea id="other_benifits" class="form-control @error('other_benifits') is-invalid @enderror" name="other_benifits"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="single-item mb-4">
                                <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                    <span>Salary&nbsp;&nbsp;&nbsp;</span>
                                    <span class="text-right">
                                        <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" placeholder="৳" required>
                                            @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </span>
                                </a>
                                <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                    <span>Location&nbsp;&nbsp;&nbsp;</span>
                                    <span class="text-right">
                                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}">
                                    </span>
                                </a>
                                <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                                    <span>Deadline&nbsp;</span>
                                    <span class="text-right">
                                        <input id="dead_line" type="date" class="form-control @error('dead_line') is-invalid @enderror" name="dead_line" required>
                                        @error('dead_line')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </span>
                                </a>
                                <div class="single-table text-center">
                                    <button type="submit" class="genric-btn info-border">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('footer')
    @parent
@endsection
@push('script')
<script>
    $(document).ready(function(){
         var i=1;
         $('#add').click(function(){
              i++;
              $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="skill_name[]" placeholder="Skill Name" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="genric-btn danger radius btn_remove">X</button></td></tr>');
         });
         $(document).on('click', '.btn_remove', function(){
              var button_id = $(this).attr("id");
              $('#row'+button_id+'').remove();
         });
    });
    </script>
@endpush
