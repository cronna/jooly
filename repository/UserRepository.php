<?php

namespace app\repository;
use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::findOne(['id' => $id]);
    }

    public static function getUserByPhone($phone){
        return Users::findOne(['phone' => $phone]);
    }

    public static function createUser($phone, $password, $name, $surname){
        $user = new Users();
        $user->name = $name;
        $user->surname = $surname;
        $user->phone = $phone;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        return $user->id;
    }
}