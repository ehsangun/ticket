
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $tickets common\models\Ticket */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

    <div class="col-md-4 border">
            <div class="card text-center <?php if($model->isAnswered==1){?>border-danger<?php } ?>"style="margin: 5%">
            <div class="card-header <?php if($model->isAnswered==1){?>border-danger<?php } ?> "><?php echo $model->subject ;?> </div>
            <div class="product ">
                <ul class="list-group ">
                    <li class="list-group-item"><?php echo $model->products?></li>
                </ul>
            </div>
            <div class="card-body ">
                <div class="description">
                    <p class="card-text"><?php echo $model->description?></p>
                </div>
            </div>

                <h1 class="card-footer <?php if($model->isAnswered==1){?>border-danger<?php } ?> ">
                   <div class="btn btn-success "> <?php  echo Html::a('answer',['answer/index','id'=>$model->ID])?></div>
                    <div class="btn btn-danger "><?php  echo Html::a('close',['ticket/close','id'=>$model->ID])?></div>
                </h1>

        </div>
    </div>
