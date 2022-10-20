const profil = document.querySelector(".profil-info");
const avatar = document.querySelector(".avatar");
const menu = document.querySelector(".menu");
const list = document.querySelector("nav ul");

// guess variables

avatar.addEventListener("click", function () {
  profil.classList.toggle("show");
});

profil.addEventListener("mouseleave", function () {
  this.classList.remove("show");
  this.style.transition = ".2s linear";
});

//menu
menu.addEventListener("click", function () {
  list.style.visibility = "visible";
});
