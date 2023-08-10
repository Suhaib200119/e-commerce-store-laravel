@extends('layouts.master')
@section('page-title', 'Stores')
@section('page-sub-title', 'All Stores')
@section("css")
     {{-- <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

@endsection
@section('page-content')
   @if (session("success"))
   <div class="alert alert-success" role="alert">
    {{session("success")}}
  </div>
   @elseif (session("danger"))
   <div class="alert alert-danger" role="alert">
    {{seesion("danger")}}
  </div>
   @endif
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Stores
            <a  href="{{route("stores.create")}}" class="btn_1 medium" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i> add</a>
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
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 149.2px;">Name</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Address: activate to sort column ascending"
                                            aria-sort="descending" style="width: 72.2px;">Address</th>
                                        {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="logo: activate to sort column ascending"
                                            style="width: 29.2px;">Logo</th> --}}
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Operations date: activate to sort column ascending"
                                            style="width: 68.2px;">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $key => $store)
                                    <tr id="{{$store->id}}" role="row" class="@if ($key/2==0)
                                        even @else odd
                                    @endif">
                                        <td class="">{{$store->id}}</td>
                                        <td class="">{{$store->name}}</td>
                                        <td class="sorting_1">{{$store->address}}</td>
                            
                                        <td>
                                            <button onclick="viewStore({{$store->id}})" class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            <button onclick="confirmationFunction({{$store->id}})" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <a href="{{route("stores.edit",$store->id)}}"  class="btn btn-dark"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a style="width:200px;height: 33px;" href="{{route("categories.index",["store_id"=>$store->id])}}"  class="btn btn-info"  >View Categories</a>
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
@endsection
@section('js')
    <!-- Custom scripts for this page-->
    <script src="{{ asset('cms-styles/js/admin-datatables.js') }}"></script>
    <script src="{{ asset('cms-styles/js/store.js') }}"></script>

@endsection
