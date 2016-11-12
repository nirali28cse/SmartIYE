<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "machine_parameters".
 *
 * @property integer $id
 * @property integer $machine_id
 * @property string $param_name
 * @property string $create_at
 *
 * @property MachineParameterTransaction[] $machineParameterTransactions
 * @property MachineParameterTransaction[] $machineParameterTransactions0
 * @property MachineMaster $machine
 */
class MachineParameters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'machine_parameters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machine_id', 'tag_id', 'param_name'], 'required'],
            [['tag_id','machine_id'], 'integer'],
          //  [['create_at'], 'safe'],
            [['param_name','units'], 'string', 'max' => 100],
            [['machine_id'], 'exist', 'skipOnError' => true, 'targetClass' => MachineMaster::className(), 'targetAttribute' => ['machine_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'machine_id' => 'Machine ID',
            'tag_id' => 'Tag ID',
            'param_name' => 'Tag Name',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineParameterTransactions()
    {
        return $this->hasMany(MachineParameterTransaction::className(), ['machine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineParameterTransactions0()
    {
        return $this->hasMany(MachineParameterTransaction::className(), ['machine_parameters_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachine()
    {
        return $this->hasOne(MachineMaster::className(), ['id' => 'machine_id']);
    }
}
