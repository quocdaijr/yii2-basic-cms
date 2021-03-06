<?php

use admin\components\ItemController;
use admin\models\AuthItem;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AuthItem */
/* @var $context ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$opts = Json::htmlEncode([
    'items' => $model->getItems(),
    'users' => $model->getUsers(),
    'getUserUrl' => Url::to(['get-users', 'id' => $model->name])
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="fas fa-sync fa-spin icon-sync-animate"></i>';
?>
<div class="auth-item-view">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title); ?></h1>
            <p>
                <?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']); ?>
                <?=
                Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->name], [
                    'class' => 'btn btn-danger',
                    'data-confirm' => Yii::t('admin', 'Are you sure to delete this item?'),
                    'data-method' => 'post',
                ]);
                ?>
                <?= Html::a(Yii::t('admin', 'Create'), ['create'], ['class' => 'btn btn-success']); ?>
            </p>
            <div class="row">
                <div class="col-sm-12">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'name',
                            'description:ntext',
                            'ruleName',
                            'data:ntext',
                        ],
                        'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>',
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th><?= Yii::t('admin', 'Assigned users'); ?></th>
                        </tr>
                        <tr>
                            <td id="list-users"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <input class="form-control search" data-target="available"
                           placeholder="<?= Yii::t('admin', 'Search for available'); ?>">
                    <select multiple size="20" class="form-control list" data-target="available"></select>
                </div>
                <div class="col-sm-2 text-center">
                    <br><br>
                    <?=
                    Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                        'class' => 'btn btn-success btn-assign',
                        'data-target' => 'available',
                        'title' => Yii::t('admin', 'Assign'),
                    ]);
                    ?><br><br>
                    <?=
                    Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                        'class' => 'btn btn-danger btn-assign',
                        'data-target' => 'assigned',
                        'title' => Yii::t('rbac-admin', 'Remove'),
                    ]);
                    ?>
                </div>
                <div class="col-sm-5">
                    <input class="form-control search" data-target="assigned"
                           placeholder="<?= Yii::t('rbac-admin', 'Search for assigned'); ?>">
                    <select multiple size="20" class="form-control list" data-target="assigned"></select>
                </div>
            </div>
        </div>
    </div>
</div>
