<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


$this->title = 'Mercados';
$this->params['breadcrumbs'][] = $this->title;



?>

<div>
    <div class="body-content">
        <h1>Retorno api Mercado livre </h1>


        <div class="card" style="width: 18rem;">
        
            <img src="<?= $product['thumbnail'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?= $product['title'] ?></h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"> ID do produto mercado : <?= $product['id'] ?> </li>
                <li class="list-group-item"> Categoria: <?= $product['category'] ?> </li>
                <li class="list-group-item"> Preço: <?= $product['price'] ?> </li>
                <li class="list-group-item"> Quantidade disponivel: <?= $product['available_quantity'] ?> </li>
            </ul>
            <div class="card-body">
                <a href="<?= $product['permalink'] ?> " class="card-link"> Link do produto</a>
            </div>
        </div>

    </div>
</div>