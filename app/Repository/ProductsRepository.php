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

    public static function delete($data) {

        $product = self::findProduct($data);         

        if($product) {

            DB::table('products')
                ->where('id', $product->id)
                ->delete()
            ;

        }

    }

    public static function findProduct($data) {

        $product = DB::table('products')
            ->where([])
            ->first()
        ;    
        
        return $product;

    }    

    public static function getById($id) {
        $product = DB::table('products')
        ->where('id', $id)
        ->get();        

        return $product;

    }

}