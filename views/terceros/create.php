<?php

/** @var yii\web\View $this */
/** @var app\models\Terceros $model */


?>

<div class="terceros-create">

<h1>Terceros</h1>

    <?php echo $this->render('form', [
        'model' => $model,
    ]) //Permite que se visualice el formulario
    ?>

</div>
