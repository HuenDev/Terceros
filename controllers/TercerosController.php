<?php

namespace app\controllers;

use Yii;
use yii\web\Controller; //Clase de controladores base de yii 
use app\models\Terceros; //Llamar a la clase del modelo que contiene la interacción con la base de datos
use app\models\TercerosSearch;

class TercerosController extends Controller
{

    //Método Index para determinar la cantidad de elementos y la paginación del sitio
    public function actionIndex()
    {
        $searchModel = new TercerosSearch(); //Instancia de la clase TercerosSearch
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); //Obtiene los parametros de la busqueda desde la URL

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Terceros();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
}
