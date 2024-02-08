<?php

use Helpers\DateHelper;

$createdDate = DateHelper::formatTimestamp($article['created_at']);
$updatedDate = DateHelper::formatTimestamp($article['updated_at']);
?>

<div class="container mx-auto min-h-screen">
    <div class="flex flex-col justify-between">
        <figure id="article-image" class="">
            <img src="https://images.unsplash.com/photo-1525385444278-b7968e7e28dc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Placeholder Image">
        </figure>

    </div>
    <div id="article-info" class="mt-5">
        <h1 class="text-center"><?= $article['name'] ?></h1>
        <div class="px-5">
            <p><?= $article['description'] ?></p>
            <p>Price: <?= $article['price'] ?></p>
        </div>
    </div>

    <div id="article-details" class="px-5 mt-5">
        <p>Warehouse: <?= $article['warehouse_name'] ?></p>
        <p>Qty: <?= $article['quantity'] ?></p>
        <div class="divider"></div>
        <p class="text-xs">Created: <?= $createdDate ?></p>
        <p class="text-xs">Updated: <?= $updatedDate ?></p>

        <div class="mt-5 flex gap-4 justify-center">
            <a href="<?= "/article/{$article['id']}/edit" ?>" class="btn btn-sm w-40"><ion-icon name="create"></ion-icon>Edit</a>
            <a href="<?= "/article/{$article['id']}/delete" ?>" class="btn btn-sm w-40 hover:bg-red-100"><ion-icon name="trash"></ion-icon>Delete</a>
        </div>
    </div>
</div>