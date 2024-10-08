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
        <section>
             <!-- Messages -->
             <div class="msg">
            <?php if (isset($_GET["account_creation_fail"])) : ?>
                <p class="error">
                    An error occured
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["information_missing"])) : ?>
                <p class="error">
                    Required information is missing
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["password_not_matching"])) : ?>
                <p class="error">
                    The password must match the confirmation
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["register_success"])) : ?>
                <p class="success">
                    The account has been registered successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["delete-success"])): ?>
                    <p class="success">
                        A user was deleted successfully
                    </p>
                <?php endif; ?>
            </div>
            <h2>List of users</h2>
            <?php foreach ($users as $user):
                if ($user->role != 1): ?>
                    <span>Username :</span>
                    <p><?= $user->username ?></p>
                    <span>Email :</span>
                    <p><?= $user->email ?></p>
                    <img src="public/img/trash.svg" alt="">
                    <a href="account-delete?id=<?=$user->id?>" class="delete">Delete this user</a>
                <?php endif; endforeach; ?>

        </section>
        <section>
            <h2 href="">Add a new user</h2>
            <!-- Register form -->
            <form action="account-store" method="POST" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Username" autofocus>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="Confirm your password">
                <input type="submit" value="Create the account" class="btnsubmit">
            </form>
        </section>
    </div>
</main>
<?php include ("views/components/adminfoot.php") ?>