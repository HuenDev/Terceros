<?php
//Modelo que agrega capacidades de busqueda y filtros
namespace app\models;

use yii\base\Model; //Clase de Yii para interactuar con los modelos
use yii\data\ActiveDataProvider; //Clase de Yii que Permite manejar la paginación y filtrado de datos.
use app\models\Terceros; //Llamar a la clase del modelo Terceros
class TercerosSearch extends Terceros
{
    //Método que establece las reglas de validación para el filtrado en el gridview
    public function rules()
    {
        return [
            [['tipo_documento', 'razon_social', 'telefono', 'correo', 'direccion', 'saldo'], 'safe'], 
        ];
    }


    public function search($parametros)
    {
        $query = Terceros::find(); //Inicia la consulta con la DB

        //Instancia de la clase de yii para manejar la paginación y filtrados
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);


        if (!$this->load($parametros) || !$this->validate()) //Si no se pueden cargar los parámetros O si los datos no son válidos, retorna los registros sin filtrar
        {
            return $dataProvider;
        }


        //Validaciones de busqueda para saldo
        if (!empty($this->saldo) && preg_match('/^(<=|>=|<|>|=|!=)(\d+)$/', $this->saldo, $coincidencia))
        {
            $operador = $coincidencia[1];
            $valor = $coincidencia[2];
            $query->andWhere([$operador, 'saldo', $valor]);
        }

        elseif (!empty($this->saldo) && preg_match('/^(\d+)-(\d+)$/', $this->saldo, $coincidencia))
        {
            $valor1 = $coincidencia[1];
            $valor2 = $coincidencia[2];
            $query->andWhere(['between', 'saldo', $valor1, $valor2]);
        }
        else
        {
            // Si no hay operador especial, buscar coincidencia normal
            $query->andFilterWhere(['like', 'saldo', $this->saldo]);
        }


        //Cración de filtros para los demás campos
        $query->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'tipo_documento', $this->tipo_documento])
            ->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
