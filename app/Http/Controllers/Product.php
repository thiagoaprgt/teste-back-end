<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Repository\ProductsRepository; 


class Product extends Controller
{

   


    public static function saveProduct(Request $data) {
        
        ProductsRepository::create($data);        
    }   


    public static function deleteProduct(Request $data) {
        ProductsRepository::delete($data);
    }

    public static function getProdcutById($id) {        
        $product = ProductsRepository::getById($id);
        $object = $product->toArray()[0];
        
        return $object;
        
    }
    
    public static function editProduct(Request $data) {
        ProductsRepository::update($data);
        
    }

    public static function getAllProducts() {
        $products = ProductsRepository::getAll();

        return view('productsTemplate/getAllProducts', ['products' => $products]);
    }


}
