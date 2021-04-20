@extends('layouts.apps')
@section('title', 'Resume-Skill')
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
                <div class="card-header">{{ __('Skill') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('skill.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-12">
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
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <button type="submit" class="genric-btn info">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table style="border: solid 1px;" class="table">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Skill Name</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @if($skill !=='')
                                @foreach($skill as $key =>$skills)
                                  <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $skills['skill_name'] }}</td>
                                    <td>
                                        <form action="{{ route('skill.destroy', $skills->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="genric-btn danger radius" type="submit">X</button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach
                                <div class="pagination">
                                    {{ $skill->links() }}
                                </div>
                                @endif
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content">
                            <form action="{{ route('info.index')}}" method="get">
                                @csrf
                                <button type="submit" class="genric-btn info circle">
                                    {{ __('Previous') }}
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <form action="{{ route('education.index')}}" method="get">
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
