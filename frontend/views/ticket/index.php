<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $tickets common\models\Ticket */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<!---->
<!---->
<!--<div class="row">-->
<!--    --><?php //foreach ($tickets as $ticket){?>
<!--    <div class="col-md-4 ">-->
<!--            <div class="card text-center --><?php //if($ticket->isAnswered==1){?><!--border-danger--><?php //} ?><!--"style="margin-bottom: 5%">-->
<!--            <div class="card-header --><?php //if($ticket->isAnswered==1){?><!--border-danger--><?php //} ?><!-- ">--><?php //echo $ticket->subject ;?><!-- </div>-->
<!--            <div class="product ">-->
<!--                <ul class="list-group bg-success">-->
<!--                    <li class="list-group-item --><?php //if($ticket->products==1){?><!--bg-success--><?php //}?><!--">p1</li>-->
<!--                    <li class="list-group-item --><?php //if($ticket->products==2){?><!--bg-success--><?php //}?><!--">p2</li>-->
<!--                    <li class="list-group-item --><?php //if($ticket->products==3){?><!--bg-success--><?php //}?><!--">p3</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="card-body ">-->
<!--                <div class="description">-->
<!--                    <p class="card-text">--><?php //echo $ticket->description?><!--</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--                <h1 class="card-footer --><?php //if($ticket->isAnswered==1){?><!--border-danger--><?php //} ?><!-- ">-->
<!--                    --><?php // echo Html::a('answer',['answer/index','id'=>$ticket->ID])?>
<!--                </h1>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--    --><?php //} ?>
<!--</div>-->
<!---->

<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'ID',
        'subject',
        'products',
        'description',
//            'answer',
        //'IdCustomer',
        //'IdAdmin',
        'created_at',


        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

