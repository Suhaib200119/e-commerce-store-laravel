<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->query("store_id") == null) {
            return view("cms.categories.category-index", [
                "categories" => Auth::user()->categories,
            ]);
        }
        $store = Store::findOrFail($request->query("store_id"));
        return view("cms.categories.category-index", [
            "categories" => $store->categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cms.categories.category-create", [
            "stores" => Auth::user()->stores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();
        $category = new Category();
        $category->user_id = Auth::id();
        $category->store_id = $request->post("store");
        $category->name = $request->post("name");
        if ($category->save()) {
            Session::flash("success", "Added successfully");
        } else {
            Session::flash("danger", "Operation failed");
        }
        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            "category" => $category,
            "store_name" => $category->store->name,
            "store_logo" => $category->store->logo
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("cms.categories.category-edit", [
            "category" => $category,
            "stores"=>Auth::user()->stores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $request->validated();
        $category->store_id=$request->post("store");
        $category->name=$request->post("name");
        if($category->save()){
            Session::flash("success","Update completed successfully");
        }else{
            Session::flash("danger","The update did not complete successfully");
        }

        return redirect()->route("categories.index");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $count = Category::destroy($category->id);
        if ($count > 0) {
            return response()->json([
                "status" => true
            ], 200);
        } else if ($count <= 0) {
            return response()->json([
                "status" => false
            ], 400);
        }
    }
}
