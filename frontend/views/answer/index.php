



<?php
use common\models\AnswerSearch;use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AnswerSearch */
/* @var $answers yii\data\ActiveDataProvider */
/* @var $newAnswer common\models\AnswerSearch */
$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php foreach ($answers as $answer){?>

    <div class="body-message text-center">
    <div class="owner-message">
        <?php echo $answer->owner ?>:
    </div>
    <div class="message">
        <?php echo $answer->message?>
    </div>
    <div class="created-at">
        created at:<?php echo $answer->created_at ?>
        <br>
        <br>
        -------------
        -------------


    </div>
        <div>

<?php }?>

            <?php echo  Html::a('answer',['answer/create','id'=>Yii::$app->request->get('id')])?>
