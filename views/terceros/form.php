<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; //Construir formularios HTML

/** @var yii\web\View $this */
/** @var app\models\Terceros $model */
/** @var yii\widgets\ActiveForm $form */
?>


<!-- Se pueden colocar labels en los atributos para evitar que Yii no los formatee automaticamente -->

<?php $form = ActiveForm::begin([
    'id'=>'form',
    'action' => ['create'],
    'options' => ['data-pjax'=>1],
]
) //Abre el ActiveForm
?>

<?= $form->field($model, 'tipo_documento')->label('Selecciona un tipo de documento*')->dropDownList(
    [
        'mensaje' => 'Selecciona un tipo de documento...',
        'CC' => 'CC',
        'NIT' => 'NIT'
    ],
    [
        'options' => [
            'mensaje' => ['style' => 'display:none']
        ]
    ]
) ?>
<?= $form->field($model, "razon_social")->label('Razón Social*')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, "telefono")->label('Telefono*')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'correo')->label('Correo*')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'direccion')->label('Dirección*')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'saldo')->label('Saldo*')->textInput(['maxlength' => true]) ?>


<div class="form-group">
    <?= Html::submitButton('Agregar tercero', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); //Cierre del ActiveForm
?>