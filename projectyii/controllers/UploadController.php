<?php 

namespace app\controllers;

use app\models\Clientes;
use GuzzleHttp\Psr7\UploadedFile;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile as WebUploadedFile;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $post = Yii::$app->getRequest()->post();
        $model = new Clientes();

        if ($model->load($post) && $model->validate()) {
            $model->fotoCliente = WebUploadedFile::getInstance($model, 'fotoCliente');
            $model->foto = $model->fotoCliente->name;
            $model->save();

            $uploadPath = Yii::getAlias('@webroot/files');
            $model->fotoCliente->saveAs($uploadPath . '/'. $model->fotoCliente->name);

            echo "<h1>DEU TUDO CERTO</h1>";
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}