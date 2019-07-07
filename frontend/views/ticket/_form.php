<?php

use common\models\Products;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="">
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card border-primary text-center">
            <div class="card-header"><?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?></div>
            <div class="product">

                <?= $form->field($model, 'products')->dropDownList(
                    ArrayHelper::map(products::find()->all(),'Id','Name'),
                    ['prompt'=>'select product']

                ) ?>
            </div>
            <div class="card-body ">
                <div class="description">
                    <p class="card-text"><?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?></p>
                </div>
            </div>
            <a href="#">
                <h1 class="card-footer">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </h1>
            </a>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>