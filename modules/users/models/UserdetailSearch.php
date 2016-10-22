<?php

namespace app\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\Userdetail;

/**
 * UserdetailSearch represents the model behind the search form about `app\modules\users\models\Userdetail`.
 */
class UserdetailSearch extends Userdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'superuser', 'status', 'is_agree_with_terms_conditions', 'is_employeer', 'is_job_seeker', 'is_seller', 'is_advertiser'], 'integer'],
            [['username', 'password', 'email', 'name', 'auth_key', 'create_at', 'lastvisit_at'], 'safe'],
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
        $query = Userdetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_at' => $this->create_at,
            'lastvisit_at' => $this->lastvisit_at,
            'superuser' => $this->superuser,
            'status' => $this->status,
            'is_agree_with_terms_conditions' => $this->is_agree_with_terms_conditions,
            'is_employeer' => $this->is_employeer,
            'is_job_seeker' => $this->is_job_seeker,
            'is_seller' => $this->is_seller,
            'is_advertiser' => $this->is_advertiser,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
