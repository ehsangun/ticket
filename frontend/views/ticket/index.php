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

<?=  ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'ticketTemplate',
]);?>
