<?php
//Modelo para la gestión de datos - Base de datos

namespace app\models;

use yii\db\ActiveRecord; //clase base de Yii para trabajar con la base de datos en forma POO

class Terceros extends ActiveRecord
{
    //Nombre de la tabla
    public static function tableName()
    {
        return 'terceros';
    }

    //Establecer reglas de validación para los datos
    public function rules()
    {
        return [
            [['razon_social', 'tipo_documento', 'telefono', 'correo', 'direccion', 'saldo'], 'required'],
            [['tipo_documento'], 'string', 'max' => 3],
            [['razon_social'], 'string', 'max' => 255],
            [['telefono'], 'number'],
            [['correo'], 'email'],
            [['direccion'], 'string', 'max' => 1000],
            [['saldo'], 'number'],

        ];
    }
}
