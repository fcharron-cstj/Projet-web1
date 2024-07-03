let form = document.querySelector("#form")
let title = form.title.value;
let description = form.description.value;
let price = form.price.value;
document.getElementById('preview-title').innerText = title;
document.getElementById('preview-description').innerText = description;
document.getElementById('preview-price').innerText = price;
document.addEventListener("keyup", update)
form.addEventListener("change", update)

function update() {
    let title = form.title.value;
    let description = form.description.value;
    let price = form.price.value;
    document.getElementById('preview-title').innerText = title;
    document.getElementById('preview-description').innerText = description;
    document.getElementById('preview-price').innerText = price + "$";
    let image = form.image.files[0];
    if (image) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(image);
    }
}


