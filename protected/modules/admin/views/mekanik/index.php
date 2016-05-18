<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MekanikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mekanik';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Tambah Mekanik', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'nama',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
