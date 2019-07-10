<?php

namespace frontend\controllers;

use common\models\Ticket;
use common\models\User;
use Yii;
use common\models\Answer;
use common\models\AnswerSearch;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {

        $query=Answer::find()->where('IdTicket=' . Yii::$app->request->get('id'));
        $answers=new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>20
            ],
            'sort'=>[
                'defaultOrder'=>[
                    'created_at'=>SORT_ASC,
                ]
            ],
        ]);


        $newAnswer = new Answer();
        $user=User::findIdentity(Yii::$app->user->getId());

        $newAnswer->owner=$user->getUsername();
        date_default_timezone_set('Asia/tehran');
        $newAnswer->created_at = date('Y-m-d H:i:s');
        $newAnswer->IdTicket=Yii::$app->request->get('id');
        $newAnswer->message=Yii::$app->request->post('message',' ');

        if ($newAnswer->load(Yii::$app->request->post()) && $newAnswer->save()) {

            $ticket = new Ticket();
            $ticket = $ticket->getModel($newAnswer->IdTicket);
            $ticket->isAnswered = false;
            $ticket->save();
        }

        return $this->render('index', [
            'answers' => $answers->getModels(),
            'newAnswer'=>$newAnswer,
        ]);
    }

//    /**
//     * Displays a single Answer model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Answer model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Answer();
//
//        $owner=User::findIdentity(Yii::$app->user->getId());
//        $model->owner=$owner->getUsername();
//        date_default_timezone_set('Asia/tehran');
//        $model->created_at = date('Y-m-d H:i:s');
//
//        $model->IdTicket=Yii::$app->request->get('id');
//
//        $model->message=Yii::$app->request->post('message',' ');
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//
//            $ticket=new Ticket();
//            $ticket = $ticket->getModel($model->IdTicket);
//            $ticket->isAnswered=false;
//            $ticket->save();
//
//            return $this->redirect(['answer/index','id'=>$model->IdTicket]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Answer model.
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
//            return $this->redirect(['view', 'id' => $model->Id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Answer model.
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
//     * Finds the Answer model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Answer the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Answer::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
