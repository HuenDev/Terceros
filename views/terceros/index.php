<?php

use yii\widgets\Pjax;
use yii\grid\GridView;
use app\components\Helpers;

/** @var yii\web\View $this */
?>

<header class="border-bottom border-dark-subtle border-1 mb-4 p-2">
    <h1>
        Terceros <span class="h5 text-body-secondary">Lista de terceros activos ordenados por fecha de registro</span>
    </h1>
</header>

<?=
//Quitar subrayado de los enlaces en encabezados de la tabla
$this->registerCss('.grid-view th a{text-decoration: none;}')
?>


<?php Pjax::begin([
    'id' => 'pjax-grid-view', 
    'enablePushState' => false,
    'options' => ['data-pjax'=> true]
]);
?>
<?= GridView::widget([
    'id' => 'grid-view',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'layout' =>
    '
    <div class="row d-flex border border-dark">
            <div class="col d-flex justify-content-end mb-2 bg-dark text-light p-3">
                {summary}
            </div>
        <div class="d-flex justify-content-end gap-2 mb-2">
        ' .
        Helpers::crearBotonModal() .
        Helpers::crearBotonResetGrid() .
        '
        </div>
        <div class="container-sm overflow-auto">
        {items}
        </div>
    </div>
    ',

    'columns' => [
        'tipo_documento',
        'razon_social',
        'telefono',
        'correo',
        'direccion',
        'saldo',
    ]
]);
?>
<?php Pjax::end(); ?>