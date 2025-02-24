<?php
//Modelo que agrega capacidades de busqueda y filtros
namespace app\models;

use yii\data\ActiveDataProvider; //Clase de Yii que Permite manejar la paginación y filtrado de datos.
use app\models\Terceros; //Llamar a la clase del modelo Terceros
use app\components\SaldosFiltroTerceros; //Componente para filtros de saldo

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

        // if (!empty($parametros))
        // die(var_dump($parametros));

        if (!$this->load($parametros) || !$this->validate()) //Si no se pueden cargar los parámetros O si los datos no son válidos, retorna los registros sin filtrar
        {
            return $dataProvider;
        }

        //Llamada del componente reutilizable con los condicionales que debe cumplir el campo de saldo
        $query = SaldosFiltroTerceros::validadorSaldoFiltro($query, $this->saldo);

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
