<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MachineParameters;

/**
 * MachineParametersSearch represents the model behind the search form about `app\models\MachineParameters`.
 */
class MachineParametersSearch extends MachineParameters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'machine_id'], 'integer'],
            [['param_name', 'create_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        
		if(Yii::$app->user->identity->is_admin){
		   $query = MachineParameters::find();	
		}else{
		   $query = MachineParameters::find()->joinWith(['machine.plant'=>function ($query) {  $query->Where(['user_id'=>Yii::$app->user->id]); } ]);
		}
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'machine_id' => $this->machine_id,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'param_name', $this->param_name]);

        return $dataProvider;
    }
}
