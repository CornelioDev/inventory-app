<div class="container mx-auto w-2/6 h-screen mt-10">
    <h1 class="text-center">Edit warehouse Data</h1>
    <form action="/warehouse/<?= $warehouse['id'] ?>/edit" method="post" class="flex flex-col gap-3 mt-5">
        <input name="name" type="text" placeholder="Name" class="input input-bordered w-full " value="<?= $warehouse['name'] ?>" />
        <textarea name="location" class="textarea textarea-bordered" placeholder="Short location"><?= $warehouse['location'] ?></textarea>
        <input type="submit" value="Update" class="btn btn-primary" />
    </form>
</div>