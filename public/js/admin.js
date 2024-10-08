import Swal from '/cadriciel_pwa/node_modules/sweetalert2/src/sweetalert2.js'

//Deletion confirmation

document.querySelectorAll(".delete").forEach((element) => {
  element.addEventListener("click", (e) => {
      e.preventDefault();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.replace(e.target.href);
        }
      });
      console.log(e.target)
  })

})
