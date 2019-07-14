<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $tickets common\models\Ticket */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>

<?//=  ListView::widget([
//    'dataProvider' => $dataProvider,
//    'itemView' => 'ticketTemplate',
//]);?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//        'ID',
        'subject',
        'products',
        'description',
        //'answer',
        //'IdCustomer',
        //'IdAdmin',
        'created_at',
//        'isAnswered',
        [
            'label' => 'situation',
            'format' => 'raw',
            'value' => function ($data) {
                if($data->isClosed==false) {
                    if ($data->isAnswered == false) {
                        return Html::a('در انتطار', ['answer/index', 'id' => $data->ID], ['class' => 'btn btn-warning']);
                    } else {
                        return Html::a('جواب داری!', ['answer/index', 'id' => $data->ID,], ['class' => 'btn btn-success', 'data-method' => 'POST']);
                    }
                }
                else{
                    return Html::a('بسته شده', ['answer/index','id'=>$data->ID], ['class' => 'btn btn-default']);
                }
            },
        ],
    ],
]); ?>