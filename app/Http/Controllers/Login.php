<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepository;

class Login extends Controller
{
    public function __contruct() {
        
    }

    public static function loginAuthentication(Request $data) {    
        
        $user = UserRepository::findLogin($data);

        if($user) {
                        
            $_SESSION['user']['id'] = $user->id;
            $_SESSION['user']['name'] = $user->name;
            $_SESSION['user']['email'] = $user->email;
            $_SESSION['user']['password'] = $user->password;
            
            return redirect('/')->with('msg', 'Login feito com sucesso');
            
            
            
        }else {
            return redirect('/');
        }

    }


    public static function logout() {
        
        session_unset();

        session_destroy();

        return redirect('/');
    }


    public static function saveUser(Request $data) { 
        UserRepository::create($data);
    }   


    public static function deleteUser(Request $data) {
        UserRepository::delete($data);
    }

    public static function editUser(Request $data) {
        UserRepository::update($data);
        return view('editUser', [
            'name' => $_SESSION['user']['name'],
            'email' => $_SESSION['user']['email']            
        ]);
    }

}
