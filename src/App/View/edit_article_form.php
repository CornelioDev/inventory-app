<div class="container mx-auto w-2/6 h-screen mt-10">
    <h1 class="text-center">Edit Article Data</h1>
    <form action="/article/update" method="post" class="flex flex-col gap-3 mt-5">
        <input type="hidden" name="id" value="<?= $article['id'] ?>">
        <input name="name" type="text" placeholder="Name" class="input input-bordered w-full " value="<?= $article['name'] ?>" />
        <textarea name="description" class="textarea textarea-bordered" placeholder="Short Description"><?= $article['description'] ?></textarea>
        <input name="price" type="number" placeholder="Price" class="input input-bordered w-full " value="<?= $article['price'] ?>" />
        <input type="submit" value="Save" class="btn btn-primary" />
    </form>
</div>