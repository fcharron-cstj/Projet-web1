<?php include ("views/components/adminhead.php") ?>
<header>
    <h1>Admin panel</h1>
    <ul class="navigation">
        <a href="content-menu-add">Add a menu item</a>
        <a href="content-category-add">Add a new category</a>
        <a href="account-list">Manage users</a>
        <a href="account-disconnect">Log out</a>
        <a href="index">Return home</a>

    </ul>
</header>
<main>
    <div class="container">
        <h1>Add a new menu item</h1>
        <section class="form">
            <!-- Messages -->
            <?php if (isset($_GET["register_success"])): ?>
                <p class="success">
                    Your account was created successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["information_missing"])): ?>
                <p class="error">
                    Information is missing
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["information_invalid"])): ?>
                <p class="error">
                    Information is invalid
                </p>
            <?php endif; ?>

            <form action="content-menu-store" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="title" autofocus>
                <input type="textarea" name="description" placeholder="description" autofocus>
                <input type="number" name="price" placeholder="price" min="1" step="any" />
                <label>
                    <p>Picture</p>
                    <input type="file" name="media">
                </label>
                <input type="submit" value="Submit" class="btn submit">
                <?php foreach ($categories as $category) : ?>
                <input type="checkbox" id="<?=$category->id?>" name="category" value="<?=$category->id?>">
                <label for="<?=$category->id?>"><?=$category->title?></label><br>
                <?php endforeach;?>
            </form>
        </section>
    </div>
</main>
<?php include ("views/components/foot.php") ?>