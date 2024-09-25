<?php

namespace App\Repository;


use Illuminate\Support\Facades\DB;
use App\Models\Users;


class UserRepository {

    

    public function __construct() {

        
    }



    public static function getAll() {
        $users = DB::table('users')->get();

        return $users;
    }

    
    public static function create($data) {

        DB::table('users')->insert([
            'remember_token' => $data->_token,
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);

    }

    public static  function update($data) {

        $user = self::findLogin($data);  
        
        

        if($user) {

            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $data->name,
                'email' => $data->newEmail,
                'password' => $data->newPassword
            ])
        ;

        }else{
            print_r($user);
        }




        

    }

    public static function delete($data) {

        $user = self::findLogin($data);         

        if($user) {

            DB::table('users')
                ->where('id', $user->id)
                ->delete()
            ;

        }

    }

    public static function findLogin($data) {

        $user = DB::table('users')
            ->where([
                ['email', '=', $data->email],
                ['password', '=', $data->password]
            ])
            ->first()
        ;    
        
        return $user;

    }    

    public static function getById(string $id) {
        $user = DB::table('users')
        ->where('id', $data->id)
        ->get();

        return $user;

    }

}