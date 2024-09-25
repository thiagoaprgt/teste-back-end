<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepository;

class Login extends Controller
{

    public static function loginAuthentication(Request $request) {       

    }


    public static function saveUser(Request $data) {       


        // print_r($data);

        UserRepository::create($data);
 
        return view('newUser', ['users' => $data]);


    }



    public static function listarUsers()      
    {
       
        $users = UserRepository::getAll();

        // print_r($users);
 
        return view('login', ['users' => $users]);


        
    }

    

}
