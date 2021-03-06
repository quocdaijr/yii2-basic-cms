<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use admin\models\Menu;
use yii\helpers\Json;
use admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
    'menus' => Menu::getMenuSource(),
    'routes' => Menu::getSavedRoutes(),
]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

                    <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>

                    <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'order')->input('number') ?>

                    <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
                    <p><?php echo Yii::$app->formatter->asText('Example data input: $icon = \'<i class="nav-icon fas fa-link"></i>\';') ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?=
            Html::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'), ['class' => $model->isNewRecord
                ? 'btn btn-success' : 'btn btn-primary'])
            ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
