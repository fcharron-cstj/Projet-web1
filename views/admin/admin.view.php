<?php include ("views/components/adminhead.php") ?>
<header>
    <h1>Admin panel</h1>
    <ul class="navigation">
        <a href="admin-panel">Menu list</a>
        <a href="content-menu-add">Add a menu item</a>
        <a href="content-category-list">Manage menu sections</a>
        <a href="account-list">Manage users</a>
        <a href="account-disconnect">Log out</a>
        <a href="index">Return home</a>

    </ul>
</header>
<main>
    <div class="content">
        <ul class="appetizer">
            <?php foreach ($dishes as $dish):
                if ($dish->section_id == 1): ?>
                    <div class="dish">
                        <h3><?= $dish->title ?></h3>
                        <p><?= $dish->description ?></p>
                        <p><?= $dish->price ?> $</p>
                        <img src="" alt="">
                    </div>
                    <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                <?php endif; endforeach; ?>
        </ul>
        <ul class="main">
            <?php foreach ($dishes as $dish):
                if ($dish->section_id == 2): ?>
                    <div class="dish">
                        <h3><?= $dish->title ?></h3>
                        <p><?= $dish->description ?></p>
                        <p><?= $dish->price ?> $</p>
                        <img src="" alt="">
                    </div>
                    <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                <?php endif; endforeach; ?>
        </ul>
        <ul class="dessert">
            <?php foreach ($dishes as $dish):
                if ($dish->section_id == 3): ?>
                    <div class="dish">
                        <h3><?= $dish->title ?></h3>
                        <p><?= $dish->description ?></p>
                        <p><?= $dish->price ?> $</p>
                        <img src="" alt="">
                    </div>
                    <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                <?php endif; endforeach; ?>
        </ul>
    </div>
</main>

<?php include ("views/components/foot.php") ?>