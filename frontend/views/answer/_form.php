<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card text-center">
    <div class="card-header">

        <h1><?= $form->field($model, 'message')->textarea(['maxlength' => true,'value'=>Yii::$app->request->get('message'),]) ?></h1>
    </div>
    <div class="card-footer bg-success">
        <?= Html::submitButton('save', ['class' => 'btn btn-success ']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
