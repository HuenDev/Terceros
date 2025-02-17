<?php
//Modelo que maneja la lógica del formulario y sus validaciones
namespace app\models;

use yii\base\Model; //Clase base de YII - Permite heredar validaciones y reglas para formularios sin usar una base de datos.
use app\models\RegistroForm;

class TercerosForm extends Model
{
    //Atributos que almacenan los datos del usuario
    public $id;
    public $tipo_documento;
    public $razon_social;
    public $telefono;
    public $correo;
    public $direccion;



    //Método para asignar reglas de validación a los atributos (Son opcionales pero es importante tenerlos para que haya una correcta validación)
    public function rules()
    {
        return
            [
                [["id", "tipo_documento", "razon_social", "telefono", "correo", "direccion"], "required"],
                ["id", "number"],
                ["tipo_documento", "number"],
                ["razon_social", "string"],
                ["telefono", "number"],
                ["correo", "email"],
                ["direccion", "string"]
            ];
    }
}
