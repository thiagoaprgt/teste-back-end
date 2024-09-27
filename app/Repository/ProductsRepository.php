<?php

namespace App\Repository;


use Illuminate\Support\Facades\DB;
use App\Models\Products;


class ProductsRepository {

    

    public function __construct() {

        
    }

    public static function sanitize($data) {

        $data->name = filter_var($data->name , FILTER_SANITIZE_SPECIAL_CHARS) ? $data->name : '';
        $data->price = filter_var($data->price , FILTER_SANITIZE_SPECIAL_CHARS) ? $data->price : 0;
        $data->description = filter_var($data->description , FILTER_SANITIZE_SPECIAL_CHARS) ? $data->description : '';
        $data->category = filter_var($data->category , FILTER_SANITIZE_SPECIAL_CHARS)  ? $data->category : 'dont_show_this_product';
        $data->image_url = filter_var($data->image_url , FILTER_SANITIZE_SPECIAL_CHARS) ? $data->image_url : '';

        return $data;

    }



    public static function getAll() {
        $products = DB::table('products')
            ->where('description', '<>', 'dont_show_this_product')
            ->get();           
        ;

        return $products;
    }

        
    public static function createProduct($data) {

        $sanitize = self::sanitize($data);

        DB::table('products')->insert([            
            'name' => filter_var($data->name),
            'price' => $data->price,
            'description' => $data->description,
            'category' => $data->category,
            'image_url'=> $data->image_url
        ]);

    }


    public static function createCategory($data) {  
        
        $data->category = filter_var($data->category , FILTER_SANITIZE_SPECIAL_CHARS, FILTER_SANITIZE_ADD_SLASHES, FILTER_FLAG_STRIP_BACKTICK);

        DB::table('products')->insert([            
            'name' => $data->category,
            'price' => 0,
            'description' => 'dont_show_this_product', // essa descrição é no getAll desse repositório
            'category' => $data->category,
            'image_url'=> $data->category
        ]);

    }

    public static  function update($data) {

        $data = self::sanitize($data);

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

        $data->id = filter_var($data->id , FILTER_SANITIZE_SPECIAL_CHARS);
        
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
        $id = filter_var($id , FILTER_SANITIZE_SPECIAL_CHARS);
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
        $data->category = filter_var($data->category , FILTER_SANITIZE_SPECIAL_CHARS);
        $products = DB::table('products')
        ->where(['category' => $data->category])
        ->delete();
    }


    public static function importProductsFromJsonSanitize($json) {

        $json->name = filter_var($json->name , FILTER_SANITIZE_SPECIAL_CHARS);
        $json->price = filter_var($json->price , FILTER_SANITIZE_SPECIAL_CHARS);
        $json->description = filter_var($json->description , FILTER_SANITIZE_SPECIAL_CHARS);
        $json->category = filter_var($json->category , FILTER_SANITIZE_SPECIAL_CHARS);
        $json->image = filter_var($json->image , FILTER_SANITIZE_SPECIAL_CHARS);

        return $json;
    }


    public static function importProductsFromJson($json) {

        $products = json_decode($json);

        foreach($products as $product) {

            $product_sanitize = self::importProductsFromJsonSanitize($product);

            DB::table('products')->insert([            
                'name' => $product_sanitize->name,
                'price' => $product_sanitize->price,
                'description' => $product_sanitize->description,
                'category' => $product_sanitize->category,
                'image_url'=> $product_sanitize->image
            ]);
            
        }

        

    }

}