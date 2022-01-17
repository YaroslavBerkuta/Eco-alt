import * as flsFunctions from "./modules/function.js";
import Swiper, { Pagination, Grid, Navigation } from "swiper";
import { Loader } from "@googlemaps/js-api-loader";
flsFunctions.isWebp();
const loader = new Loader({
  apiKey: "AIzaSyBQDEs_7l7DkIcUkxfuDYexdljxizTfdZM",
});

loader.load().then(() => {
  const map = new google.maps.Map(document.getElementById("maphome"), {
    center: { lat: 49.43144054152188, lng: 27.011101098858056 },
    zoom: 15,
    mapId: "2686bd5387548a27",
  });
  new google.maps.Marker({
    position: { lat: 49.43144054152188, lng: 27.011101098858056 },
    map,
    icon: "/Eco-alt/img/mapPin.png"
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
