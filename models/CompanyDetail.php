<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_detail".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property integer $user_id
 * @property string $email
 * @property string $website
 * @property integer $status
 * @property string $create_at
 *
 * @property Users $user
 */
class CompanyDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'city', 'state', 'country', 'pincode', 'email', 'website', 'status'], 'required'],
            [['address'], 'string'],
            [['pincode'], 'number'],
            [['user_id', 'status'], 'integer'],
         //   [['create_at'], 'safe'],
            [['name', 'city', 'state', 'country', 'email', 'website'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
            'user_id' => 'User',
            'email' => 'Email',
            'website' => 'Website',
            'status' => 'Status',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
