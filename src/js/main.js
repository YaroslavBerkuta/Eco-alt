import * as flsFunctions from "./modules/function.js";
import Swiper, { Pagination, Grid, Navigation } from "swiper";
import { Loader } from "@googlemaps/js-api-loader";
flsFunctions.isWebp();
const loader = new Loader({
  apiKey: "AIzaSyBQDEs_7l7DkIcUkxfuDYexdljxizTfdZM",
});

loader.load().then(() => {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 49.43144054152188, lng: 27.011101098858056 },
    zoom: 15,
    mapId: "2686bd5387548a27",
  });
  new google.maps.Marker({
    position: { lat: 49.43144054152188, lng: 27.011101098858056 },
    map,
    icon: "/img/mapPin.png",
  });
});
const menuList = document.querySelectorAll(".menu > li");
const submenu = document.querySelectorAll(".sub-menu");
menuList.forEach((item) => {
  item.addEventListener("mouseenter", () => {
    submenu.forEach((elem) => {
      elem.classList.remove("active");
    });
    if (item.querySelector(".sub-menu")) {
      item.querySelector(".sub-menu").classList.add("active");
      item.querySelector(".sub-menu").addEventListener("mouseleave", () => {
        item.querySelector(".sub-menu").classList.remove("active");
      });
    }
  });
});

const brandSwiper = new Swiper(".brand-swiper", {
  wrapperClass: "brand-wrapper",
  slideClass: "brand-item",
  spaceBetween: 24,
  slidesPerView: 6,
  loop: true,
});

const filterCatalog = new Swiper(".filter__catalog", {
  wrapperClass: "filter__flex",
  slideClass: "filter__item",
  spaceBetween: 24,
  loop: true,
  slidesPerView: 6,
  centeredSlides: true,
});

const filterItem = document.querySelectorAll(".filter__item");

filterItem.forEach((item) => {
  item.addEventListener("click", () => {
    filterItem.forEach((filter) => {
      filter.classList.remove("active");
    });
    item.classList.add("active");
  });
});

const filterTovar = new Swiper(".filter__tovar", {
  slideClass: "filter___cart",
  slidesPerView: 4,
  spaceBetween: 20,
  modules: [Grid, Navigation, Pagination],
  grid: {
    rows: 2,
    fill: "row",
  },
  pagination: {
    el: ".swiper-pagination.filter__tovar-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
const svgArrow =
  '<svg width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.666664 2.33324C0.666056 2.0217 0.774555 1.71979 0.97333 1.47991C1.08526 1.34489 1.22273 1.23329 1.37786 1.15149C1.53299 1.06969 1.70273 1.01929 1.87737 1.00319C2.052 0.987089 2.2281 1.0056 2.39557 1.05766C2.56304 1.10972 2.7186 1.1943 2.85333 1.30657L10 7.2799L17.16 1.51991C17.2964 1.40915 17.4533 1.32644 17.6218 1.27653C17.7902 1.22662 17.9669 1.2105 18.1416 1.22908C18.3163 1.24767 18.4856 1.3006 18.6398 1.38483C18.794 1.46906 18.93 1.58294 19.04 1.71991C19.1614 1.85786 19.2529 2.01941 19.3089 2.19443C19.3649 2.36945 19.3841 2.55415 19.3653 2.73694C19.3466 2.91973 19.2902 3.09666 19.1998 3.25664C19.1094 3.41662 18.9869 3.55618 18.84 3.66657L10.84 10.1066C10.6014 10.3027 10.3022 10.4099 9.99333 10.4099C9.6845 10.4099 9.38524 10.3027 9.14666 10.1066L1.14666 3.43991C0.985308 3.30615 0.857756 3.13624 0.774357 2.94396C0.69096 2.75168 0.654062 2.54245 0.666664 2.33324Z"fill="#1B1B1B"/></svg>';
const headerItemFirst = document.querySelectorAll(".menu > li");

headerItemFirst.forEach((item) => {
  if (!!item.querySelector(".sub-menu")) {
    item.querySelector("a").insertAdjacentHTML("afterEnd", svgArrow);
  }
});
(function () {
  var parent = document.querySelector(".price-slider");
  if (!parent) return;

  var rangeS = parent.querySelectorAll("input[type=range]"),
    numberS = parent.querySelectorAll("input[type=number]");

  rangeS.forEach(function (el) {
    el.oninput = function () {
      var slide1 = parseFloat(rangeS[0].value),
        slide2 = parseFloat(rangeS[1].value);

      if (slide1 > slide2) {
        [slide1, slide2] = [slide2, slide1];
      }

      numberS[0].value = slide1;
      numberS[1].value = slide2;
    };
  });

  numberS.forEach(function (el) {
    el.oninput = function () {
      var number1 = parseFloat(numberS[0].value),
        number2 = parseFloat(numberS[1].value);

      if (number1 > number2) {
        var tmp = number1;
        numberS[0].value = number2;
        numberS[1].value = tmp;
      }

      rangeS[0].value = number1;
      rangeS[1].value = number2;
    };
  });
})();

const gallerySwiper = new Swiper(".product__gallery", {
  wrapperClass: "product__gallery-wrapper",
  slideClass: "product__gallery-img",
  modules: [Navigation],
  navigation: {
    nextEl: ".product__gallery-next",
    prevEl: ".product__gallery-prev",
    disabledClass:"product__gallery-disable"
  },
});