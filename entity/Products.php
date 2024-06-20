<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $price
 * @property int $quantity
 * @property int $category_id
 *
 * @property Basket[] $baskets
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'quantity', 'category_id'], 'required'],
            [['description'], 'string'],
            [['price', 'quantity', 'category_id'], 'default', 'value' => null],
            [['price', 'quantity', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'img' => 'Картинка № 1',
            'img2' => 'Картинка № 2',
            'category_id' => 'Категория',
        ];
    }
}
