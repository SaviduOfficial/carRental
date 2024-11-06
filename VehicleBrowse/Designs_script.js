document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const navbar_list = document.querySelector(".navbar_list ul");
  const navbar_list_li = document.querySelector(".navbar_list ul li");

  hamburger.addEventListener("click", () => {
    navbar_list.classList.toggle("active");
    navbar_list_li.classList.toggle("active");
    hamburger.classList.toggle("active");
  });
});
