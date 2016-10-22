<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plant_master".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $plant_details
 * @property string $create_at
 *
 * @property MachineMaster[] $machineMasters
 * @property Users $user
 */
class PlantMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'plant_name', 'plant_details'], 'required'],
            [['user_id'], 'integer'],
            [['plant_name','plant_details'], 'string'],
         //   [['create_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'plant_details' => 'Plant Details',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineMasters()
    {
        return $this->hasMany(MachineMaster::className(), ['plant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
