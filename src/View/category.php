<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Items</h1>
    <ul>
        <?php foreach ($categorys as $category) : ?>

            <a href="category/<?= $category['id']?>"><li><?= $category['category'] ?></li></a>

        <?php endforeach ?>
    </ul>
</section>
</body>
</html>

