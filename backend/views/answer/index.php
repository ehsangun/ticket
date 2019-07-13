<?php

use common\models\Ticket;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode('this id ticket is : '.Yii::$app->request->get('id')) ?></h1>

    <p>
        <?php
            $ticket=Ticket::findOne(Yii::$app->request->get('id'));
            if($ticket->isClosed==true){
                echo  Html::a('Create Answer', ['create','id'=>Yii::$app->request->get('id')],['class'=>'btn btn-success disabled']);
             }
            else{
                echo Html::a('Create Answer', ['create','id'=>Yii::$app->request->get('id')],['class'=>'btn btn-success']);
            }
                ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'message',
            'owner',
            //'IdTicket',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
