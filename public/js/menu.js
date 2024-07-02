//Style du menu

arr = document.querySelectorAll("#buttons a")
if(arr.length >= 1)
{
    let first = arr[0];
    let last = arr[arr.length - 1];
    first.className = "first"
    last.className = "last"
}


//Fonction qui permet de changer de menu 

function changeMenu(menu) {
    document.querySelectorAll(".dishes ul").forEach((element) => {
        element.style.display = "none";
    });
    menu.style.display = "block";
}

// Changement du menu pour desktop

document.querySelectorAll("#buttons a").forEach((element) => {
    element.addEventListener("click", (e) => {
        document.querySelectorAll("#buttons a").forEach((element) => {
            element.style.backgroundColor = "white";
        });
        e.preventDefault();
        e.target.style.backgroundColor = "#D60000"
        changeMenu(document.querySelector("." + e.target.innerHTML))
    })
})

// Changement du menu pour mobile

let select = document.querySelector(".menu-select");
select.onchange = (e) => {
    changeMenu(document.querySelector("." + e.target.value))
}
