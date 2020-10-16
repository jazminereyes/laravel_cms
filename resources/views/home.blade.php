@extends('layouts.main')

@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="pageheader-title">Reports</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reports</li>
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
                            <h5>List of Reports</h5>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#addReportModal"><i class="fa fa-plus mr-2"></i>Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Title</th>
                                    <th class="border-0" width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->title }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-edit" data-pk="{{ $report->id }}"><i class="fa fa-edit mr-2"></i>Edit</button>
                                        <button class="btn btn-danger btn-delete" data-pk="{{ $report->id }}"><i class="fa fa-trash mr-2"></i>Delete</button>
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

<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Report</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reports.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control form-control-lg" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="report">Report Content</label>
                        <textarea name="report" id="report" class="form-control form-control-lg" cols="30" rows="10" required></textarea>
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

<div class="modal fade" id="editReportModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Report</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control form-control-lg" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="report">Report Content</label>
                        <textarea name="report" class="form-control form-control-lg" id="report" cols="30" rows="10" required></textarea>
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

<div class="modal fade" id="deleteReportModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Report</h5>
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
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.btn-edit').click(function(){
            var pk = $(this).data('pk');
            var get_url = 'reports/' + pk;
            $.get(get_url, function(data){
                $('#editReportModal #title').val(data['data']['title']);
                $('#editReportModal #report').text(data['data']['report']);
                $('#editReportModal form').attr('action', 'reports/' + pk);
                $('#editReportModal').modal('show');
            });
        });

        $('.btn-delete').click(function(){
            var pk = $(this).data('pk');
            var get_url = 'reports/' + pk;
            $.get(get_url, function(data){
                $('#deleteReportModal p').html('Are you sure you want to delete <b>' + data['data']['title'] + '</b>?');
                $('#deleteReportModal form').attr('action', 'reports/' + pk);
                $('#deleteReportModal').modal('show');
            });
        });
    });
</script>
@endsection