<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
use yii\filters\AccessControl;
use yii\web\Controller;

use common\models\Shop;

/**
 * Shop controller
 */
class ShopController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Shop::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $sort = new Sort([
            'attributes' => [
                'id',
            ],
        ]);
        $models = $query->orderBy($sort->orders)
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        # ----------

        $model = new Shop();
        $model->attributes = Yii::$app->request->post('searchForm');
        $dataProvider = new ActiveDataProvider([
            'query' => Shop::find(),
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        return $this->render('index', [
            'models'=>$models,
            'pages'=>$pages,
            'sort'=>$sort,

            'dataProvider'=>$dataProvider,
            'model'=>$model,
        ]);
    }
}
