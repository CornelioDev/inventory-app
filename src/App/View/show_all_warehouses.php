<div class="md:w-6/12 mx-auto min-h-screen overflow-x-auto">
    <h1 class="text-center pt-10">All articles</h1>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($warehouses)) : ?>
                <ul>
                    <?php foreach ($warehouses as $warehouse) : ?>
                        <tr class="hover">
                            <td>
                                <a href="<?= "/warehouse/{$warehouse['id']}" ?>"><?= $warehouse['name'] ?></a>
                            </td>
                            <td><?= $warehouse['location'] ?></td>
                            <td>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="m-1"><ion-icon name="ellipsis-vertical-outline"></div>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-24">
                                        <a href=<?= "/warehouse/{$warehouse['id']}/edit" ?> class="hover:bg-base-300 p-2"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                        <a href=<?= "/warehouse/{$warehouse['id']}/delete" ?> class="hover:bg-base-300 p-2"><ion-icon name="trash-outline" class="text-error"></ion-icon> Delete</a>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <div class="text-center">
                    <p>No warehouses have been created yet</p>
                    <a href="/warehouse/new">Create your first warehouse</a>
                </div>
            <?php endif; ?>
        </tbody>
    </table>
</div>