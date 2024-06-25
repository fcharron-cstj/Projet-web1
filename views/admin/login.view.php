<?php include("views/components/adminhead.php") ?>

<main>
    <div class="container">
        <h1 class="logo">Log in</h1>
        <section class="login">
            <!-- Messages -->
            <?php if (isset($_GET["register_success"])) : ?>
                <p class="success">
                    Your account was created successfully
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["information_missing"])) : ?>
                <p class="error">
                    Information is missing
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["information_invalid"])) : ?>
                <p class="error">
                    Information is invalid
                </p>
            <?php endif; ?>

            <form action="account-connect" method="POST">
                <input type="text" name="email" placeholder="Email" autofocus>
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Log in" class="btn submit">
            </form>
        </section>
        <a href="index" class="button">Return home</a>
    </div>
</main>

<?php include("views/components/foot.php") ?>