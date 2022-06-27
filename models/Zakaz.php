<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_status
 * @property int $count
 * @property string $time
 *
 * @property SostavZakaza[] $sostavZakazas
 * @property StatusZakaza $status
 * @property User $user
 */
class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_status', 'count'], 'required'],
            [['id_user', 'id_status', 'count'], 'integer'],
            [['time'], 'safe'],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusZakaza::className(), 'targetAttribute' => ['id_status' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_status' => 'Id Status',
            'count' => 'Count',
            'time' => 'Time',
        ];
    }

    /**
     * Gets query for [[SostavZakazas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSostavZakazas()
    {
        return $this->hasMany(SostavZakaza::className(), ['id_order' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusZakaza::className(), ['id' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
