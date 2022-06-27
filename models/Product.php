<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $country
 * @property string $years
 * @property string $images
 * @property string $model
 * @property int $count
 * @property string $date
 * @property int $id_category
 *
 * @property Category $category
 * @property OrderItem[] $orderItems
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'country', 'years', 'images', 'model', 'count', 'id_category'], 'required'],
            [['price', 'count', 'id_category'], 'integer'],
            [['date'], 'safe'],
            [['title', 'country', 'years', 'images', 'model'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
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
            'price' => 'Price',
            'country' => 'Country',
            'years' => 'Years',
            'images' => 'Images',
            'model' => 'Model',
            'count' => 'Count',
            'date' => 'Date',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['id_product' => 'id']);
    }
    public static function getImages()
    {
        $rows = (new \yii\db\Query())
        ->select(['images', 'title'])
        ->from('product')
        ->orderBy('date desc')
        ->limit(5)
        ->all();
        
        return $rows;
    }
}
