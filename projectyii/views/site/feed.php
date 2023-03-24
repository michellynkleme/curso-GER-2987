<?php

use app\classes\widgets\BeginEndWidget;
use yii\jui\DatePicker;
use app\classes\widgets\HelloWidget;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

       <h1> Feed de Noticias via REST API </h1>
        <?php foreach($data as $row): ?>
            <p>ID: <?= $row['id'] ?></p>
            <p>Titulo: <?= $row['title'] ?></p>
            <p>Status: <?= $row['status'] ?></p>
        <?php endforeach; ?>

    </div>
</div>
