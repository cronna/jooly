<?php

namespace app\entity;

use Yii;
use app\repository\UserRepository;
use app\entity\SaleCard;
use app\entity\Reserves;
use app\entity\Orders;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string $phone
 * @property string $password
 * @property string|null $birtday
 *
 * @property Basket[] $baskets
 * @property SaleCard[] $saleCards
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findIdentity($id)
    {
        return new static(UserRepository::getUserById($id));
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'password'], 'required'],
            [['birtday'], 'safe'],
            [['name', 'surname', 'phone', 'password'], 'string', 'max' => 255],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'password' => 'Password',
            'birtday' => 'Birtday',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['user_id' => 'id']);
    }

    public function validatePassword($password){
        return password_verify($password, $this->password);
    }

    /**
     * Gets query for [[SaleCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleCards()
    {
        return $this->hasMany(SaleCard::class, ['user_id' => 'id']);
    }

    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
}
