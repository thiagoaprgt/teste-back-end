<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    public static function saveProduct(Request $data) { 
        UserRepository::create($data);
    }   


    public static function deleteProduct(Request $data) {
        UserRepository::delete($data);
    }

    public static function editProduct(Request $data) {
        UserRepository::update($data);
        return view('editUser');
    }
}
