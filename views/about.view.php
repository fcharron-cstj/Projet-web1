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
        <header id="aboutbanner">
            <h1>PUB G6</h1>
        </header>
        <section>
            <p>Bienvenue chez Pub G6, un établissement emblématique qui a su séduire les gourmets depuis sa fondation il
                y a
                20 ans. Niché au cœur de notre charmante ville, notre restaurant propose une expérience culinaire
                unique,
                alliant tradition et innovation. Chaque plat est préparé avec des ingrédients frais et locaux, reflétant
                notre engagement envers la qualité et l'authenticité.</p>
            <img src="" alt="">
            <div class="line"></div>
            <p>Au fil des années, Pub G6 est devenu un lieu de rencontre incontournable pour les amoureux de la bonne
                cuisine. Notre équipe passionnée et talentueuse, dirigée par notre chef renommé, met un point d'honneur
                à
                offrir un service chaleureux et attentif. Que vous veniez pour un dîner romantique, une réunion entre
                amis
                ou un événement spécial, notre atmosphère conviviale et élégante vous accueillera toujours avec plaisir.
            </p>
            <div class="line"></div>
            <img src="" alt="">
            <p>Nous sommes fiers de notre héritage et de notre évolution constante. En célébrant deux décennies de
                succès,
                nous continuons à innover et à réinventer nos menus pour surprendre et ravir nos clients fidèles. Venez
                découvrir pourquoi le Bistro du Vieux-Port est une véritable institution culinaire, où chaque visite est
                une
                fête pour les sens.</p>
        </section>
        <div class="careersbanner">
            <h2>Carrières</h2>
        </div>
        <div id="careers">
            <b>Rejoignez Notre Équipe Dynamique au Pub G6!</b>
            <p>Vous cherchez à faire partie d'une équipe passionnée dans un environnement convivial et dynamique ? Le
                Pub G6
                est
                l'endroit idéal pour vous!</p>

            <b>Qui Sommes-Nous ?</b>
            <p>Le Pub G6 est un restaurant de style pub renommé, où la tradition rencontre l'innovation culinaire. Nous
                offrons
                une expérience unique à nos clients grâce à notre atmosphère chaleureuse, notre service exceptionnel et
                nos
                plats créatifs.</p>

            <b>Pourquoi Travailler avec Nous ?</b>
            <p>Environnement de Travail Positif : Rejoignez une équipe où l'entraide, la bonne humeur et la passion pour
                la
                cuisine sont au cœur de nos valeurs.
                Opportunités de Carrière : Nous croyons en la promotion interne et offrons de nombreuses opportunités de
                développement professionnel.
                Formation Continue : Que vous soyez débutant ou expérimenté, nous vous offrons des formations régulières
                pour
                perfectionner vos compétences.
                Avantages Attrayants : Profitez de repas offerts pendant vos shifts, de réductions pour vos amis et
                votre
                famille, et d'autres avantages intéressants.
                Postes Disponibles</p>
            <b> Envoyez-nous votre CV et une lettre de motivation à email@pubG6.com. Nous avons hâte de découvrir ce que
                vous
                pouvez apporter à notre équipe!</b>
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
    </footer>
</div>
<?php include ("views/components/foot.php") ?>