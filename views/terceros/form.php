<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; //Construir formularios HTML

/** @var yii\web\View $this */
/** @var app\models\Terceros $model */
/** @var yii\widgets\ActiveForm $form */
?>


<!-- Se pueden colocar labels en los atributos para evitar que Yii no los formatee automaticamente -->

<?php $form = ActiveForm::begin() //Abre el ActiveForm
?>

<?= $form->field($model, "id")->label("ID") ?>
<?= $form->field($model, 'tipo_documento')->label('Selecciona un tipo de documento*')->dropDownList(
    [
        'mensaje' => 'Selecciona un tipo de documento...',
        'Cédula de ciudadanía' => 'CC',
        'NIT' => 'NIT'
    ],
    [
        'options' => [
            'mensaje' => ['style' => 'display:none']
        ]
    ]
) ?>
<?= $form->field($model, "razon_social") ?>
<?= $form->field($model, "telefono") ?>
<?= $form->field($model, "correo") ?>
<?= $form->field($model, "direccion") ?>

<?= Html::submitButton("Agregar Tercero", ["class" => "btn btn-success"]) ?>

<?php ActiveForm::end(); //Cierre del ActiveForm
?>