<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sostav_zakaza".
 *
 * @property int $id
 * @property int $count
 * @property int $id_order
 * @property int $id_rovar
 *
 * @property Zakaz $order
 * @property Tovar $rovar
 */
class SostavZakaza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sostav_zakaza';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'id_order', 'id_rovar'], 'required'],
            [['count', 'id_order', 'id_rovar'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Zakaz::className(), 'targetAttribute' => ['id_order' => 'id']],
            [['id_rovar'], 'exist', 'skipOnError' => true, 'targetClass' => Tovar::className(), 'targetAttribute' => ['id_rovar' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
            'id_order' => 'Id Order',
            'id_rovar' => 'Id Rovar',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Zakaz::className(), ['id' => 'id_order']);
    }

    /**
     * Gets query for [[Rovar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRovar()
    {
        return $this->hasOne(Tovar::className(), ['id' => 'id_rovar']);
    }
}
