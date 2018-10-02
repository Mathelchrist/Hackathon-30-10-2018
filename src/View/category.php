<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Category</h1>
    <ul>
        <?php foreach ($categorys as $category) : ?>

            <a href="category/<?= $category['id']?>"><li><?= $category['category'] ?></li></a>

        <?php endforeach ?>
    </ul>
    <a href='/'>Back to list</a>
</section>
</body>
</html>

