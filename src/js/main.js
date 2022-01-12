import * as flsFunctions from "./modules/function.js";

flsFunctions.isWebp();

const menuList = document.querySelectorAll(".menu > li");
const submenu = document.querySelectorAll(".submenu");
menuList.forEach((item) => {
  item.addEventListener("mouseenter", () => {
    submenu.forEach((elem) => {
      elem.classList.remove("active");
    });
    if (item.querySelector(".submenu")) {
      item.querySelector(".submenu").classList.add("active");
      item.querySelector(".submenu").addEventListener("mouseleave", () => {
        item.querySelector(".submenu").classList.remove("active");
      });
    }
  });
});
