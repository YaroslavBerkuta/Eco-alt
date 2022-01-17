import * as flsFunctions from "./modules/function.js";
import Swiper, { Pagination } from "swiper";
flsFunctions.isWebp();
Swiper.use([Pagination]);
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
  slidesPerView: 8,
  grid: {
    rows: 2,
  },
  pagination: {
    el: ".swiper-pagination.filter__tovar-pagination",
    clickable: true,
  },
});
