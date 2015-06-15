<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tests;

/**
 * TestsSearch represents the model behind the search form about `app\models\Tests`.
 */
class TestsSearch extends Tests
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testId', 'categoryId'], 'integer'],
            [['testName', 'startDate', 'endDate', 'categoryName'], 'safe'],
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
        $query = Tests::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'testId' => $this->testId,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'categoryId' => $this->categoryId,
            'categoryName' => $this->categoryName,
        ]);

        $query->andFilterWhere(['like', 'testName', $this->testName]);

        return $dataProvider;
    }
}
