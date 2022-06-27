<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tovar".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $photo
 * @property string $country
 * @property string $model
 * @property int $year
 * @property int $count
 * @property int $id_category
 *
 * @property Category $category
 * @property SostavZakaza[] $sostavZakazas
 */
class Tovar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tovar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'photo', 'country', 'model', 'year', 'count', 'id_category'], 'required'],
            [['price', 'year', 'count', 'id_category'], 'integer'],
            [['title', 'country', 'model'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 11],
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
            'photo' => 'Photo',
            'country' => 'Country',
            'model' => 'Model',
            'year' => 'Year',
            'count' => 'Count',
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
     * Gets query for [[SostavZakazas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSostavZakazas()
    {
        return $this->hasMany(SostavZakaza::className(), ['id_rovar' => 'id']);
    }

    public static function getPhotoTitle()
    {
    $rows = (new \yii\db\Query())
    ->select(['photo','title'])
    ->from('tovar')
    ->orderBy('id DESC')
    ->limit(5)
    ->all();
    return $rows;
    }
}
