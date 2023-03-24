<?php
/*@var $this \yii\web\View */
use yii\bootstrap5\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title)?></title>
    <?= $this->registerMetaTag(['name' =>'viewport', 'content'=>'width=device-width, initial-scale=1']) ?>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<h1> Area financeira</h1>

<div class="container">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>