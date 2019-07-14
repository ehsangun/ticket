<?php


use common\models\Ticket;
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel common\models\AnswerSearch */
/* @var $answers yii\data\ActiveDataProvider */
/* @var $newAnswer common\models\AnswerSearch */
/* @var $model common\models\Answer */
$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---->
<?php //foreach ($answers as $answer){ ?>
<!---->
<!--<div class="card text-center">-->
<!--    <div class="owner-message ">-->
<!--        --><?php //echo $answer->owner ?><!--:-->
<!--    </div>-->
<!--    <div class="message">-->
<!--        --><?php //echo $answer->message ?>
<!--    </div>-->
<!--    <div class="created-at">-->
<!--        created at:--><?php //echo $answer->created_at ?>
<!--    </div>-->
<!--    <div>-->
<!---->
<!--        --><?php //} ?>
<!--        --><?php
//        $ticket=Ticket::findOne(Yii::$app->request->get('id'));
//        if(!$ticket->isClosed==true){
//        $form =ActiveForm::begin();
//        ?>
<!--        <div class="card text-center">-->
<!--            <div class="card-header">-->
<!---->
<!--                <h1>--><?//= $form->field($newAnswer, 'message')->textarea(['maxlength' => true, 'value' => Yii::$app->request->get('message'),]) ?><!--</h1>-->
<!--            </div>-->
<!--            <div class="card-footer bg-success">-->
<!--                --><?php
//                echo Html::submitButton('ارسال پیام', ['class' => 'btn btn-success']);
//                echo  Html::a('بستن تیکت',['ticket/close','IdTicket'=>Yii::$app->request->get('id')],['class'=>'btn btn-danger'])
//
//                ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<?php //ActiveForm::end() ; ?><!----><?php //} ?>

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
                    text-align: left;
                }
                .admin {
                    border-radius: 5px;
                    background-color: #94C2ED;
                    margin-bottom: 3px;
                    padding: 10px;
                    text-align: left;
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
            if(!$ticket->isClosed==true){
                $form =ActiveForm::begin();
                ?>
                <div class="card text-center">
                    <div class="card-header">

                        <h1><?= $form->field($newAnswer, 'message')->textarea(['maxlength' => true, 'value' => Yii::$app->request->get('message'),]) ?></h1>
                    </div>
                    <div class="card-footer bg-success">
                        <?php
                        echo Html::submitButton('ارسال پیام', ['class' => 'btn btn-success']);
                        echo  Html::a('بستن تیکت',['ticket/close','IdTicket'=>Yii::$app->request->get('id')],['class'=>'btn btn-danger'])

                        ?>

                    </div>
                </div>
                <?php ActiveForm::end() ; ?><?php } ?>

        </div>


