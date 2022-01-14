import * as flsFunctions from "./modules/function.js";

flsFunctions.isWebp();

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
