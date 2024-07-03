<?php include ("views/components/head.php") ?>
<div class="mapcontainer">

</div>
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.7467856551316!2d-74.00559052307652!3d45.77626467108082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20Saint-Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sfr!2sca!4v1720024952600!5m2!1sfr!2sca"
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
<div class="container">
    <nav>
        <a href="index"><img src="public/img/logo.png" alt="" id="logo"></a>
        <a href="index" class="desktopnav" style="text-decoration:underline">Menu</a>
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

                    <?php foreach ($sections as $section): ?>
                        <option value="<?= $section->title ?>"><?= $section->title ?></option>
                    <?php endforeach; ?>
                </select>
                <ul id="buttons">
                    <?php foreach ($sections as $section): ?>
                        <a href="#"><?= $section->title ?></a>
                    <?php endforeach; ?>
                </ul>
            </section>
            <div class="dishes">
                <?php foreach ($sections as $section): ?>
                    <ul class="<?= $section->title ?>">
                        <?php foreach ($dishes as $dish):
                            if ($dish->section_id == $section->id): ?>
                                <div class="dish">
                                    <div>
                                        <h3><?= $dish->title ?></h3>
                                        <p><?= $dish->price ?> $</p>
                                    </div>

                                    <div>
                                        <p><?= $dish->description ?></p>
                                        <img src="<?= $dish->image ?>" class="thumbnail">
                                    </div>
                                </div>
                                <hr>
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
                <a href="https://facebook.com/">
                    <img src="public/img/facebook.svg" alt=""></a>
                <a href="https://x.com/">
                    <img src="public/img/twitter.svg" alt=""></a>
                <a href="https://instagram.com/">
                    <img src="public/img/instagram.svg" alt=""></a>
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
            <?php if (isset($_GET["newsletter_success"])): ?>
                <p class="success">
                    Merci !
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["newsletter_error"])): ?>
                <p class="error">
                    An error occured
                </p>
            <?php endif; ?>
            <?php if (isset($_GET["newsletter_missing"])): ?>
                <p class="error">
                    Required information is missing
                </p>
            <?php endif; ?>
            <h4>Abonnez-vous à notre infolettre! <img src="public/img/mail.svg" alt=""></h4>
            <form action="newsletter-subscribe" method="post">
                <input type="text" name="first_name" placeholder="Prénom" class="inputField">
                <input type="text" name="last_name" placeholder="Nom de famille" class="inputField">
                <input type="email" name="email" placeholder="Courriel" class="inputField">
                <input type="submit" class="submitButton">
            </form>
        </section>
        <a href="" class="mapbutton location">Find our location</a>
    </footer>
</div>
<script src="public/js/menu.js"></script>
<?php include ("views/components/foot.php") ?>