<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepository;

class Login extends Controller
{

    public static function loginAuthentication(Request $data) {    
        
        $user = UserRepository::findLogin($data);

        print_r([$data->email, $data->password]);

    }


    public static function saveUser(Request $data) { 
        UserRepository::create($data);
    }   


    public static function deleteUser(Request $data) {
        UserRepository::delete($data);
    }

}
