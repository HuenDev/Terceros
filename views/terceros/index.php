<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\Modal;

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

<?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' =>
    '
    <div class="row d-flex">
            <div class="col d-flex justify-content-end mb-2">
                {summary}
            </div>
        <div class="d-flex justify-content-end gap-2 mb-2">
        ' .
        Html::a(
            '<i class="fas fa-sync"></i> Resetear Filtros',
            ['index'],
            [
                'id' => 'reset-filters-button',
                'class' => 'btn btn-info text-white',
                'data-pjax' => 1
            ]
        ) .
        Html::button('Agregar nuevo tercero', [
            'class' => 'btn btn-success',
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#modalTercero',
            'id' => 'createTerceroModal',
        ]) .
        '
        </div>
    </div>
    {items}
    ',
    'columns' => [
        'id',
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

<!-- Modal Structure -->
<?php Modal::begin([
    'id' => 'modalTercero',
    'title' => 'Nuevo Tercero',
    'size' => Modal::SIZE_LARGE,
]); ?>
<div id="modalContent"></div>
<?php Modal::end(); ?>

<?php
$script = <<<JS
// Modal loader with correct URL paths
$(document).on('click', '#createTerceroModal', function(e) {
    e.preventDefault();
    $.get('/YII/terceros3/web/index.php?r=terceros%2Fcreate', function(data) {
        $('#modalContent').html(data);
        $('#modalTercero').modal('show');
    });
});

// Reset filters with PJAX
$(document).on('click', '#reset-filters-button', function(e) {
    e.preventDefault();
    $('.filters input').val('');
    $('.filters select').val('');
    
    $.pjax.reload({
        container: '#pjax-grid-view',
        url: $(this).attr('href'),
        timeout: 2000,
        push: false,
        replace: false
    });
});
JS;
$this->registerJs($script);
?>