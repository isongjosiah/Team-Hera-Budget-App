// begining of js for nav bar
const toggle = document.querySelector(".toggle");
let items = document.querySelectorAll(".item");

toggle.addEventListener("click", function() {
  items.forEach(item => {
    if (item.style.display == "") {
      item.style.display = "block";
    } else {
      item.style.display = "";
    }
  });
});

// end of js for Nav Bar
