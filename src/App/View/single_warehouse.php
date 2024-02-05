<div class="container mx-auto min-h-screen mt-20">
    <div class="flex justify-between">
        <figure id="warehouse-items" class="w-10/12">
        <h2>Items stored on this warehouse</h2>
        </figure>
        <div id="warehouse-details" class="pl-5">
            <p>Warehouse: <?= $warehouse['name'] ?></p>
            <p>Created: <?= $warehouse['created_at'] ?></p>
            <p>Updated: 31/12/99*</p>

            <div class="mt-5 w-min space-y-2">
                <a href="<?= "/warehouse/{$warehouse['id']}/edit" ?>" class="btn btn-wide btn-sm"><ion-icon name="create"></ion-icon>Edit</a>
                
                <a href="<?= "/warehouse/{$warehouse['id']}/delete" ?>" class="btn btn-wide btn-sm hover:bg-red-100"><ion-icon name="trash"></ion-icon>Delete</a>
            </div>
        </div>
    </div>
</div>