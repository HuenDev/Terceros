<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex($message = "Hola mundo")
    {
        return $this->render("index", ["message" => $message]);
    }
}
