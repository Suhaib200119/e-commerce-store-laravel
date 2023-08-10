<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->query("category_id")==null){
            return view("cms.products.product-index",[
                "products"=>Product::all()
            ]);
        }else{
            $category=Category::findOrFail($request->query("category_id"));
            $products=$category->products;
            return view("cms.products.product-index",[
                "products"=>$products
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cms.products.product-create",[
            "categories"=>Auth::user()->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        $prodcut=new Product();
        $prodcut->user_id=Auth::id();
        $prodcut->category_id=$request->post("category");
        $prodcut->name=$request->post("name");
        $prodcut->description=$request->post("description");
        $file=$request->file("image");
        $image=$file->store("products_images","public");
        $prodcut->image=$image;
        $prodcut->quantity=$request->post("quantity");
        $prodcut->basePrice=$request->post("basePrice");
        if($request->post("discount")>0){
            $prodcut->discount=$request->post("discount");
            $prodcut->discount_flag="D";
        }

        if($prodcut->save()){
            Session::flash("success", "Added successfully");
        } else {
            Session::flash("danger", "Operation failed");
        }

        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return response()->json(
            [
                "product"=>$product
            ],200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("cms.products.product-edit",[
            "product"=>$product,
            "categories"=>Auth::user()->categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();
        $product->category_id=$request->post("category");
        $product->name=$request->post("name");
        $product->description=$request->post("description");
        if($request->hasFile("image")){
            Storage::disk("public")->delete($product->image);
            $file=$request->file("image");
            $image=$file->store("products_images","public");
            $product->image=$image;
        }
        $product->quantity=$request->post("quantity");
        $product->basePrice=$request->post("basePrice");
        if($request->post("discount")>0){
            $product->discount=$request->post("discount");
            $product->discount_flag="D";
        }

        if($product->save()){
            Session::flash("success","Update completed successfully");
        }else{
            Session::flash("danger","The update did not complete successfully");
        }

        return redirect()->route("products.index");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $count = Product::destroy($product->id);
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
