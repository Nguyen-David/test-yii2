
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<?php if(Yii::$app->session->getFlash('loginError')): ?>
    <div class="alert alert-danger" role="alert">
        <?=Yii::$app->session->getFlash('loginError')?>
    </div>
<?php endif; ?>

<div class="header">
    <h2>Вход в аккаунт</h2>
</div>

<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => Url::to(['entry/login']),
        'options' => ['class' => 'form-signin']
]); ?>

<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'password_hash')->passwordInput()?>

<div class="form-group">
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Регистрация', Url::to('/registration/show'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
