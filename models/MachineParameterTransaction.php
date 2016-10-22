<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "machine_parameter_transaction".
 *
 * @property integer $id
 * @property integer $machine_parameters_id
 * @property string $machine_parameters_name
 * @property string $machine_parameters_value
 * @property string $create_date
 * @property string $create_time
 * @property integer $machine_id
 *
 * @property MachineParameters $machine
 * @property MachineParameters $machineParameters
 */
class MachineParameterTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'machine_parameter_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machine_parameters_id', 'machine_parameters_name', 'machine_parameters_value', 'create_date', 'create_time', 'machine_id'], 'required'],
            [['machine_parameters_id', 'machine_id'], 'integer'],
            [['create_date'], 'safe'],
            [['machine_parameters_name', 'create_time'], 'string', 'max' => 100],
            [['machine_parameters_value'], 'string', 'max' => 500],
            [['machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => MachineParameters::className(), 'targetAttribute' => ['machine_id' => 'id']],
            [['machine_parameters_id'], 'exist', 'skipOnError' => true, 'targetClass' => MachineParameters::className(), 'targetAttribute' => ['machine_parameters_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'machine_parameters_id' => 'Machine Parameters ID',
            'machine_parameters_name' => 'Parameters Name',
            'machine_parameters_value' => 'Parameters Value',
            'create_date' => 'Create Date',
            'create_time' => 'Create Time',
            'machine_id' => 'Machine ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachine()
    {
        return $this->hasOne(MachineMaster::className(), ['id' => 'machine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineParameters()
    {
        return $this->hasOne(MachineParameters::className(), ['id' => 'machine_parameters_id']);
    }
}
