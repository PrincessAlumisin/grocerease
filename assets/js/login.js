const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

// Switch to sign up form
sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-form");
});

// Switch to sign in form
sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-in-form");
});
