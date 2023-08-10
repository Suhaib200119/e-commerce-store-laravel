@extends('layouts.master')
@section('page-title', 'Products')
@section('page-sub-title', 'All Products')
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
  {{-- $categories --}}
   @endif
   <div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Table Products
        <a  href="{{route("products.create")}}" class="btn_1 medium" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i> add</a>
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
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Store: activate to sort column ascending"
                                        style="width: 149.2px;">Category</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="description: activate to sort column ascending"
                                        aria-sort="descending" style="width: 72.2px;">description</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="quantity: activate to sort column ascending"
                                        aria-sort="descending" style="width: 72.2px;">quantity</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="basePrice: activate to sort column ascending"
                                        aria-sort="descending" style="width: 72.2px;">basePrice</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="discount: activate to sort column ascending"
                                        aria-sort="descending" style="width: 72.2px;">discount</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Operations date: activate to sort column ascending"
                                        style="width: 68.2px;">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr id="{{$product->id}}" role="row" class="@if ($key/2==0)
                                    even @else odd
                                @endif">
                                    <td class="">{{$product->id}}</td>
                                    <td class="">{{$product->name}}</td>
                                    <td class="sorting_1">{{$product->category->name}}</td>
                                    <td class="">{{$product->description}}</td>
                                    <td class="">{{$product->quantity}}</td>
                                    <td class="">{{$product->basePrice}}</td>
                                    <td style="width: 150px" class="">{{$product->discount??"no discount"}}</td>
                                    <td style="width: 200px">
                                        <button onclick="viewProduct({{$product->id}})" class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button onclick="confirmationFunction({{$product->id}})" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        <a href="{{route("products.edit",$product->id)}}"  class="btn btn-dark"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
    <script src="{{ asset('cms-styles/js/product.js') }}"></script>

@endsection
