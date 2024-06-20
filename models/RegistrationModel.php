<?php

namespace app\models;

use app\repository\UserRepository;
use yii\base\Model;

class RegistrationModel extends Model
{
    public $phone;
    public $password;
    public $passwordRepeat;
    public $name;
    public $surname;

    public function rules()
    {
        return [
            [['phone', 'password', 'passwordRepeat', 'name'], 'required'],
            ['phone', 'validatePhone'],
            [['surname'], 'string', 'max'=>30],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'length' => [8, 12]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона',
            'password' => 'Придумайте пароль',
            'passwordRepeat' => 'Повторите пароль',
        ];
    }

    public function validatePhone($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UserRepository::getUserByPhone($this->phone);
            if ($user) {
                $this->addError($attribute, 'Этот номер телефона занят!');
            }
        }
    }
}