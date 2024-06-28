<?php include ("views/components/head.php") ?>
<div class="container">
    <nav>
        <a href="index"><img src="public/img/logo.png" alt="" id="logo"></a>
        <a href="index" class="desktopnav">Menu</a>
        <a href="about" class="desktopnav">À propos</a>
        <a href="about#careers" class="desktopnav">Carrières</a>
        <p class="desktopnav">450 436-1531</p>
        <img src="public/img/mobilenav.svg" alt="" class="mobilenav">
    </nav>
    <main>
        <header id="menubanner">
            <h1>PUB G6</h1>
        </header>
        <div class="content" id="menu">
            <section>
                <h2 id="menutitle">Notre menu</h2>
                <select class="menu-select">
                    <option value="Entrée">Entrée</option>
                    <option value="Repas">Repas</option>
                    <option value="Dessert">Dessert</option>
                </select>
                <ul id="buttons">
                    <a href="#" id="appetizer">Entrée</a>
                    <a href="#" id="main">Repas</a>
                    <a href="#" id="dessert">Dessert</a>
                </ul>
            </section>
            <div class="dishes">
                <?php foreach ($sections as $section): ?>
                    <ul class="<?=$section->title?>">
                        <?php foreach ($dishes as $dish):
                            if ($dish->section_id == $section->id): ?>
                                <div>
                                    <h3><?= $dish->title ?></h3>
                                    <p><?= $dish->description ?></p>
                                    <p><?= $dish->price ?> $</p>
                                    <img src="" alt="">
                                </div>
                            <?php endif; endforeach; ?>
                    </ul><?php endforeach; ?>
            </div>
    </main>
    <footer>

        <section id="contact">
            <h4>Contact</h4>
            <ul class="address">
                <img src="public/img/location.svg" alt="">
                <span> 297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2</span>
            </ul>
            <ul>
                <img src="public/img/phone.svg" alt="">
                <span> 450 436-1531</span>
            </ul>
            <ul class="media-icons" id="media-icons">
                <img src="public/img/facebook.svg" alt="">
                <img src="public/img/twitter.svg" alt="">
                <img src="public/img/instagram.svg" alt="">
            </ul>
            <img src="" alt="">
        </section>
        <section id="comments">
            <h4>Commentaires</h4>
            <p id="comment">Excellent service et de la nourriture absolument délicieuse!</p>
            <ul class="star-container">
                <img src="public/img/star_full.svg" alt="">
                <img src="public/img/star_full.svg" alt="">
                <img src="public/img/star_full.svg" alt="">
                <img src="public/img/star_full.svg" alt="">
                <img src="public/img/star_full.svg" alt="">
            </ul>
        </section>
        <section id="newsletter">
            <h4>Abonnez-vous à notre infolettre! <img src="public/img/mail.svg" alt=""></h4>
            <form action="newsletter-subscribe" method="post">
                <input type="text" name="first_name" placeholder="Prénom" class="inputField">
                <input type="text" name="last_name" placeholder="Nom de famille" class="inputField">
                <input type="email" name="email" placeholder="Courriel" class="inputField">
                <input type="submit" class="submitButton">
            </form>
        </section>
    </footer>
</div>
<script src="public/js/main.js"></script>
<?php include ("views/components/foot.php") ?>