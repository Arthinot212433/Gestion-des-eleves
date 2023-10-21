$(function () {
 $(".menu-link").click(function () {
  $(".menu-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

const btns = document.querySelectorAll('.btnPe');

btns.forEach(btn => {
  btn.addEventListener('click', (e) => {
    // Supprime la classe 'active' de tous les boutons
    btns.forEach(b => b.classList.remove('active'));
    // Ajoute la classe 'active' au bouton cliqué
    e.currentTarget.classList.add('active');
  });
});


$(function () {
 $(".main-header-link").click(function () {
  $(".main-header-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

const dropdowns = document.querySelectorAll(".dropdown");
dropdowns.forEach((dropdown) => {
 dropdown.addEventListener("click", (e) => {
  e.stopPropagation();
  dropdowns.forEach((c) => c.classList.remove("is-active"));
  dropdown.classList.add("is-active");
 });
});

$(".search-bar input")
 .focus(function () {
  $(".header").addClass("wide");
 })
 .blur(function () {
  $(".header").removeClass("wide");
 });

$(document).click(function (e) {
 var container = $(".status-button");
 var dd = $(".dropdown");
 if (!container.is(e.target) && container.has(e.target).length === 0) {
  dd.removeClass("is-active");
 }
});

$(function () {
 $(".dropdown").on("click", function (e) {
  $(".content-wrapper").addClass("overlay");
  e.stopPropagation();
 });
 $(document).on("click", function (e) {
  if ($(e.target).is(".dropdown") === false) {
   $(".content-wrapper").removeClass("overlay");
  }
 });
});

$(function () {
 $(".status-button:not(.open)").on("click", function (e) {
  $(".overlay-app").addClass("is-active");
 });
 $(".pop-up .close").click(function () {
  $(".overlay-app").removeClass("is-active");
 });
});

$(".status-button:not(.open)").click(function () {
 $(".pop-up").addClass("visible");
});

$(".pop-up .close").click(function () {
 $(".pop-up").removeClass("visible");
});

const toggleButton = document.querySelector('.dark-light');
const body = document.body;

toggleButton.addEventListener('click', () => {
  body.classList.toggle('light-mode');

  // Enregistrez l'état du mode dans un cookie
  if (body.classList.contains('light-mode')) {
    document.cookie = 'lightModeEnabled=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
  } else {
    document.cookie = 'lightModeEnabled=false; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
  }
});

// Lorsque la page se charge, vérifiez si le cookie existe et restaurez le mode en conséquence
window.addEventListener('load', () => {
  const cookies = document.cookie.split(';');
  for (const cookie of cookies) {
    const [name, value] = cookie.split('=');
    if (name.trim() === 'lightModeEnabled') {
      if (value === 'true') {
        body.classList.add('light-mode');
      } else {
        body.classList.remove('light-mode');
      }
    }
  }
});


window.addEventListener('scroll', function() {
  const sections = document.getElementById('sections');
  const tableHeader = document.getElementById('table-header');
  const scrollY = window.scrollY;

  if (scrollY > 30) { // Vous pouvez ajuster cette valeur en fonction de la hauteur de la section fixe
    sections.style.top = (scrollY - 30) + 'px';
    tableHeader.style.top = '0';
  } else {
    sections.style.top = '0';
    tableHeader.style.top = '30px';
  }
});


