<!-- <pre>
    <?= print_r($article, true) ?>
    <?= print_r($warehouseItem, true) ?>
    <?= print_r($warehouse, true) ?>
</pre> -->
<div class="container mx-auto min-h-screen mt-20">
    <div class="flex justify-between">
        <figure id="article-image" class="w-10/12">
            <img src="https://images.unsplash.com/photo-1525385444278-b7968e7e28dc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Placeholder Image">
        </figure>
        <div id="article-details" class="pl-5">
            <p>Warehouse: <?= $article['warehouse_name'] ?></p>
            <p>Qty: <?= $article['quantity'] ?></p>
            <div class="divider"></div> 
            <p>Created: <?= $article['created_at'] ?></p>
            <p>Updated: <?= $article['updated_at'] ?></p>

            <div class="mt-5 w-min space-y-2">
                <a href="<?= "/article/{$article['id']}/edit" ?>" class="btn btn-wide btn-sm"><ion-icon name="create"></ion-icon>Edit</a>
                
                <a href="<?= "/article/{$article['id']}/delete" ?>" class="btn btn-wide btn-sm hover:bg-red-100"><ion-icon name="trash"></ion-icon>Delete</a>
            </div>
        </div>
    </div>
    <div id="article-info" class="mt-10">
        <h1><?= $article['name'] ?></h1>
        <p><?= $article['description'] ?></p>
        <p>Price: <?= $article['price'] ?></p>
    </div>
</div>