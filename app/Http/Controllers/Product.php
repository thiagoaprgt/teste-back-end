<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Repository\ProductsRepository; 


class Product extends Controller
{

    public function teste() {
        
        return view('teste');
   }


    public static function saveProduct(Request $data) {
        
        ProductsRepository::createProduct($data); 

    }   


    public static function deleteProduct(Request $data) {
        ProductsRepository::deleteProduct($data);
    }

    public static function getProdcutById($id) {        
        $product = ProductsRepository::getById($id);
        return $product[0];
        
    }
    
    public static function editProduct(Request $data) {
        
        ProductsRepository::update($data);
        
    }

    public static function getAllProducts() {
        $products = ProductsRepository::getAll();
        $categories = ProductsRepository::getAllCategories();
       
        return view('productsTemplate/getAllProducts', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

   
    public static function deleteCategory(Request $data) {
        ProductsRepository::deleteCategory($data);
    }


    public static function saveCategory(Request $data) {
        
        ProductsRepository::createCategory($data); 

    }


    public static function importProducts(Request $data) {        
        ProductsRepository::importProductsFromJson($data->json);
    }

    public static function searchFilters(Request $data) {
        ProductsRepository::searchFilters($data);       
    }


}
