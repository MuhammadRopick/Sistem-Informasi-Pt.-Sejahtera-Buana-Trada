<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = "Detail user ".$model->name;
$this->params['header']=$model->name;
$this->params['subheader']="Detail user ".$model->name;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <a href="<?= Url::to('index') ?>" class="btn btn-flat bg-navy"><i class="fa fa-arrow-left"></i> Kembali</a>
        <a href="<?= Url::to(['update','id'=>$model->id]) ?>" data-toggle="tooltip" data-placement="bottom" title="Edit User <?= $model->name ?>" class="btn btn-flat bg-purple"><i class="fa fa-edit"></i> Edit</a>
        <a href="<?= Url::to(['create']) ?>" data-toggle="tooltip" data-placement="bottom" title="Tambah User" class="btn btn-flat bg-olive"><i class="fa fa-plus"></i> Tambah</a>
        <a href="<?= Url::to(['delete','id'=>$model->id]) ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus User <?= $model->name ?>" class="btn btn-flat btn-danger" data-confirm="Yakin hapus user <?= $model->name ?> ?" data-method="post"><i class="fa fa-trash"></i> Hapus</a>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'username',
            [
                'label'=>'Hak Akses',
                'format'=>'raw',
                'value'=>$model->levelname->name
            ],
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
