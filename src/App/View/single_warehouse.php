<div class="container mx-auto min-h-screen mt-5">
    <div class="flex flex-col">
        <div id="warehouse-items" class="">
            <h1 class="text-center"><?= $warehouse['name'] ?></h1>
            <p class="text-center">Location: <?= $warehouse['location'] ?></p>
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Quantity</th>
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
        <div id="warehouse-details" class="mt-5 flex gap-4 justify-center">
            <div class="mt-5 w-min space-y-2">
                <a href="<?= "/warehouse/{$warehouse['id']}/edit" ?>" class="btn btn-wide btn-sm"><ion-icon name="create"></ion-icon>Edit</a>
                <a href="<?= "/warehouse/{$warehouse['id']}/delete" ?>" class="btn btn-wide btn-sm hover:bg-red-100"><ion-icon name="trash"></ion-icon>Delete</a>
            </div>
        </div>
    </div>
</div>