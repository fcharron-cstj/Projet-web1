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
        <h1>Edit an existing section</h1>
        <section class="form">
            <form action="content-category-modify" method="POST">
                <?php foreach ($sections as $section): ?>
                    <span>Modifier Section <?= $section->title ?></span><br>
                    <input type="text" name="title" placeholder="title" value="<?= $section->title ?>" autofocus>
                    <br>
                    <img src="public/img/trash.svg" alt="">
                <a href="content-category-remove?id=<?= $section->id?>">Supprimer</a>
                <br>
                <input type="submit" value="Modifier" name="<?=$section->id?>" class="btn submit">
                <br>
                <?php endforeach; ?>

            </form>
        </section>
        <section>
            <h2>Add a new section</h2>
            <form action="content-category-add" method="POST" enctype="multipart/form-data">
                <span>Nom section</span><br>
                <input type="text" name="title" placeholder="title" autofocus>
                <br>

                <input type="submit" value="Submit" class="btn submit">
            </form>
            <a href="admin-panel">Return</a>
        </section>
</main>
<?php include ("views/components/foot.php") ?>