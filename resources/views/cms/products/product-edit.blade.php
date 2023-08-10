@extends("layouts.master")
@section("page-title","Products")
@section("page-sub-title","Edit Product")
@section("page-content")
<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file" aria-hidden="true"></i>Basic info</h2>
    </div>
    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old("name",$product->name)}}">
                    <x-error-hint name="name"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" value="{{old("description",$product->description)}}">
                    <x-error-hint name="description"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" min="0" class="form-control" name="quantity" value="{{old("quantity",$product->quantity)}}">
                    <x-error-hint name="quantity"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>BasePrice</label>
                    <input type="number" min="0" class="form-control" name="basePrice" value="{{old("basePrice",$product->basePrice)}}">
                    <x-error-hint name="basePrice"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>discount</label>
                    <input type="number" min="0"  class="form-control" name="discount" value="{{old("discount",$product->discount)}}">
                    <x-error-hint name="discount"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control" name="image" >
                    <x-error-hint name="image"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Select Category</label>
                    <div class="styled-select">
                        <select name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id==$product->category_id)
                                   selected 
                                @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-error-hint name="category"/>
            </div>
        </div>
        <button type="submit" class="btn_1 medium" >Update</button>
    </form>
</div>
@endsection