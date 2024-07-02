

//Commentaires
let comments = [
    ["Excellent service et de la nourriture absolument délicieuse!", 5],
    ["Pub G6 est ma destination favorite lorsque je veux recevoir des invités. Fiables et toujours une ambiance très agréable.", 5],
    ["Même si les prix ne sont pas les plus bas, Pub G6 est une référence dans la qualité du service et de leur mets. Je recommande!", 4.5],
    ["Woow! Superbe présentation et les meilleures côtes levées que je n'ai jamais mangées", 5],
    ["Une expérience agréable et un service de qualité, dommage que ce ne soit pas plus proche!", 4],
    ["Si vous commandez à boire, demandez les conseils de Kevin! C'est un expert!", 5],
]
setInterval(() => {
    changeComment(comments, document.querySelector("#comment"))
}, 5000);

function changeComment(comments, target) {
    let rand = Math.floor(Math.random() * comments.length)
    target.innerHTML = comments[rand][0]

    let stars = comments[rand][1]
    let halfstar = false
    stars % 1 != 0 ? (halfstar = true) : (halfstar = false)
    stars = Math.floor(stars)
    addStar(0, stars, halfstar, document.querySelectorAll(".star-container img"))
}
function addStar(totalStars, fullstars, halfstar, starcontainer) {
    if (totalStars < 5) {
        if (fullstars > 0) {
            starcontainer[totalStars].setAttribute("src", "public/img/star_full.svg");
        }
        else {
            if (halfstar == true) {
                starcontainer[totalStars].setAttribute("src", "public/img/star_half.svg");

            }
            else {
                starcontainer[totalStars].setAttribute("src", "public/img/star_empty.svg");
            }
        }
        fullstars -= 1
        totalStars += 1
    }
    else {
        return true;
    }
    addStar(totalStars, fullstars, halfstar, starcontainer)

}

//Navigation pour mobile

function openNav() {
    const dark = document.querySelector(".container")
    dark.style.filter = "brightness(30%)";
    const navigation = document.createElement("div");
    navigation.className = "mobileNavigation"

    const menu = document.createElement("a");
    menu.className = "mobilenavbuttons"
    menu.innerHTML = "Notre menu"
    menu.href = "#menu";
    const about = document.createElement("a");
    about.className = "mobilenavbuttons"
    about.innerHTML = "À propos"
    about.href = "about";
    const career = document.createElement("a");
    career.className = "mobilenavbuttons";
    career.innerHTML = "Carrières";
    career.href = "about";
    dark.appendChild(navigation);
    dark.parentNode.insertBefore(navigation, dark);

    navigation.appendChild(menu);
    navigation.appendChild(about);
    navigation.appendChild(career);
}
function closeNav() {
    if (state == true) {
        const dark = document.querySelector(".container")
        const navigation = document.querySelector(".mobileNavigation")
        dark.style.filter = "brightness(100%)";
        navigation.remove();
    }
}
let state = false
let mobilenav = document.querySelector(".mobilenav");
document.addEventListener("click", (e) => {
    if (state != true) {
        if (e.target.className == "mobilenav") {
            openNav();
            state = true
        }
    }
    else if (document.querySelector(".container").contains(e.target)) {
        closeNav()
        state = false;
    }

})
