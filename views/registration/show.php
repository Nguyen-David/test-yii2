
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="header">
    <h2>Регистрация</h2>
</div>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => Url::to(['registration/registration']),
    'options' => ['class' => 'form-signin']
]); ?>

<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'password_hash')->passwordInput()?>

<div class="form-group">
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Назад', Url::to('/'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
