@extends("layouts.master")
@section("page-title","Stores")
@section("page-sub-title","Edit Store")
@section('page-content')
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file" aria-hidden="true"></i>Basic info</h2>
        </div>
        <form action="{{ route('stores.update',$store->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method("put")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old("name","$store->name")}}">
                        <x-error-hint name="name"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                        <x-error-hint name="logo"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Address</label>
                        <div class="styled-select">
                            <select name="address">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}"  @if ($country->name==$store->address)
                                        selected
                                    @endif>
                                        {{ $country->name }} - {{ $country->code }}
                                       
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <x-error-hint name="address"/>
                </div>
            </div>
            <button type="submit" class="btn_1 medium" >Update</button>
        </form>
    </div>
@endsection