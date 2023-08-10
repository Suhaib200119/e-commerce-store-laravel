<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(){
        $stores=Store::all();
        $topRated=array();
        foreach (Product::all() as $value) {
            if($value->avgRating()>=80){
                array_push($topRated,$value);
            }
        }

       
        return view(
            "website.index",
            [
                "stores"=>$stores,
                "productsTopRated"=>$topRated
            ]
        );
    }


    public function show(string $id){
        return view("website.show-product",[
            "product"=>Product::findOrFail($id),
        ]);
    }

    public function allProducts(){
        return view("website.show-all-products",[
                "products"=>Product::all(),
        ]);
    }
}
