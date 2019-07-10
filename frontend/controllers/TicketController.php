<?php

namespace frontend\controllers;

use common\models\Answer;
use common\models\User;
use Yii;
use common\models\Ticket;
use common\models\TicketSearch;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketController implements the CRUD actions for Ticket model.
 */
class TicketController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user = User::findIdentity(Yii::$app->user->getId());


        if ($user->role == 'customer') {
            $query = Ticket::find()->where('IdCustomer=' . Yii::$app->user->getId());
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 6,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'isClosed'=>SORT_ASC,
                        'isAnswered' => SORT_DESC,
                        'created_at' => SORT_DESC,

                    ]
                ],
            ]);

            $tickets = $dataProvider->getModels();

            return $this->render('index', [
                'tickets' => $tickets,
                'dataProvider' => $dataProvider,
            ]);
        } else if ($user->role == 'admin') {
            $query = Ticket::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $tickets = $dataProvider->getModels();
            return $this->render('index', [
                'tickets' => $tickets,
                'dataProvider' => $dataProvider,
            ]);
        }


    }
//
//    /**
//     * Displays a single Ticket model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//
//    }
//
//    /**
//     * Creates a new Ticket model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

            $model = new Ticket();
            $model->IdCustomer = Yii::$app->user->getId();
            date_default_timezone_set('Asia/tehran');
            $model->created_at = date("Y/m/d-H:m:s");

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['answer/index', 'id' => $model->ID, 'message' => $model->description]);
//                return $this->redirect(['ticket/index']);
            }


            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->redirect('?r=site/login');
        }
    }

//    /**
//     * Updates an existing Ticket model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->ID]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Ticket model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Ticket model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Ticket the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Ticket::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
//
    public function actionClose()
    {
        $ticket = Ticket::findOne(Yii::$app->request->get('id'));
        $ticket->isClosed = true;
        $ticket->save();
        return $this->redirect('index.php?r=ticket/index');
    }
}

