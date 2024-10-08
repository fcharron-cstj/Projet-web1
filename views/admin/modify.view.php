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
        <h1>Edit an existing menu item</h1>
        <div class="modifycontainer">
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

                <form action="content-menu-modify" method="POST" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="id" id="hiddenField" value="<?= $dish->id ?>" />
                    <input type="text" name="title" placeholder="title" value="<?= $dish->title ?>" autofocus>
                    <textarea name="description" placeholder="description" class="textarea"><?= $dish->description ?></textarea>
                    <input type="number" name="price" placeholder="price" min="1" step="any"
                        value="<?= $dish->price ?>" />
                    <label>
                        <p>Change the picture</p>
                        <input type="file" name="image">
                    </label>
                    <?php foreach ($categories as $category): ?>
                        <br>
                        <input type="checkbox" name="categories[]" value="<?= $category->id ?>" <?php foreach ($dish->categories as $cat) {
                              if ($cat == $category->id) {
                                  echo "checked='checked'";
                              }
                          } ?>>
                        <label for="<?= $category->id ?>"><?= $category->title ?></label>
                    <?php endforeach; ?>
                    <p>Section</p>
                    <select name="section">
                        <?php foreach ($sections as $section): ?>
                            <option value="<?= $section->id ?>" <?php if ($dish->section_id == $section->id) {
                                echo "selected";
                            } ?>>
                                <?= $section->title ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Submit" class="btn submit">
                </form>
                <a href="admin-panel" class="return">Return</a>
            </section>
            <div id="preview">
                <div>
                    <h2 id="preview-title"></h2>
                    <p id="preview-price"></p>
                </div>
                <div>
                    <p id="preview-description"></p>
                    <img id="preview-image" class="thumbnail" src="<?=$dish->image?>" alt="Image Preview">
                </div>
            </div>
    </div>
</main>
<script src="public/js/preview.js"></script>
<?php include ("views/components/adminfoot.php") ?>