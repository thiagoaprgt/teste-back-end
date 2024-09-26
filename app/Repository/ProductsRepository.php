<?php

namespace App\Repository;


use Illuminate\Support\Facades\DB;
use App\Models\Products;


class ProductsRepository {

    

    public function __construct() {

        
    }



    public static function getAll() {
        $products = DB::table('products')->get();

        return $products;
    }

        
    public static function create($data) {

        DB::table('products')->insert([            
            'name' => $data->name,
            'price' => $data->price,
            'description' => $data->description,
            'category' => $data->category,
            'image_url'=> $data->image_url
        ]);

    }

    public static  function update($data) {

        DB::table('products')
        ->where('id', $data->id)
        ->update([
            'name' => $data->name,
            'price' => $data->price,
            'description' => $data->description,
            'category' => $data->category,
            'image_url' => $data->image_url
        ])
        ;


    }

    public static function deleteProduct($data) {
        
        $product = DB::table('products')
        ->where(['id' => $data->id])
        ->delete();         

        

    }

    public static function findProduct($data, array $filter) {

        $product = DB::table('products')
            ->where($filter)
            ->first()
        ;    
        
        return $product;

    }    

    public static function getById($id) {
        $product = DB::table('products')
        ->where('id', $id)
        ->get();        

        return $product->toArray();

    }

    public static function getAllCategories() {        

        $categories = DB::table('products')
            ->get('category')
            ->groupBy('category')
            
        ;
        
        return $categories->toArray();

    }

    public static function deleteCategory($data) {
        $products = DB::table('products')
        ->where(['category' => $data->category])
        ->delete();
    }

}