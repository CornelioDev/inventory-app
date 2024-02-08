<!-- <pre>
    <?= print_r($articles, true) ?>
</pre> -->
<div class="md:w-6/12 mx-auto min-h-screen overflow-clip">
    <div class="flex items-baseline justify-between mb-5 mx-10">
        <h1 class="text-center pt-10 block">All articles</h1>
        <a href="/article/new" class="btn btn-primary btn-xs">New Article</a>
    </div>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Warehouse</th>
                <th>Qty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($articles)) : ?>
                <?php foreach ($articles as $article) : ?>
                    <tr class="hover">
                        <td>
                            <a href="<?= "/article/{$article['id']}" ?>"><?= $article['name'] ?></a>
                        </td>
                        <td><?= $article['description'] ?></td>
                        <td><?= $article['warehouse_name'] ?></td>
                        <td class="text-center"><?= $article['quantity'] ?></td>
                        <td>
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="m-1"><ion-icon name="ellipsis-vertical-outline"></div>
                                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-24">
                                    <a href=<?= "/article/{$article['id']}/edit" ?> class="hover:bg-base-300 p-2"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                    <a href=<?= "/article/{$article['id']}/delete" ?> class="hover:bg-base-300 p-2"><ion-icon name="trash-outline" class="text-error"></ion-icon> Delete</a>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No hay artículos disponibles.</p>
            <?php endif; ?>
        </tbody>
    </table>
</div>