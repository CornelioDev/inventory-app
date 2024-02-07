<div class="container mx-auto w-2/6 h-screen mt-10">
    <h1 class="text-center">Edit Article Data</h1>
    <form action="/article/<?= $article['id'] ?>/edit" method="post" class="flex flex-col gap-3 mt-5">
        <input type="hidden" name="warehouseItem" value="<?= $current_warehouse[0]['id'] ?>">
        <input name="name" type="text" placeholder="Name" class="input input-bordered w-full " value="<?= $article['name'] ?>" />
        <textarea name="description" class="textarea textarea-bordered" placeholder="Short Description"><?= $article['description'] ?></textarea>
        <input name="price" type="number" placeholder="Price" class="input input-bordered w-full " value="<?= $article['price'] ?>" />
        
        <select name="warehouse" class="select select-bordered w-full">
            <option selected value="<?= $current_warehouse[0]['warehouse_id']; ?>">Change Warehouse</option>
            <?php foreach ($warehouses as $warehouse) : ?>
                <option value="<?= $warehouse['id']; ?>"><?= $warehouse['name']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label class="form-control">
            <div class="label">
                <span class="label-text">Available Qty:</span>
            </div>
            <input name="quantity" type="number" value="<?= $current_warehouse[0]['quantity']; ?>" class="input input-bordered w-3/12" />
        </label>
        <input type="submit" value="Save" class="btn btn-primary" />
    </form>
</div>