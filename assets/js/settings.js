$(document).ready(function (c) {
  $('.alert-close').on('click', function (c) {
      $('.main-mockup').fadeOut('slow', function (c) {
          $('.main-mockup').remove();
      });
  });
});

// settings.js
document.addEventListener("DOMContentLoaded", function () {
  // Get the icon popup element and the icon button that triggers the popup
  const iconPopup = document.getElementById("icon-popup");
  const iconSelectBtn = document.getElementById("change-icon");

  // Add event listener to the icon button
  iconSelectBtn.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default button click behavior

    // Toggle the visibility of the icon popup
    if (iconPopup.classList.contains("show-icon-popup")) {
      iconPopup.classList.remove("show-icon-popup");
    } else {
      iconPopup.classList.add("show-icon-popup");
    }
  });

  // Hide the icon popup when clicking outside of it
  window.addEventListener("click", function (event) {
    if (event.target !== iconSelectBtn && !iconPopup.contains(event.target)) {
      iconPopup.classList.remove("show-icon-popup");
    }
  });

  // Add event listener to each icon image
  const iconImages = iconPopup.querySelectorAll(".icon-grid img");
  iconImages.forEach(function (iconImage) {
    iconImage.addEventListener("click", function () {
      // Get the selected icon data attribute value and set it as the button text
      const selectedIcon = iconImage.getAttribute("data-icon");
      iconSelectBtn.textContent = `Selected Icon: ${selectedIcon}`;

      // Close the icon popup
      iconPopup.classList.remove("show-icon-popup");
    });
  });
});

// Optional: Clear the error message when the current password input is focused again
document.getElementById('current-password').addEventListener('focus', function() {
  document.getElementById('current-password-error').innerText = '';
});

