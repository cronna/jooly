<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property int $product_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'order_id'], 'required'],
            [['user_id', 'product_id'], 'default', 'value' => null],
            [['user_id', 'product_id', 'order_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
        ];
    }
}
