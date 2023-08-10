@extends("layouts.master")
@section("page-title","Dashboard")
@section("page-sub-title","Statistics") 
@section("page-content")
    {{-- cards --}}
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{$store_count}} Stores</h5>
                    </div>
                </div>
                <a href="{{route("stores.index")}}" class="card-footer text-white clearfix small z-1" >
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{$categories_count}} Categories</h5>
                    </div>
                </div>
                <a href="{{route("categories.index")}}" class="card-footer text-white clearfix small z-1" >
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{$products_count}} Products</h5>
                    </div>
                </div>
                <a href="{{route("products.index")}}" class="card-footer text-white clearfix small z-1" >
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{$comments_count}} comments</h5>
                    </div>
                </div>
                <a href="{{ route("comments.index") }}" class="card-footer text-white clearfix small z-1" >
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection
@section("js")
     <!-- Custom scripts for all pages-->
     <script src="{{ asset('cms-styles/js/admin.js') }}"></script>
     <!-- Custom scripts for this page-->
     <script src="{{ asset('cms-styles/js/admin-charts.js') }}"></script>
@endsection