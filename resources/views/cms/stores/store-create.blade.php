@extends('layouts.master')
@section('page-title', 'Stores')
@section('page-sub-title', 'Add Store')
@section('page-content')
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file" aria-hidden="true"></i>Basic info</h2>
        </div>
        <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data" >
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
                                    <option value="{{ $country->name }}">
                                        {{ $country->name }} - {{ $country->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <x-error-hint name="address"/>
                </div>
            </div>
            <button type="submit" class="btn_1 medium" > Save</button>
        </form>
    </div>
@endsection
