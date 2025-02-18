<?php

namespace app\components;

use yii\helpers\Html;
use yii\bootstrap5\Modal;
use yii\web\JsExpression;

class Helpers
{
    public static function crearBotonModal($id = 'modal-id', $texto = 'Agregar nuevo tercero', $url = ['terceros/create'])
    {
        //! Botón que activa el modal
        $boton = Html::button($texto, [
            'class' => 'btn btn-success',
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#' . $id
        ]);

        // Capturar salida del modal
        ob_start();
        Modal::begin([
            'id' => $id,
            'title' => 'Crear Nuevo Registro',
            'size' => Modal::SIZE_LARGE,
        ]);

        echo "<div id='modal-content'>Cargando...</div>"; // Este es el espacio donde se cargará el formulario

        Modal::end();
        $modal = ob_get_clean();

        // Script para cargar AJAX cuando el modal se muestra
        $script = new JsExpression("
            $('#$id').on('shown.bs.modal', function () {
                $('#modal-content').load('" . \yii\helpers\Url::to($url) . "');
            });
        ");
        \Yii::$app->view->registerJs($script);

        return $boton . $modal;
    }


    // Agregar un nuevo botón para resetear el GridView sin recargar toda la página
    public static function crearBotonResetGrid($gridId = '#grid-view')
    {
        $botonReset = Html::button('Resetear Grid', [
            'class' => 'btn btn-info text-white',
            'id' => 'reset-grid',
        ]);

        // Script para hacer AJAX y resetear el GridView
        $script = new JsExpression("
                $('#reset-grid').click(function() {
                    $.pjax.reload({
                        container: '$gridId', // El contenedor del GridView
                        timeout: 2000 // Tiempo de espera para la respuesta
                    });
                });
            ");
        \Yii::$app->view->registerJs($script);

        return $botonReset;
    }
}
