<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;


$this->title = 'User';
$this->params['header']=$this->title;
$this->params['subheader']='Data '.$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <p>
    <?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success']) ?>
</p>
    <?php
    if(Yii::$app->session->hasFlash('true'))
    {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <i class="fa fa-check"></i> <?= Yii::$app->session->getFlash('true') ?>
        </div>
        <?php
    }
    elseif(Yii::$app->session->hasFlash('false'))
    {
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <i class="fa fa-warning"></i> <?= Yii::$app->session->getFlash('false') ?>
        </div>
        <?php
    }
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'username',
            [
                'label'=>'Level',
                'attribute'=>'level',
                'format'=>'raw',
                'value'=>function($data)
                {
                    return $data->levelname->name;
                },
                'filter'=>ArrayHelper::map($level,'id','name'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Aksi',
                'template' => '{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$model)
                    {
                        return "<a href='".$url."' data-toggle='tooltip' data-placement='top' class='btn btn-flat btn-primary btn-sm' title='detail ".$model->name."'><i class='fa fa-search'></i></a>";
                    },
                    'update'=>function($url,$model)
                    {
                        return "<a href='".$url."' data-toggle='tooltip' data-placement='top' class='btn btn-flat btn-success btn-sm' title='edit ".$model->name."'><i class='fa fa-edit'></i></a>";
                    },
                    'delete'=>function($url,$model)
                    {
                        return "<a href='".$url."' data-toggle='tooltip' data-placement='top' class='btn btn-flat btn-danger btn-sm' title='hapus ".$model->name."' data-confirm='Yakin hapus user ".$model->name."?' data-method='post' data-pjax='1'><i class='fa fa-trash'></i></a>";
                    },
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>