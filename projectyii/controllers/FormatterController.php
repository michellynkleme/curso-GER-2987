<?php 

namespace app\controllers;
use Yii;
use yii\web\Controller;
class FormatterController extends Controller
{
    public function actionIndex()
    {
        $appLang = Yii::$app->language;
        $formatter = Yii::$app->formatter;

        echo "<h2>{$appLang}</h2>";

        echo "
        
            <p>Percentuais: {$formatter->asPercent(0.12345, 2)}</p>
            <p>Boolean: {$formatter->asBoolean(true)}</p>
            <p>Email: {$formatter->asEmail('michelly@hotmail.com')}</p>
            <p>NText: {$formatter->asNtext("Michelly\nNarita\nKuriyama")}</p>
            <p>Datas: {$formatter->asDate("2010-12-12", 'short')}</p>
            <p>Datas: {$formatter->asDate("2010-12-12", 'long')}</p>
            <p>Datas: {$formatter->asDate("2010-12-12", 'full')}</p>
            <p>Datas: {$formatter->asDate("2010-12-12", 'medium')}</p>
            <p>Datas: {$formatter->asDate("2010-12-12", 'dd/MM/YYYY')}</p>
            <p>Moedas: {$formatter->asCurrency(12234.23)}</p>
            <p>Sizes(Tamanhos): {$formatter->asShortSize(12234121212, 2)}</p>
            <p>Cpf: {$formatter->asCpf(10236470957)}</p>
            <p>CEP: {$formatter->asCep(83324040)}</p>
            <p>Cnpj: {$formatter->asCnpj(10236470957)}</p>


            ";


    }
}

?>