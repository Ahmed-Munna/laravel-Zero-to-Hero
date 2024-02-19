<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAllProduct() {
        $products = DB::table('products')->get();

        return $products;
    }

    public function getCommonProduct() {
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->select('products.id', 'products.title', 'products.price', 'categories.categoryName', 'brands.brandName')
                        ->get();
        
        return $products;
    }

    public function getAdvanceProduct() {
        // $products = DB::table('products')
        //                 ->join('categories', function (JoinClause $join) {
        //                     $join->on('products.category_id', '=', 'categories.id')
        //                     ->where('products.price', '>', '2000');
        //                 })->get();

        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->where('products.price', '>', '2000')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->where('brands.brandName', '=', 'Xiaomi')
                        ->get();
        return $products;
    }

    public function getGroupProduct() {

        $products = DB::table('products')
                        ->select('products.id', 'products.title', 'products.price', 'brand_id')
                        ->groupBy('brand_id')
                        ->orderBy('id', 'asc')
                        ->get();

        return $products;
    }
}
