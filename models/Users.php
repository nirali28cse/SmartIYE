<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property string $mobile_no
 * @property string $email
 * @property integer $status
 * @property integer $is_admin
 * @property string $create_at
 * @property string $update_at
 *
 * @property CompanyDetail[] $companyDetails
 * @property PlantMaster[] $plantMasters
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fullname', 'address', 'city', 'state', 'country', 'pincode', 'mobile_no', 'email', 'status', 'is_admin'], 'required'],
            [['status', 'is_admin'], 'integer'],
            [['address'], 'string'],
            [['pincode', 'mobile_no'], 'number'],
          //  [['create_at', 'update_at'], 'safe'],
            [['username', 'password', 'city', 'state', 'country', 'email'], 'string', 'max' => 100],
            [['fullname'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pincode' => 'Pincode',
            'mobile_no' => 'Mobile No',
            'email' => 'Email',
            'status' => 'Status',
            'is_admin' => 'Is Admin',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyDetails()
    {
        return $this->hasMany(CompanyDetail::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantMasters()
    {
        return $this->hasMany(PlantMaster::className(), ['user_id' => 'id']);
    }
}
