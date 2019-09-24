/* js file for signup/ login page */
new WOW().init();

const signin = document.querySelector(".form-signin"),
  feedback = document.querySelector(".feedback");

signin.addEventListener("submit", function(e) {
  e.preventDefault();

  const username = signin.username.value;
  //   validation using regex
  const usernamePattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (usernamePattern.test(username)) {
    // feedback success
    feedback.textContent = "Email Valid";
  } else {
    feedback.textContent = "Email Invalid";
  }
});
