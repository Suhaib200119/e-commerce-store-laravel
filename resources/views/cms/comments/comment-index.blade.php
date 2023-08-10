@extends('layouts.master')
@section('page-title', 'Comments')
@section('page-sub-title', 'All Comments')
@section('page-content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Categories
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="ID: activate to sort column ascending"
                                            style="width: 98.2px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="User Name: activate to sort column ascending"
                                            style="width: 149.2px;">User Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Product: activate to sort column ascending"
                                            style="width: 149.2px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Comment: activate to sort column ascending"
                                            style="width: 149.2px;">Comment</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Ip-Address: activate to sort column ascending"
                                            aria-sort="descending" style="width: 72.2px;">Ip-Address</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Date: activate to sort column ascending"
                                            aria-sort="descending" style="width: 72.2px;">Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Operations date: activate to sort column ascending"
                                            style="width: 68.2px;">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                        @foreach ($comment as $item)
                                            <tr id="{{ $item->id }}" role="row"
                                                >
                                                <td class="">{{ $item->id }}</td>
                                                <td class="">{{ $item->user->name }}</td>
                                                <td class="">{{ $item->product->name }}</td>
                                                <td class="sorting_1">{{ $item->comment }}</td>
                                                <td style="width: 200px" class="">{{ $item->ip_address }}</td>
                                                <td class="">{{ $item->created_at->format('Y:m:d') }}</td>
                                                <td>
                                                    <button onclick="confirmationFunction({{ $item->id }})"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Custom scripts for this page-->
    <script src="{{ asset('cms-styles/js/admin-datatables.js') }}"></script>
    <script src="{{ asset('cms-styles/js/comment.js') }}"></script>

@endsection
