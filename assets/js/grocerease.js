let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
      
sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  // Seth New Code
  if (searchBox.classList.contains("active")){
    searchBox.classList.remove("active");
    if (threeBox.classList.contains("disappear")){
      threeBox.classList.remove("disappear");
    }
  }
  // Seth New Code
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};

let homeIcon = document.querySelector('.home-section')
let darkMode = document.querySelector('#dark-mode-icon')
let body = document.body;

let getMode = localStorage.getItem('mode');
if(getMode && getMode === 'dark'){
  homeIcon.classList.toggle('dark-nav')
  body.classList.toggle('dark-mode');
}

darkMode.addEventListener('click', () =>{
  homeIcon.classList.toggle('dark-nav')
  body.classList.toggle('dark-mode');

  if (!body.classList.contains('dark-mode')){
    return localStorage.setItem('mode', 'light');
  }
  localStorage.setItem('mode', 'dark');
})

let logoutButton = document.querySelector('.log_out');
let popup = document.getElementById('logout-popup');
let cancelLogoutButton = document.getElementById('cancel-logout');

logoutButton.addEventListener('click', function (event) {
  event.preventDefault();
  popup.style.display = 'block';
});

cancelLogoutButton.addEventListener('click', function () {
  popup.style.display = 'none';
});


document.addEventListener("DOMContentLoaded", function() {
  const iconPopup = document.getElementById("icon-popup");
  const iconSelectBtn = document.getElementById("change-icon");
  const userIcon = document.getElementById("user-profile-icon");
  const userName = document.getElementById("user-name");

  // Check if the selected icon is stored in localStorage
  const storedIcon = localStorage.getItem("selectedIcon");
  if (storedIcon) {
    userIcon.src = storedIcon;
  }

  // Add event listener to the icon select button
  iconSelectBtn.addEventListener("click", function() {
    iconPopup.style.display = "flex";
  });

  // Add event listener to each icon image
  const iconImages = document.querySelectorAll(".icon-grid img");
  iconImages.forEach(function(icon) {
    icon.addEventListener("click", function() {
      const selectedIcon = this.getAttribute("data-icon");
      const newImage = new Image();
      newImage.addEventListener("load", function() {
        userIcon.src = newImage.src;
        // Store the selected icon in localStorage
        localStorage.setItem("selectedIcon", newImage.src);
      });
      newImage.src = "assets/images/" + selectedIcon;
      iconPopup.style.display = "none";
    });
  });

  // Add event listener to close the popup when clicking outside the grid
  iconPopup.addEventListener("click", function(event) {
    if (event.target === iconPopup) {
      iconPopup.style.display = "none";
    }
  });
});

// Seth New Code
let searchBoxButton = document.querySelector(".searchBoxButton");
let searchBox = document.querySelector(".search-box");
let threeBox = document.querySelector(".three-box")
let cancelBox = document.querySelector(".cancelBoxButton");

searchBoxButton.onclick = function () {
  searchBox.classList.add("active");
  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
  }
  threeBox.classList.add("disappear");
};

cancelBox.onclick = function () {
  searchBox.classList.remove("active");
  threeBox.classList.remove("disappear");
};

// In grocerease.js

document.addEventListener("DOMContentLoaded", function () {
  const deleteAllButton = document.getElementById("deleteAllButton");

  // Add an event listener for the deleteAllButton
  deleteAllButton.addEventListener("click", function () {
      // Make an asynchronous request to delete all notifications
      fetch("notification-delete.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({ action: "deleteAll" }),
      })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  // Reload the page after successful deletion
                  location.reload();
              } else {
                  // Handle the error, e.g., display an alert
                  alert("Failed to delete notifications. Please try again.");
              }
          })
          .catch(error => {
              console.error("Error:", error);
          });
  });
});
