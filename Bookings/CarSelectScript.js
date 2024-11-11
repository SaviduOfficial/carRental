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


// New JavaScript code for updating the large image
function changeLargeImage(smallImg) {
  // Get the large image element
  const largeImage = document.getElementById("largeImage");
  
  // Set the large image's source to the source of the clicked small image
  largeImage.src = smallImg.src;
}
