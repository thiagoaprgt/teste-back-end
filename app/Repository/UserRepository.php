<?php

namespace App\Repository;

use App\Interfaces\RepositoriesInterface;
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
        DB::table('users')
            ->where('id', $data->id)
            ->update([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password
            ])
        ;

    }

    public static function delete(string $id) {

        DB::table('users')
        ->where('id', $data->id)
        ->delete();

    }

    public static function findLogin($email, $password) {

        $users = DB::table('users')
        ->select('*')
        ->where(
            ['email', '=' , $email],
            ['password', '=', $password]
        )
        ->get()
        ;

       

    }    

    public static function getById(string $id) {
        $user = DB::table('users')
        ->where('id', $data->id)
        ->get();

        return $user;

    }

}