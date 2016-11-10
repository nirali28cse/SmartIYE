<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MachineParameterTransaction;

/**
 * MachineParameterTransactionSearch represents the model behind the search form about `app\models\MachineParameterTransaction`.
 */
class MachineParameterTransactionSearch extends MachineParameterTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'machine_parameters_id', 'machine_id'], 'integer'],
            [['machine_parameters_name', 'machine_parameters_value', 'create_date', 'create_time'], 'safe'],
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
		   $query = MachineParameterTransaction::find();	
		}else{
		   $query = MachineParameterTransaction::find()->joinWith(['machine.plant'=>function ($query) {  $query->Where(['user_id'=>Yii::$app->user->id]); } ]);
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
            'machine_parameters_id' => $this->machine_parameters_id,
            'create_date' => $this->create_date,
            'machine_id' => $this->machine_id,
        ]);

        $query->andFilterWhere(['like', 'machine_parameters_name', $this->machine_parameters_name])
            ->andFilterWhere(['like', 'machine_parameters_value', $this->machine_parameters_value])
            ->andFilterWhere(['like', 'create_time', $this->create_time]);

        return $dataProvider;
    }
}
