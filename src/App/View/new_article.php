<div class="container mx-auto w-2/6 h-screen mt-10">
    <h1 class="text-center">Create New Article</h1>
    <form action="/article/new" method="post" class="flex flex-col gap-3 mt-5">
        <input name="name" type="text" placeholder="Name" class="input input-bordered w-full " />
        <!-- <input  type="text"  class="input input-bordered w-full " /> -->
        <textarea name="description" class="textarea textarea-bordered" placeholder="Short Description"></textarea>
        <input name="price" type="number" placeholder="Price" class="input input-bordered w-full " />
        <input type="submit" value="Save" class="btn btn-primary" />
    </form>
</div>