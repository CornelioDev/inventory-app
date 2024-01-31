<div class="md:w-6/12 mx-auto min-h-screen overflow-x-auto">
<h1 class="text-center pt-10">All articles</h1>    
<table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($articles)) : ?>
                <ul>
                    <?php foreach ($articles as $article) : ?>
                        <tr class="hover">
                            <td><?= $article['name'] ?></td>
                            <td><?= $article['description'] ?></td>
                            <td><?= $article['price'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No hay artículos disponibles.</p>
            <?php endif; ?>
        </tbody>
    </table>
</div>