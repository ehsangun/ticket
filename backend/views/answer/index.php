<?php

use common\models\Answer;
use common\models\AnswerSearch;
use common\models\Ticket;
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AnswerSearch */
/* @var $answers yii\data\ActiveDataProvider */
/* @var $newAnswer common\models\AnswerSearch */
/* @var $model common\models\Answer */
$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <p>
        <?php
            $ticket=Ticket::findOne(Yii::$app->request->get('id'));
            if($ticket->isClosed==true){
                $this->title = 'Answers is closed';
             }
            else{
                $this->title = 'Answers';
            }
                ?>
    </p>
<style>
    .userMessage{
        border-radius: 5px;
        background-color: #86BB71;
        margin-bottom: 3px;
        padding: 10px;
    }
    .admin {
        border-radius: 5px;
        background-color: #94C2ED;
        margin-bottom: 3px;
        padding: 10px;
    }
    .pn{
        text-align: right;
        color: grey;
    }

</style>
    <?php foreach ($answers as $answer){ ?>
<div class="<?php if (User::findByUsername($answer->owner)->role == "customer"){echo 'userMessage';}else{echo 'admin';} ?>">
    <?= $answer->message ?>
    <div class="pn"><code><?= $answer->owner." [ ".$answer->created_at." ]"?></code></div>
</div>




            <?php } ?>


</div>
<div class="answer-create">


    <?php
    if($ticket->isClosed==false) {
        echo $this->render('_form', [
            'model' => $model,
        ]);
    }?>

</div>
