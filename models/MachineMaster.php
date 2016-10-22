<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "machine_master".
 *
 * @property integer $id
 * @property integer $plant_id
 * @property string $machine_name
 * @property string $machine_details
 * @property string $create_at
 *
 * @property PlantMaster $plant
 * @property MachineParameters[] $machineParameters
 */
class MachineMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'machine_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plant_id', 'machine_name', 'machine_details'], 'required'],
            [['plant_id'], 'integer'],
            [['machine_details'], 'string'],
          //  [['create_at'], 'safe'],
            [['machine_name'], 'string', 'max' => 100],
            [['plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantMaster::className(), 'targetAttribute' => ['plant_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plant_id' => 'Plant',
            'machine_name' => 'Machine Name',
            'machine_details' => 'Machine Details',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlant()
    {
        return $this->hasOne(PlantMaster::className(), ['id' => 'plant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineParameters()
    {
        return $this->hasMany(MachineParameters::className(), ['machine_id' => 'id']);
    }
}
