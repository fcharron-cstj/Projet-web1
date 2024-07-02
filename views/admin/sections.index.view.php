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
            <!-- Messages -->
            <?php if (isset($_GET["missing_info"])): ?>
                <p class="error">
                    Information is missing
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["error"])): ?>
                <p class="error">
                    An error occured
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["add_success"])): ?>
                <p class="success">
                    A section was added successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["edit_success"])): ?>
                <p class="success">
                    A section was edited successfully
                </p>
            <?php endif; ?>
            <?php foreach ($sections as $section): ?>
                <form action="content-category-modify" method="POST">
                    <span>Modifier Section <?= $section->title ?></span><br>
                    <input type="hidden" name="id" id="hiddenField" value="<?= $section->id ?>" />
                    <input type="text" name="title" placeholder="title" value="<?= $section->title ?>" autofocus>
                    <br>
                    <input type="submit" value="Modifier" class="btn submit">
                    <div class="buttons">
                        <a href="content-category-remove?id=<?= $section->id ?>" class="delete">Supprimer</a>
                        <img src="public/img/trash.svg" alt="">
                    </div>

                    <br>

                    <br>
                </form>
            <?php endforeach; ?>


        </section>
        <section>
            <h2>Add a new section</h2>
            <form action="content-category-add" method="POST" enctype="multipart/form-data">
                <span>Nom section</span><br>
                <input type="text" name="title" placeholder="title" autofocus>
                <br>

                <input type="submit" value="Submit" class="btn submit">
            </form>
        </section>
</main>
<?php include ("views/components/adminfoot.php") ?>