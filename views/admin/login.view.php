<?php include ("views/components/adminhead.php") ?>

<main>
    <div class="container">
        <div class="login">
            <h1 class="logo">Log in</h1>
            <a href="index" class="return">Return home</a>
            <section>
                <!-- Messages -->
                <div class="msg">
                    <?php if (isset($_GET["disconnected"])): ?>
                        <p class="success">
                            You have been disconnected
                        </p>
                    <?php endif; ?>
                    <?php if (isset($_GET["information_missing"])): ?>
                        <p class="error">
                            Required information is missing
                        </p>
                    <?php endif; ?>
                    <?php if (isset($_GET["information_invalid"])): ?>
                        <p class="error">
                            The account details are incorrect
                        </p>
                    <?php endif; ?>
                </div>
                <form action="account-connect" method="POST">
                    <input type="text" name="email" placeholder="Email" autofocus>
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Log in" class="btn submit">
                </form>
            </section>
        </div>
    </div>
</main>
<?php include ("views/components/adminfoot.php") ?>