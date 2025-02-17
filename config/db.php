<?php

return [
    'class' => 'yii\db\Connection', //Clase propia de Yii para gestionar la base de datos
    'dsn' => 'mysql:host=localhost;dbname=tesoreria', //Tipo, Host y nombre de la base de datos
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    //?La conexión de la base de datos puede ser accedida mediante Yii::$app->db

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
