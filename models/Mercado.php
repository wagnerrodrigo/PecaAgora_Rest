<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mercado".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $category
 * @property string|null $price
 * @property string|null $availableQuantity
 * @property string|null $thumbnail
 * @property string|null $permalink
 */
class Mercado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mercado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category', 'price', 'availableQuantity', 'thumbnail', 'permalink'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'price' => 'Price',
            'availableQuantity' => 'Available Quantity',
            'thumbnail' => 'Thumbnail',
            'permalink' => 'Permalink',
        ];
    }
}
