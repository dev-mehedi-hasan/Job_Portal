@extends('layouts.apps')
@section('title', 'User-Management')
@push('style')
<style type="text/css">

    table{
        border: solid 1px;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush
@section('preloader')
    @parent
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Management') }}</div>

                <div class="card-body">
                    <div align="right">
                        <button type="button" name="create_user" id="create_user" class="genric-btn info radius">Create User</button>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table id="user_table" class="table table-light">
                            <thead>
                                <tr>
                                    <th >Role</th>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Phone</th>
                                    <th width ="10%">DoB</th>
                                    <th >Address</th>
                                    <th >Pic</th>
                                    <th width ="20%">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <br />
                    <br />
                    <div id="formModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                         <div class="modal-content">
                          <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                               </div>
                               <div class="modal-body">
                                <span id="form_result"></span>
                                <form method="post" id="user_form" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                 <div class="form-group">
                                   <label class="control-label col" >Name : </label>
                                   <div class="col">
                                    <input type="text" name="name" id="name" class="form-control" />
                                   </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col" >Email : </label>
                                    <div class="col">
                                     <input type="email" name="email" id="email" class="form-control" />
                                    </div>
                                   </div>
                                  <div class="form-group">
                                    <label class="control-label col" > Role : </label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="" disabled="" selected="">Choose your option</option>
                                        <option value="1">Employer</option>
                                        <option value="0">User</option>
                                    </select>
                                   </div>
                                   <div class="form-group">
                                    <label class="control-label col" >Phone : </label>
                                    <div class="col">
                                     <input type="number" name="phone_number" id="phone_number" class="form-control" />
                                    </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="control-label col" >Date of Birth : </label>
                                    <div class="col">
                                     <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" />
                                    </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="control-label col" >Address : </label>
                                    <div class="col">
                                     <input type="text" name="address" id="address" class="form-control" />
                                    </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="control-label col" >Pic : </label>
                                    <div class="col">
                                     <input type="file" name="pic" id="pic" class="form-control" />
                                     <span id="store_pic"></span>
                                    </div>
                                   </div>

                                   <br/>
                                    <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action" value="Add" />
                                    <input type="hidden" name="hidden_id" id="hidden_id" />
                                    <input type="submit" name="action_button" id="action_button" class="genric-btn info-border" value="Add" />
                                    </div>
                                </form>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div id="confirmModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <h4 align="center" style="margin:0;">Are you sure you want to remove this user?</h4>
                                </div>
                                <div class="modal-footer">
                                 <button type="button" name="ok_button" id="ok_button" class="delete genric-btn danger radius">OK</button>
                                    <button type="button" class="delete genric-btn info radius" data-dismiss="modal">Cancel</button>
                                </div>
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
@push('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('user.index') }}",
        },
        columns: [
        {
        data: 'is_admin',
        render: function(data) {
                if(data==1) {
                  return 'Employer'
                }
                else {
                  return 'User'
                }

              }
        },
        {
        data: 'name',
        name: 'name'
        },
        {
        data: 'email',
        name: 'email'
        },
        {
        data: 'phone_number',
        name: 'phone_number'
        },
        {
        data: 'date_of_birth',
        name: 'date_of_birth'
        },
        {
        data: 'address',
        name: 'address'
        },
        {
        data: 'pic',
        name: 'pic',
        render: function( data, type, full, meta ) {
            return "<img src=\"" + data + "\" height=\"50\" width=\"50\" alt=\"No Image\"/>";
        }
        },
        {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
        }
        ]
        });


        $('#create_user').click(function(){
        $('.modal-title').text('Assign New User');
        $('#action_button').val('Add');
        $('#action').val('Add');
        $('#form_result').html('');
        $('#formModal').modal('show');
        });


        $('#user_form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action').val() == 'Add')
            {
            action_url = "{{ route('user.store') }}";
            }

            if($('#action').val() == 'Update')
            {
            action_url = "{{ route('user.update') }}";

            }

            $.ajax({
                    url: action_url,
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success:function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                        html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        }
                        if(data.success)
                        {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#user_form')[0].reset();
                        $('#store_pic').html('');
                        $('#user_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }

                    });

        });


        $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
            $.ajax({
            url:"user/"+id+"/edit",
            dataType:"json",
                success:function(html){
                    $('#name').val(html.data.name);
                    $('#email').val(html.data.email);
                    $('#role').val(html.data.is_admin);
                    $('#phone_number').val(html.data.phone_number);
                    $('#date_of_birth').val(html.data.date_of_birth);
                    $('#address').val(html.data.address);
                    $('#store_pic').html("<img src='"+html.data.pic+"' width='50' alt='User Image' class='img-thumbnail' />");
                    $('#store_pic').append("<input type='hidden' name='hidden_image' value='"+html.data.pic+"' />");
                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text("Edit User Information");
                    $('#action_button').val("Update");
                    $('#action').val("Update");
                    $('#formModal').modal('show');
                }
            })
        });

        var user_id;
        $(document).on('click', '.delete', function(){
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
        });
        $('#ok_button').click(function(){
        $.ajax({
        url:"user/destroy/"+user_id,
        beforeSend:function(){
            $('#ok_button').text('Deleting...');
        },
        success:function(data)
        {
            setTimeout(function(){
            $('#confirmModal').modal('hide');
            $('#user_table').DataTable().ajax.reload();
            alert('A user has been deleted');
            }, 2000);
        }
        })
        });
    });

</script>
@endpush
