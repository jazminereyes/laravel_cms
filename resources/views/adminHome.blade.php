@extends('layouts.main')

@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="pageheader-title">User</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.alert')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h5>List of Users</h5>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus mr-2"></i>Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0" width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-view" data-pk="{{ $user->id }}"><i class="fa fa-eye mr-2"></i>Reports</button>
                                        <button class="btn btn-warning btn-edit" data-pk="{{ $user->id }}"><i class="fa fa-edit mr-2"></i>Edit</button>
                                        <button class="btn btn-danger btn-delete" data-pk="{{ $user->id }}"><i class="fa fa-trash mr-2"></i>Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control form-control-lg" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-lg" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" name="password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewReportModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reports</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-lg" id="email" name="email" required>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete User</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @method('DELETE')
                    @csrf
                    <p>Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.btn-view').click(function(){
            var pk = $(this).data('pk');
            var get_url = 'users/' + pk;
            $.get(get_url, function(data){
                var html = '';
                $.each(data['data'], function(i, object){
                    html += '<div class="row mb-3"><div class="col-md-12"><h3>' + object['title'] +'</h3>';
                    html += '<textarea class="form-control mt-2" readonly>' + object['report'] +'</textarea></div></div><hr>';
                });
                $('#viewReportModal .modal-body').html(html);
                $('#viewReportModal').modal('show');
            });
        });

        $('.btn-edit').click(function(){
            var pk = $(this).data('pk');
            var get_url = 'users/' + pk + '/edit';
            $.get(get_url, function(data){
                $('#editUserModal #name').val(data['data']['name']);
                $('#editUserModal #email').val(data['data']['email']);
                $('#editUserModal form').attr('action', 'users/' + pk);
                $('#editUserModal').modal('show');
            });
        });

        $('.btn-delete').click(function(){
            var pk = $(this).data('pk');
            var get_url = 'users/' + pk + '/edit';
            $.get(get_url, function(data){
                $('#deleteUserModal p').html('Are you sure you want to delete <b>' + data['data']['name'] + '</b>?');
                $('#deleteUserModal form').attr('action', 'users/' + pk);
                $('#deleteUserModal').modal('show');
            });
        });
    });
</script>
@endsection