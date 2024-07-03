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
    <div class="container">
        <!-- Messages -->
        <div class="msg">
            <?php if (isset($_GET["access_denied"])): ?>
                <p class="error">
                    Access denied
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["add_success"])): ?>
                <p class="success">
                    Dish has been added successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["add_success"])): ?>
                <p class="error">
                    An error has occured
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["modify_success"])): ?>
                <p class="error">
                    Dish has been edited successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["modify_success"])): ?>
                <p class="success">
                    Dish has been deleted successfully
                </p>
            <?php endif; ?>
        </div>
        <div class="dishes">
            <?php foreach ($dishes as $dish):
                foreach ($sections as $section):
                    if ($dish->section_id == $section->id): ?>
                        <ul>
                            <div class="dish">
                                <h3><?= $dish->title ?></h3>
                                <p><?= $dish->description ?></p>
                                <p><?= $dish->price ?> $</p>
                                <img src="<?= $dish->image ?>" alt="" class="thumbnail">
                            </div>
                            <div class="buttons">
                                <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                                <a href="content-menu-delete?id=<?= $dish->id ?>" class="delete">Delete</a>
                            </div>
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
                        <div class="buttons">
                            <a href="content-menu-show?id=<?= $dish->id ?>" class="edit">Modify</a>
                            <a href="content-menu-delete?id=<?= $dish->id ?>" class="delete">Delete</a>
                        </div>
                    </ul>
                <?php endif; endforeach; ?>
        </div>
    </div>
</main>

<?php include ("views/components/adminfoot.php") ?>