<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'subject',
            'products',
            'description',
            //'answer',
            //'IdCustomer',
            //'IdAdmin',
            'created_at',
//            'isAnswered',

            [
                'label'=>'Situation',
                'format' => 'raw',
                'value'=>function ($data) {
                    if ($data->isAnswered == 0){
                        return Html::a('Answer', ['/answer/index','id'=>$data->ID], ['class' => 'btn btn-danger','data-method' => 'POST']);

                    }else {
                        return Html::a('Answer', ['/answer/index', 'id' => $data->ID], ['class' => 'btn btn-success','data-method' => 'POST']);
                    }
                    },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>