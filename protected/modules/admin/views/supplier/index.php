<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier';
$this->params['header']=$this->title;
$this->params['subheader']="Data ".$this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Tambah Supplier', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'nama',
        'alamat:ntext',
        'telp',
        'kota:ntext',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
<?php Pjax::end(); ?>
