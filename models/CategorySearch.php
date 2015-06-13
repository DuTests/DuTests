<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categories;

/**
 * TestsSearch represents the model behind the search form about `app\models\Tests`.
 */
class CategorySearch extends Categories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId'], 'integer'],
            [['category'], 'safe'],
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
        $query = Categories::find();

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
            'categoryId' => $this->categoryId,
            'category' => $this->category,

        ]);

        $query->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
