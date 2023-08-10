@extends("layouts.master")
@section("page-title","Categories")
@section("page-sub-title","Add Category")
@section("page-content")
<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-file" aria-hidden="true"></i>Basic info</h2>
    </div>
    <form action="{{ route('categories.store') }}" method="post" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old("name")}}">
                    <x-error-hint name="name"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Store</label>
                    <div class="styled-select">
                        <select name="store">
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">
                                    {{ $store->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-error-hint name="store"/>
            </div>
        </div>
        <button type="submit" class="btn_1 medium" > Save</button>
    </form>
</div>
@endsection