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
    <div class="dishes">
        <?php foreach ($dishes as $dish):
            foreach ($sections as $section):
                if ($dish->section_id == $section->id): ?>
                    <ul>
                        <div class="dish">
                            <h3><?= $dish->title ?></h3>
                            <p><?= $dish->description ?></p>
                            <p><?= $dish->price ?> $</p>
                            <img src="" alt="">
                        </div>
                        <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                        <a href="content-menu-delete?id=<?= $dish->id ?>" class="delete">Delete</a>
                    </ul>
                <?php endif; endforeach; endforeach; ?>
    </div>
    <div class="otherdishes">
        <span>Uncategorized</span>
        <?php foreach ($dishes as $dish):
            if ($dish->section_id == null): ?>
                <ul>
                    <div class="dish">
                        <h3><?= $dish->title ?></h3>
                        <p><?= $dish->description ?></p>
                        <p><?= $dish->price ?> $</p>
                        <img src="" alt="">
                    </div>
                    <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                    <a href="content-menu-delete?id=<?= $dish->id ?>" class="delete">Delete</a>
                </ul>
            <?php endif; endforeach; ?>
    </div>
</main>

<?php include ("views/components/foot.php") ?>