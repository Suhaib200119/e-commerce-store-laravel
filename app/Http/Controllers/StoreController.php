<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Country;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Auth::user()->stores;
        return view("cms.stores.store-index", [
            "stores" => $stores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view("cms.stores.store-create", [
            "countries" => $countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->validated();
        $store = new Store();
        $store->user_id = Auth::id();
        $store->name = $request->post("name");
        $store->address = $request->post("address");
        $file = $request->file("logo");
        $path = $file->store("stores_logos", "public");
        $store->logo = $path;
        if ($store->save()) {
            Session::flash("success", "Added successfully");
        } else {
            Session::flash("danger", "Operation failed");
        }
        return redirect()->route("stores.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return response()->json([
            "store" => $store
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $countries = Country::all();
        return view("cms.stores.store-edit",[
            "store"=>$store,
            'countries'=>$countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $request->validated();
        $store->name=$request->name;
        $store->address=$request->address;
        if($request->hasFile("logo")){
            Storage::disk("public")->delete($store->logo);
            $file=$request->file("logo");
            $path=$file->store("stores_logos","public");
            $store->logo=$path;
        }
        if($store->save()){
            Session::flash("success","Update completed successfully");
        }else{
            Session::flash("danger","The update did not complete successfully");
        }
        return redirect()->route("stores.index");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $count = Store::destroy($store->id);
        if ($count > 0) {
            return response()->json([
                "status" => true
            ],200);
        }else if($count<=0){
            return response()->json([
                "status" => false
            ],400);
        }
    }
}
