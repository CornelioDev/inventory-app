<div class="container mx-auto w-2/6 h-screen mt-10">
    <h1 class="text-center">Create New Warehouse</h1>
    <form action="/warehouse/new" method="post" class="flex flex-col gap-3 mt-5">
        <input name="name" type="text" placeholder="Name" class="input input-bordered w-full " />
        <textarea name="location" class="textarea textarea-bordered" placeholder="Where is placed"></textarea>
        <input type="submit" value="Save" class="btn btn-primary" />
    </form>
</div>